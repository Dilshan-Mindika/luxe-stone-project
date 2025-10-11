<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Premium Marble & Granite | Luxury Stone Solutions')</title>
    <meta name="description" content="@yield('meta_description', 'Transform your space with premium marble and granite installations. Expert craftsmanship, luxury materials, and cutting-edge design for kitchens, bathrooms, and more.')">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    @stack('styles')
</head>
<body>
    
    @include('layouts.header')

    <main>
        @yield('content')
    </main>
    
    @include('layouts.footer')

    <a href="https://wa.me/442012345678" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
        <svg viewBox="0 0 32 32" fill="currentColor">
            <path d="M16 0C7.163 0 0 7.163 0 16c0 2.825.74 5.488 2.037 7.813L0 32l8.373-2.037C10.512 31.26 13.175 32 16 32c8.837 0 16-7.163 16-16S24.837 0 16 0zm0 29.35c-2.413 0-4.737-.637-6.75-1.838l-.488-.287-4.988 1.213 1.213-4.988-.287-.488C3.287 20.737 2.65 18.413 2.65 16c2.65 0 2.65-7.35 13.35-7.35S29.35 8.65 29.35 16 22 29.35 16 29.35zm7.363-9.825c-.4-.2-2.4-1.188-2.775-1.325-.375-.138-.65-.2-.925.2-.275.4-1.063 1.325-1.3 1.6-.238.275-.475.313-.875.113-.4-.2-1.7-.625-3.238-2-.2-1.088-.875-1.913-1.275-2.313-.4-.4-.038-.613.175-.813.188-.188.4-.488.6-.738.2-.25.275-.413.413-.688.138-.275.063-.513-.038-.713-.1-.2-.925-2.213-1.263-3.038-.325-.8-.663-.688-.925-.688-.238-.013-.513-.013-.788-.013s-.725.1-1.1.5c-.375.4-1.438 1.4-1.438 3.413s1.475 3.963 1.675 4.238c.2.275 2.813 4.3 6.813 6.025.95.413 1.688.65 2.263.838.95.3 1.813.25 2.5.15.763-.113 2.4-.975 2.738-1.925.338-.95.338-1.763.238-1.925-.1-.163-.375-.263-.775-.463z"/>
        </svg>
    </a>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    
    @stack('scripts')
</body>
</html>