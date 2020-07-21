@extends('todos/layout')

@section('content')

    <div class="flex  ml-0px border-b ">
        <h2 class="text-2xl   ml-2 pb-2 font-bold">{{strtoupper($todo->title)}}</h2>
        <a href="{{route('todo.index')}}" class=" ml-auto pr-2  pt-2 text-gray-600  cursor-pointer ">
            <span class="fas fa-arrow-left"></span>
        </a>
    </div>
    <div>
        <div>
            <h2 class="text-lg  font-bold py-1 ">Description </h2>
            <p class="py-1">{{$todo->description}}</p>
        </div>
        @if($todo->steps->count() >0)
            <div>
                <h2 class="text-lg py-1   mx-2 font-bold ">Steps for this task are: </h2>
                @foreach($todo->steps as $step)
                    <p class="py-1">
                        {{$step->name}}
                    </p>
                @endforeach
            </div>
        @endif

    </div>
@endsection

