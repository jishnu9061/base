<head>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    @yield('content')

    <!-- jQuery + Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr Notifications -->
    <script>
        @if (session('toastr'))
            toastr["{{ session('toastr')['type'] }}"]("{{ session('toastr')['message'] }}");
        @endif
    </script>
</body>
