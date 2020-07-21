@extends('todos/layout')

@section('content')

    <div class="flex justify-center p-1 border-b ">
        {{-----------------------------------title of page   ---------------}}
        <h2 class="text-2xl p-6  pb-4 font-bold">What next you need To-Do</h2>
        {{-----------------------------------back arrow to main page   ---------------}}
        <a href="{{route('todo.index')}}" class=" px-3  pt-8 text-gray-600 mx-10 cursor-pointer ">
            <span class="fas fa-arrow-left"></span>
        </a>
    </div>
    {{--------------------------title of page------------------------------}}

    {{-----------------------this form will store the newly created doto in db i.e post method---------------}}
    <form action="{{route('todo.store')}}" method="post" class="py-5">
        <x-alert></x-alert>
        {{--        created a alert function and can use it anywhere we want using php artisan make:request alert and the written logic there.-----}}
        @csrf
        <div class="p-1">
            <input name="title" class=" font-bold py-2 px-0 border rounded" placeholder="title"/>
        </div>
        <div class="p-1">
            <textarea name="description" class="p-2 border text-bold rounded " rows="4" cols="25" placeholder="Description"></textarea>
        </div>
        <div class="p-2">
            <h2 class="pb-2 text-bold px-2"> Add steps to your todo
                <span class="fas fa-plus-circle px-2"></span></h2>
            <input name="steps" class=" font-bold py-2 px-0 border rounded" placeholder="your steps here.."/>
        </div>
        <div class="p-1">
            {{-----------------------create button. this button will submit the form data and pass it to todos/store route. ---------------}}
            <input class="p-2 border  rounded" type="submit" value="Create"/>
        </div>
    </form>
    @livewire('counter')
    {{--    --}}{{-----------------------back to doto list page i.e index/home page---------------}}
    {{--    <a href="{{route('todo.index')}}" class="py-3 px-3 bg-white-600  border rounded mx-5 cursor-pointer" >BACK</a>--}}

@endsection

{{--so for any job we need a function to store(post) data and a function to retrieve(get) data --}}
