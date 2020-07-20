@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="card">
{{--                @include('layouts/flash')   old method the problem with this methos is u cannot pass any data to the child class
 but with component we can do that--}}{{-- include this anywhere whenever u want to show that message.--}}
                <x-alert>
{{--                    //passing data to sub-class--}}
{{--                    //we can write this anywhere using {{$slot}} in child class--}}
{{--                    <h2 class="color-primary">here is response from parent class</h2>  will always get displayed whenever a component is rendered--}}
                </x-alert>
                <form action="/upload" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" >
                    <input  value="upload" type="submit">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
