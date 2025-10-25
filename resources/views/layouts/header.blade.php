@php
    // Get the current route name to dynamically set the 'active' class on navigation links
    $currentRoute = request()->routeIs('*') ? request()->route()->getName() : '';
@endphp

<header class="sticky-header">
    <nav class="nav-container">
        <div class="logo">
            <h2>RMP Marble & Graphine LTD</h2>
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
