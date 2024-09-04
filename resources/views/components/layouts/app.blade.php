<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care </title>
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/imgfavicon.ico') }}" type="image/x-icon">
    <!-- Optionally add other formats -->
    <link rel="icon" href="{{ asset('assets/imgfavicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>
<body class="font-sans antialiased">
    {{-- The navbar with `sticky` and `full-width` --}}
    <x-mary-nav sticky full-width>

        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="mr-3 lg:hidden">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>

            {{-- Brand --}}
            <img src="{{ asset('assets/img/logo/Newlogo.png')}}" class="h-10 w-auti">
        </x-slot:brand>

        {{-- Right side actions --}}
        <x-slot:actions>
            <x-mary-button label="Chat" icon="o-chat-bubble-bottom-center-text" link="{{ route('chatify') }}"  class="btn-ghost btn-sm" tooltip="Click Here Chat With Others" responsive />
            <x-mary-button label="View-QrCode" icon="o-qr-code" link="{{ route('livewire.qrcode') }}" class="btn-ghost btn-sm" responsive />     
            <a href="{{ url('/') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium text-sm rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <br>
    <!-- Home Icon -->
    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 2.5L2 9h2v9h4v-6h4v6h4V9h2L10 2.5z" />
    </svg>
    Back to Home
</a>


        </x-slot:actions>
    </x-mary-nav>

     {{-- The main content with `full-width` --}}
     <x-mary-main with-nav full-width>

 {{-- This is a sidebar that works also as a drawer on small screens --}}
 {{-- Notice the `main-drawer` reference here --}}
 <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">

     {{-- User --}}
     @if($user = auth()->user())
         <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="pt-2">
             <x-slot:actions>
             <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="btn-circle btn-ghost btn-xs" title="Log off">
                                <x-mary-icon name="o-power" />
                            </button>
                        </form>
            </x-slot:actions>
         </x-mary-list-item>

         <x-mary-menu-separator />
     @endif

     {{-- Activates the menu item when a route matches the `link` property --}}
     <x-mary-menu activate-by-route>
         <x-mary-menu-item title="Dashboard" icon="o-home" link="/dashboards" />
         <x-mary-menu-item title="Petowner" icon="o-user" link="/petowner" />
         <x-mary-menu-item title="Appointment"  icon="o-calendar" link="/appointments" />
         {{-- <x-mary-menu-item title="Purchased" icon="o-shopping-bag" link="/purchased" /> --}}
          <x-mary-menu-item title="Vaccination-History" icon="o-magnifying-glass" link="/vaccinations"/>
         <x-mary-menu-item title="PetDetails" icon="o-clipboard-document-check" link="/petdetails" />
         
     </x-mary-menu>

 </x-slot:sidebar>

 {{-- The `$slot` goes here --}}
 <x-slot:content>
     {{ $slot }}
 </x-slot:content>
</x-mary-main>
</body>
</html>
