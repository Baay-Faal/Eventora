<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold text-purple-600">
                        Event<span class="text-gray-800">ora</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <i class="fas fa-tachometer-alt me-1"></i> {{ __('Dashboard') }}
                    </x-nav-link>

                    {{-- Admin Links --}}
                    @if(auth()->user()->isAdmin())
                        <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                            <i class="fas fa-folder me-1"></i> {{ __('Catégories') }}
                        </x-nav-link>

                        <x-nav-link :href="route('events.my')" :active="request()->routeIs('events.my')">
                            <i class="fas fa-calendar me-1"></i> {{ __('Événements') }}
                        </x-nav-link>

                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                            <i class="fas fa-user-tie me-1"></i> {{ __('Organisateurs') }}
                        </x-nav-link>

                        <x-nav-link :href="route('registrations.index')" :active="request()->routeIs('registrations.index')">
                            <i class="fas fa-ticket-alt me-1"></i> {{ __('Inscriptions') }}
                        </x-nav-link>
                    @endif

                    {{-- Organizer Links --}}
                    @if(auth()->user()->isOrganizer())
                        <x-nav-link :href="route('events.my')" :active="request()->routeIs('events.my')">
                            <i class="fas fa-calendar me-1"></i> {{ __('Mes Événements') }}
                        </x-nav-link>

                        <x-nav-link :href="route('events.create')" :active="request()->routeIs('events.create')">
                            <i class="fas fa-plus-circle me-1"></i> {{ __('Créer Événement') }}
                        </x-nav-link>

                        <x-nav-link :href="route('registrations.index')" :active="request()->routeIs('registrations.index')">
                            <i class="fas fa-ticket-alt me-1"></i> {{ __('Inscriptions') }}
                        </x-nav-link>
                    @endif

                    {{-- User Links --}}
                    @if(auth()->user()->isUser())
                        <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')">
                            <i class="fas fa-search me-1"></i> {{ __('Événements') }}
                        </x-nav-link>

                        <x-nav-link :href="route('registrations.my')" :active="request()->routeIs('registrations.my')">
                            <i class="fas fa-ticket-alt me-1"></i> {{ __('Mes Inscriptions') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <span class="me-3 px-2 py-1 rounded-full text-xs font-semibold
                    @if(auth()->user()->isAdmin()) bg-purple-100 text-purple-800
                    @elseif(auth()->user()->isOrganizer()) bg-blue-100 text-blue-800
                    @else bg-green-100 text-green-800
                    @endif">
                    @if(auth()->user()->isAdmin()) Admin
                    @elseif(auth()->user()->isOrganizer()) Organisateur
                    @else Utilisateur
                    @endif
                </span>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fas fa-user me-1"></i> {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('home')">
                            <i class="fas fa-home me-1"></i> {{ __('Accueil') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt me-1"></i> {{ __('Déconnexion') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fas fa-tachometer-alt me-1"></i> {{ __('Dashboard') }}
            </x-responsive-nav-link>

            {{-- Admin Links Mobile --}}
            @if(auth()->user()->isAdmin())
                <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                    <i class="fas fa-folder me-1"></i> {{ __('Catégories') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('events.my')" :active="request()->routeIs('events.my')">
                    <i class="fas fa-calendar me-1"></i> {{ __('Événements') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                    <i class="fas fa-user-tie me-1"></i> {{ __('Organisateurs') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('registrations.index')" :active="request()->routeIs('registrations.index')">
                    <i class="fas fa-ticket-alt me-1"></i> {{ __('Inscriptions') }}
                </x-responsive-nav-link>
            @endif

            {{-- Organizer Links Mobile --}}
            @if(auth()->user()->isOrganizer())
                <x-responsive-nav-link :href="route('events.my')" :active="request()->routeIs('events.my')">
                    <i class="fas fa-calendar me-1"></i> {{ __('Mes Événements') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('events.create')" :active="request()->routeIs('events.create')">
                    <i class="fas fa-plus-circle me-1"></i> {{ __('Créer Événement') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('registrations.index')" :active="request()->routeIs('registrations.index')">
                    <i class="fas fa-ticket-alt me-1"></i> {{ __('Inscriptions') }}
                </x-responsive-nav-link>
            @endif

            {{-- User Links Mobile --}}
            @if(auth()->user()->isUser())
                <x-responsive-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')">
                    <i class="fas fa-search me-1"></i> {{ __('Événements') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('registrations.my')" :active="request()->routeIs('registrations.my')">
                    <i class="fas fa-ticket-alt me-1"></i> {{ __('Mes Inscriptions') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    <i class="fas fa-user me-1"></i> {{ __('Profile') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('home')">
                    <i class="fas fa-home me-1"></i> {{ __('Accueil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt me-1"></i> {{ __('Déconnexion') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>