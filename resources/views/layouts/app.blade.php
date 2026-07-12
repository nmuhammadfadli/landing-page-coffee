<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nayaka Export Atelier — Indonesian Specialty Coffee B2B Direct-Trade Export">
    <title>@yield('title', t('Nayaka Export Atelier — Kopi Spesialti Indonesia', 'Nayaka Export Atelier — Indonesian Specialty Coffee'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-brand-bg text-brand-text font-sans antialiased">
    <x-header />

    <main>
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
