<!DOCTYPE html>
<html>

<head>

    <title>Livewire App</title>
    <!-- Add your CSS and other head elements here -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">  --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    @livewireStyles
</head>

<body>
    <div class="container">
        <!-- Common header or navigation -->
        <header>
            <!-- Header content -->
        </header>

        <!-- Livewire component content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Common footer -->
        <footer>
            <!-- Footer content -->
        </footer>
    </div>

    <!-- Add your JavaScript and other script tags here -->
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    {{--  <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>  --}}
</body>

</html>
