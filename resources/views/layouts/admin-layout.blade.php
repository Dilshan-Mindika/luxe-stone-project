<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | @yield('title')</title>

    <!-- Tailwind CSS (Breeze default) - used for utility classes -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Re-define the custom CSS variables for Blade components */
        :root {
            --gold: #D4AF37;
            --black: #0A0A0A;
            --charcoal: #1A1A1A;
            --gray-dark: #2A2A2A;
            --white: #FFFFFF;
            --off-white: #F5F5F5;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--charcoal);
            color: var(--off-white);
            min-height: 100vh;
        }
        .admin-nav {
            background-color: var(--black);
            border-bottom: 2px solid var(--gold);
        }
        .admin-sidebar {
            background-color: var(--gray-dark);
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.4);
            color: var(--white);
        }
        .card {
            background-color: var(--gray-dark);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }
        .card-header {
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
            color: var(--gold);
            font-family: 'Playfair Display', serif;
        }
        a.sidebar-link {
            transition: all 0.2s;
            display: block;
            padding: 12px 16px;
            border-radius: 8px;
            color: var(--off-white);
        }
        a.sidebar-link:hover {
            background-color: rgba(212, 175, 55, 0.15);
            color: var(--gold);
        }
        .logout-link {
            color: #EF4444; /* Red */
        }
        .add-button {
             background: linear-gradient(135deg, var(--gold), #B8941F);
             color: var(--black);
        }
    </style>
</head>
<body class="flex">
    <!-- Sidebar -->
    <div class="admin-sidebar w-64 min-h-screen p-6 sticky top-0 flex flex-col justify-between">
        <div>
            <h2 class="text-3xl font-bold mb-8 text-center" style="font-family: 'Playfair Display', serif; color: var(--gold);">
                LUXE ADMIN
            </h2>
            <nav class="space-y-3">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'bg-yellow-800/30 text-gold-500' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'bg-yellow-800/30 text-gold-500' : '' }}">
                    Manage Services
                </a>
                <a href="{{ route('admin.portfolio.index') }}" class="sidebar-link {{ request()->routeIs('admin.portfolio.*') ? 'bg-yellow-800/30 text-gold-500' : '' }}">
                    Manage Portfolio
                </a>
                <a href="{{ route('home') }}" class="sidebar-link">
                    ← View Frontend
                </a>
            </nav>
        </div>
        
        <form method="POST" action="{{ route('logout') }}" class="mt-8">
            @csrf
            <button type="submit" class="sidebar-link w-full text-left logout-link hover:bg-red-900/30">
                Log Out
            </button>
        </form>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1 p-10">
        <header class="admin-nav rounded-lg p-4 mb-8">
            <h1 class="text-2xl font-semibold text-white">@yield('header')</h1>
        </header>

        <!-- Page Content -->
        <main>
            @if (session('success'))
                <div class="bg-green-600/30 text-green-300 px-4 py-3 rounded-lg relative mb-4 border border-green-700" role="alert">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="bg-red-600/30 text-red-300 px-4 py-3 rounded-lg relative mb-4 border border-red-700" role="alert">
                    <strong>Error!</strong> Please correct the following errors:
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
