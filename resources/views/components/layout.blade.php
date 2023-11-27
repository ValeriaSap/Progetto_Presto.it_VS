<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Presto</title>

    <link rel="shortcut icon" href="/media/pulcino.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column ">
<x-navbar></x-navbar>
<div class="slotHeight ">
    {{$slot}}
</div>
{{-- <x-header></x-header> --}}
{{-- <x-card></x-card> --}}
<x-footer></x-footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>