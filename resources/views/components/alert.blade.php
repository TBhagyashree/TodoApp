<div>
    {{$slot}}
    @if(session()->has('message'))
        {{--                    {{session()->forget('message')}}   used to flush session variables--}}
        <div class="bg-green-400 p-4 text-content-center ">
            {{session()->get('message')}}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-300 p-4 text-content-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
