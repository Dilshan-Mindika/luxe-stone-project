@php
    // Get the current route name to dynamically set the 'active' class on navigation links
    $currentRoute = request()->routeIs('*') ? request()->route()->getName() : '';
@endphp

<header class="sticky-header">
    <nav class="nav-container">
        <div class="logo">
            <h2>LUXE STONE</h2>
        </div>
        <ul class="nav-menu">
            <li><a href="{{ route('home') }}" class="nav-link @if(request()->is('/')) active @endif">Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-link @if(request()->is('about')) active @endif">About Us</a></li>
            
            {{-- Dropdown Menu (Services) --}}
            <li class="dropdown">
                {{-- Check if any service page is active --}}
                <a href="#" class="nav-link @if(request()->is('services/*')) active @endif">Services</a>
                <ul class="dropdown-menu">
                    {{-- These links assume you have seeded the required slugs --}}
                    <li><a href="{{ route('services.show', 'kitchen-worktops') }}">Kitchen Worktops</a></li>
                    <li><a href="{{ route('services.show', 'bathroom-renovations') }}">Bathroom Renovations</a></li>
                    <li><a href="{{ route('services.show', 'flooring-tiles') }}">Flooring & Tiles</a></li>
                    <li><a href="{{ route('services.show', 'staircases') }}">Staircases</a></li>
                    <li><a href="{{ route('services.show', 'commercial-projects') }}">Commercial Projects</a></li>
                </ul>
            </li>

            <li><a href="{{ route('portfolio') }}" class="nav-link @if(request()->is('portfolio')) active @endif">Portfolio</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link @if(request()->is('contact')) active @endif">Contact</a></li>

            {{-- --- AUTHENTICATION LINKS --- --}}
            @guest
                {{-- User is NOT logged in: Show Login/Register --}}
                <li><a href="{{ route('login') }}" class="cta-button primary secondary-nav-link">Log In</a></li>
                <li><a href="{{ route('register') }}" class="cta-button secondary secondary-nav-link">Register</a></li>
            @endguest

            @auth
                {{-- User IS logged in: Show Admin and Logout --}}
                <li>
                    {{-- Check if the current user is the Admin (ID 1) --}}
                    @if (Auth::user()->id == 1)
                        <a href="{{ route('admin.dashboard') }}" class="cta-button primary secondary-nav-link">
                            Admin Dashboard
                        </a>
                    @else
                        {{-- Basic dashboard/profile link for non-admin users --}}
                         <a href="{{ route('dashboard') }}" class="cta-button secondary secondary-nav-link">
                            Dashboard
                        </a>
                    @endif
                </li>
                <li>
                    {{-- Logout Form --}}
                    <form method="POST" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <button type="submit" class="cta-button secondary secondary-nav-link">
                            Log Out
                        </button>
                    </form>
                </li>
            @endauth
        </ul>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container mx-auto flex justify-between items-center">
        <button id="theme-toggle" type="button" class="p-2 rounded-full text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none">
            <svg id="theme-toggle-light-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-in the line="round" stroke-width="2" d="M12 3V1M0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12A4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <svg id="theme-toggle-dark-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-in the line="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
        </button>
        
    </div>
    </nav>
</header>
<style>
/* Add a small style to make the secondary links look better in the nav menu */
.secondary-nav-link {
    padding: 10px 20px !important; 
    font-size: 14px !important;
    font-weight: 500 !important;
    border-radius: 50px !important;
}

/* Ensure buttons display correctly in the mobile menu */
@media (max-width: 1024px) {
    .secondary-nav-link {
        width: 100%; 
        text-align: center;
        margin-top: 10px;
    }
}
</style>
