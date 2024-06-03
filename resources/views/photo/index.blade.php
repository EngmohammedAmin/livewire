@extends('layouts.app')

@section('title')
    Page Title
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>

    </div>
    <x-test.test :$username :$users>
        <x-forms.input>


        </x-forms.input>
        <x-forms.test.test :$posts>

            <strong> Posts slot</strong>
        </x-forms.test.test>

    </x-test.test>

    <x-layouts.app>

        {{--  @foreach ($user_task_Post->tasks as $task)
        {{ $task->title }}--
            @foreach ($task->post as $post)
                {{ $post->name }}<br>
            @endforeach
        @endforeach  --}}

       {{ $uusers}}
    </x-layouts.app>
@endsection
