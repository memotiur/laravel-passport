<?php

namespace App\Http\Controllers;


use App\User;
use App\Writer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLogin(Request $request)
    {
        $access_token="";
        $status_code = "";
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $is_exist = User::where('email', $request['email'])
            ->first();

        if (is_null($is_exist)) {
            $message = "Authentication failed";
            $status_code = 400;
        } else {
            if (Hash::check($request['password'], $is_exist->password)) {
                $message = "Successfully Logged in";
                $access_token = $is_exist->createToken('Radho')->accessToken;
            } else {
                $message = "Authentication failed";
                $status_code = 400;
            }
        }
        //$token = $user->createToken('Laravel Password Grant Client')->accessToken;

        return $data = [
            'status_code' => $status_code,
            'message' => $message,
            'access_token' => $access_token,
            'data' => $is_exist,
        ];
    }

    public function getUsers(Request $request)
    {

        $status_code = "";

        $data=Writer::get();

        return $data = [
            'status_code' => 200,
            'message' => "Success",
            'access_token' => "",
            'data' => $data,
        ];
    }

    public function logout (Request $request) {

        $token = $request->user()->token();
        $token->revoke();

        $response = 'You have been succesfully logged out!';
        return response($response, 200);

    }
}
