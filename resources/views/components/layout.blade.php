<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
    <link rel="shortcut icon" href="/images/watermark.png" type="image/x-icon">
    <!-- CDN Font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body {{-- class="bg-light-subtle" --}}>
    <x-navbar />

    <div>
        {{ $slot }}
    </div>


    {{-- ///[Light-Dark mode switch] --}}

    <label class="switch">
        <input type="checkbox" id="modeCheckbox" onclick="toggler(event)">
        <span class="slider"></span>
    </label>

    <x-footer />

    @livewireScripts

    {{-- ///[Light-Dark mode switch JS] --}}
    <script>
        let mode;
        let body = document.body;
        let settings = window.matchMedia('(prefers-color-scheme: dark)');

        if (settings.matches && !sessionStorage.getItem('mode')) {
            sessionStorage.setItem('mode', 'dark');
            mode = 'dark';
        } else if (sessionStorage.getItem('mode')) {
            mode = sessionStorage.getItem('mode');
            document.getElementById('modeCheckbox').checked = mode == 'light' ? true : false;
        } else {
            mode = 'light';
            document.getElementById('modeCheckbox').checked = mode == 'light' ? true : false;
        }

        body.setAttribute('data-bs-theme', mode);

        function toggler(e) {
            mode == 'light' ? mode = 'dark' : mode = 'light';
            body.setAttribute('data-bs-theme', mode);
            sessionStorage.setItem('mode', mode);
        }
    </script>
</body>

</html>
