<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">

    <!-- Styles -->

    @livewireStyles
</head>

<body class="antialiased">
    <div class="text-center">
        <br>
        <a class="btn btn-sm  btn-outline-primary" href="{{ route('posts.index') }}" wire:navigate.hover> Show-Posts
        </a>

        <a class="btn btn-sm btn-warning" href="{{ route('tasks.index') }}" wire:navigate.hover> Show-Tasks-Controller
        </a>

        <a class="btn btn-sm btn-info" href="{{ route('tasks') }}" wire:navigate.hover> Show-Tasks-Livewire </a>

        <a class="btn btn-sm btn-dark" href="{{ route('test') }}" wire:navigate.hover> Show-test-Livewire </a>

        <a class="btn btn-sm  btn-outline-primary" href="{{ route('home') }}" wire:navigate.hover> Home </a>

        @livewire('Test')
        {{--  <livewire:todo-count :todos="$todos" />  --}}
        {{--  @livewire('app-tasks')  --}}


        {{--  @livewire('Posts')  --}}

    </div>

    @livewireScripts
</body>

</html>
