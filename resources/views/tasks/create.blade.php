<!DOCTYPE html>
<html style="direction: rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

    @livewireStyles
</head>

<body class="antialiased">
    <div class="text-center">
        <div class="">

                @livewire('create-post')

        </div>


        @livewireScripts
</body>

</html>
