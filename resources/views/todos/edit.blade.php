@extends('todos/layout')

@section('content')


    <div class="flex justify-center p-1 border-b ">
        {{-----------------------------------title of page   ---------------}}
        <h2 class="text-2xl  pb-2 p2 font-bold ">Edit Your To-do Here</h2>
        {{-----------------------------------back arrow to main page   ---------------}}
        <a href="{{route('todo.index')}}" class=" px-3  pt-2 text-gray-600 mx-10 cursor-pointer ">
            <span class="fas fa-arrow-left"></span>
        </a>
    </div>

    <form action="{{route('todo.update',$todo->id)}}" method="post" class="py-5 px-4">

        {{--        created a alert function and can use it anywhere we want--}}
        @csrf
        @method('patch')
        <div class="p-1">
            <input name="title" class=" font-bold py-2 px-0 border rounded" placeholder="title"
                   value="{{$todo->title}}"/>
        </div>
        <div class="p-1">
            <textarea name="description" class="p-2 border font-bold" rows="4" cols="20"
                      placeholder="Description">{{$todo->description}}</textarea>
        </div>
        <div class="p-2">
            @livewire('edit-step',['steps'=> $todo->steps])
        </div>
        <div class="p-1">
            {{-----------------------create button. this button will submit the form data and pass it to todos/store route. ---------------}}
            <input class="p-2 border rounded" type="submit" value="Update"/>
        </div>
        {{-----------------this field will show the current value of the selected todo for that we will pass the todo id to this function
        and after updating we will submit it to update route-------------------------------------}}
        {{--        <input type="text" name="title" class="py-2 px-2 border rounded font-bold" value="{{$todo->title}}"/>--}}
        {{--        <input class="p-2 border rounded" type="submit" value="edit" />--}}

    </form>
    {{--    --}}{{-------------  Back button to index/home page  ----------------------------}}
    {{--    <a href="{{route('todo.index')}}" class="py-1 px-1 bg-white-600  border rounded mx-5 cursor-pointer" >BACK</a>--}}

@endsection
