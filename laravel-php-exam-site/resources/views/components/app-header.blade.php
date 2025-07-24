<header class="w-full">
    {{-- Navbar Superiore (Blu Scuro) --}}
    <div class="bg-blue-800 text-white px-4 flex justify-between items-stretch h-14 border-b border-blue-800" style="background-color: #0077B6;">
        <div class="flex items-center h-full">
            {{-- Qui va il nome del profilo / Login CON DROPDOWN --}}
            @auth
                <div class="relative h-full flex items-center" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open"
                       class="text-white font-semibold px-3 h-full flex items-center hover:underline active:text-black focus:outline-none focus:text-black transition duration-150 ease-in-out"
                       :class="{'!text-black': open, 'text-white': !open}">
                        {{ Auth::user()->name }}
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         {{-- MODIFICA QUI: da right-0 a left-0 e origine della transizione --}}
                         class="absolute left-0 top-full mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50 origin-top-right">
                        {{-- Link Profilo: FORZIAMO IL TESTO NERO --}}
                        <a href="{{ url('/profile') }}" class="block px-4 py-2 text-sm !text-gray-900 hover:bg-gray-100">
                            Profilo
                        </a>

                        <!-- Logout: FORZIAMO IL TESTO NERO -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm !text-gray-900 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                   class="text-white font-semibold px-3 h-full flex items-center hover:underline active:text-black focus:outline-none focus:text-black transition duration-150 ease-in-out"
                   x-data="{ clicked: false }" @click="clicked = !clicked" :class="{'!text-black': clicked, 'text-white': !clicked}">
                    Login
                </a>
            @endauth
        </div>
        <ul class="flex space-x-6 text-sm">
            <li class="h-full flex items-center">
                <a href="#" class="block h-full px-3 transition-colors duration-200 flex items-center justify-center"
                   style="color: rgba(255, 255, 255, 0.8);"
                   onmouseover="this.style.backgroundColor='#F3F4F6'; this.style.color='#0077B6';"
                   onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255, 255, 255, 0.8)';">
                   Amiu Puglia
                </a>
            </li>
            <li class="h-full flex items-center">
                <a href="{{ url('/') }}" class="block h-full px-3 transition-colors duration-200 flex items-center justify-center"
                   style="background-color: #F3F4F6; color: #0077B6;">
                   Amiu Bari
                </a>
            </li>
            <li class="h-full flex items-center">
                <a href="#" class="block h-full px-3 transition-colors duration-200 flex items-center justify-center"
                   style="color: rgba(255, 255, 255, 0.8);"
                   onmouseover="this.style.backgroundColor='#F3F4F6'; this.style.color='#0077B6';"
                   onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255, 255, 255, 0.8)';">
                   Amiu Foggia
                </a>
            </li>
        </ul>
    </div>

    {{-- Sezione con Logo e Immagine Header --}}
    <div class="flex items-center shadow-md" style="background-color: #F3F4F6;">
        <div class="flex-shrink-0 h-full pl-4 flex items-center">
            <img src="{{ asset('images/logo-amisu.png') }}" alt="Logo Amiu" class="h-20">
        </div>

        <div class="flex flex-col flex-grow ml-4">
            <div class="relative">
                <img src="{{ asset('images/header-image.jpg') }}" alt="Immagine Header" class="w-full h-20 object-cover object-right shadow-sm">

                {{-- Overlay Gradient --}}
                <div class="absolute inset-y-0 right-0 w-2/3"
                     style="background: linear-gradient(to right, transparent 0%, #F3F4F6 66%);">
                </div>

                {{-- Numero di Telefono Sovrapposto --}}
                <div class="absolute right-2 text-green-700 font-bold text-lg md:text-xl flex items-center underline top-1/2 -translate-y-1/2 mt-2">
                    <i class="fas fa-phone mr-2"></i>
                    +39 080 5357111
                </div>
            </div>

            {{-- Navbar Inferiore con Links di Navigazione --}}
            <nav x-data="{ openMenu: null }" class="bg-gray-100 rounded-md">
                <ul class="flex justify-around items-center font-semibold text-gray-800">
                    @php
                        $navItems = [
                            'Unità di Bari' => '/', // Punta alla homepage
                            'Servizi' => 'services.index', // La tua pagina /services
                            'Raccolta differenziata' => 'raccolta-differenziata', // Nuova pagina
                            'Ingombranti' => 'ingombranti', // Nuova pagina
                            'Raccolta porta a porta' => 'porta-a-porta', // Nuova pagina
                            'Ordinanze' => 'ordinanze', // Placeholder
                            'Modulistica' => 'modulistica', // Placeholder
                        ];
                        // Mappa per identificare quali voci di menu hanno un dropdown
                        $hasDropdown = [
                            'Servizi' => true,
                        ];
                    @endphp

                    @foreach ($navItems as $text => $route)
                        <li class="relative">
                            <a href="{{ $route === '/' ? url('/') : (Route::has($route) ? route($route) : '#') }}"
                               class="block px-4 py-1 rounded-md transition-colors duration-200
                                       hover:bg-gray-900 hover:text-white
                                       {{ (request()->routeIs($route) || (isset(request()->segments()[0]) && request()->segments()[0] === 'services' && $route === 'services.index')) ? 'bg-gray-900 text-white' : 'text-gray-800' }}"
                               @if (isset($hasDropdown[$text]) && $hasDropdown[$text])
                                    @click.prevent="openMenu = (openMenu === '{{ $route }}' ? null : '{{ $route }}')"
                               @endif
                            >
                                {{ $text }}
                            </a>
                            @if (isset($hasDropdown[$text]) && $hasDropdown[$text]) {{-- Controlla se ha un dropdown --}}
                                <div x-show="openMenu === '{{ $route }}'"
                                     x-transition:enter="transition ease-out duration-100 transform"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75 transform"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0 scale-95"
                                     class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-gray-900 ring-1 ring-black ring-opacity-5 z-50 origin-top-left"
                                     @click.away="openMenu = null">
                                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <a href="{{ route('services.create') }}" class="block px-4 py-2 text-sm text-white hover:bg-gray-700" role="menuitem">Richiedi Nuovo</a>
                                        <a href="{{ route('services.index') }}" class="block px-4 py-2 text-sm text-white hover:bg-gray-700" role="menuitem">Vedi Tutti</a>
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</header>