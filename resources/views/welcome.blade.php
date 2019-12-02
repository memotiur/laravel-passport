<p>
    {{Auth::guard('writer')->user()->writer_id}}
    {{Auth::guard('writer')->user()->name}}
</p>