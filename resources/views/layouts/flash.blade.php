@if(session()->has('message'))
    {{--                    {{session()->forget('message')}}   used to flush session variables--}}
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
@endif
