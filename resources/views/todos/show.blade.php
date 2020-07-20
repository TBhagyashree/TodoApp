@extends('todos/layout')

@section('content')

    <div class="flex justify-center p-1 border-b ">
        <h2 class="text-2xl p-6 pb-4 font-bold">{{$todo->title}}</h2>
        <a href="{{route('todo.index')}}" class=" ml-auto  pt-10 text-gray-600  cursor-pointer ">
            <span class="fas fa-arrow-left"></span>
        </a>
    </div>
    <div>
        <div>
            <p class="py-4">{{$todo->description}}</p>
        </div>
    </div>
@endsection

