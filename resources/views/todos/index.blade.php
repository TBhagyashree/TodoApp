@extends('todos/layout')
{{-----------------this form uses get method cuz we are grabbing every doto item from db and display them------------}}
@section('content')

    <div class="flex justify-center p-3 border-b ">
        {{-----------------------------------title of page   ---------------}}
        <h2 class="text-2xl font-bold ">All Your Todos</h2>
        {{-----------------------------------Add a doto  ---------------}}
        <a href="{{route('todo.create')}}" class="py-2 px-3 text-blue-400 mx-10 cursor-pointer ">
            <span class="fas fa-plus-circle"></span>
        </a>
    </div>
    {{-----------------------------------list to display all todos   ---------------}}
    <ul class="my-1">
        {{-----------------------------------flash message   ---------------}}
        <x-alert></x-alert>
        {{-----------------------------------loop through each doto which is passed as a parameter ---------------}}
        @forelse($todos as $todo)
            <li class="flex justify-between my-1 border-b pb-1 ">
                <div class="mt-2">
                    {{--check uncheck views/logic is in mentioned file...did this because code here was getting complex --}}
                    @include('todos/complete-button')
                </div>
                @if($todo->completed)
                    {{----------------------------strike-through if done---------------}}
                    <p class="line-through  text-l ml-4 py-2">{{$todo->title}}</p>
                @else
                    {{----------------------------normal text if not done.---------------}}
                    <a href="{{route('todo.show',$todo->id)}}"
                       class="  cursor-pointer font-bold text-l ml-4 py-2 ">{{$todo->title}}</a>
                @endif

                <div class="mt-2 ml-auto">
                    {{-----------------------Edit doto---------------}}
                    <a href="{{route('todo.edit',$todo->id)}}" class=" rounded  cursor-pointer text-black">
                        <span class="fas fa-edit mr-3 text-orange-500"></span>
                    </a>
                </div>
                <div>
                    {{---------------------------delete doto---------------}}
                    <span class="fas fa-trash text-red-500 pt-3 " onclick="event.preventDefault();
                        if(confirm('Are you sure, you want to delete this task ?')){
                        document.getElementById('todo-delete-{{$todo->id}}')
                        .submit()}"></span>
                    {{----hidden form its job is to grab the id of the current doto and delete after confirming----}}
                    <form style="display:none" id="{{'todo-delete-'.$todo->id}}"
                          {{---------------   ---------------}}
                          action="{{route('todo.destroy',$todo->id)}}" method="post">
                        @csrf
                        @method('delete') {{---cuz we are using delete method here so we have to specify...
                        otherwise form only supports post and get---}}
                    </form>
                </div>
            </li>
        @empty
            <h3 class="pt-3  flex justify-center"> No task Available, create one.</h3>
        @endforelse
    </ul>
@endsection
