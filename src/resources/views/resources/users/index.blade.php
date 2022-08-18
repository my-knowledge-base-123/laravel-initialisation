@extends('layouts.the_app')

@section('title', 'User List')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        @foreach($users as $user)
            <p class="block text-gray-600 dark:text-gray-400">{{$user->name}}</p>
        @endforeach
    </div>
@endsection
