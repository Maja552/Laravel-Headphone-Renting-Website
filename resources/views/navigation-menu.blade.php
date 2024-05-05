<nav x-data="{ open: false }" class="bg-[#241468] bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-70">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto"></x-application-mark>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-10 sm:-my-px sm:ml-8 sm:flex">
                    <x-nav-link class="text-white text-[16px]" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" style="width:150px;">
                        {{ __('translation.navigation.dashboard') }}
                    </x-nav-link>

                    @if (Auth::user() == null)
                        <x-nav-link class="text-white text-[16px]" href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('translation.navigation.login') }}
                        </x-nav-link>

                        <x-nav-link class="text-white text-[16px]" href="{{ route('register') }}" :active="request()->routeIs('register')">
                            {{ __('translation.navigation.register') }}
                        </x-nav-link>
                    @else
                        @cannot('units.index')
                        <x-nav-link class="text-white text-[16px]" href="{{ route('availableunits.index') }}" :active="request()->routeIs('availableunits.index')">
                            {{ __('translation.navigation.availableunits') }}
                        </x-nav-link>
                        @endcannot
                    @endif

                    @can('rents.index')
                        @if(!Auth::user()->isAdmin())
                            <x-nav-link class="text-white text-[16px]" href="{{ route('subrents.index') }}" :active="request()->routeIs('subrents.index')">
                                {{ __('translation.navigation.rents') }}
                            </x-nav-link>
                        @endif
                    @endcan

                    @can('users.index')
                    <x-nav-link class="text-white text-[16px]" href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                        {{ __('translation.navigation.users') }}
                    </x-nav-link>
                    @endcan

                    @can('logs.index')
                    <x-nav-link class="text-white text-[16px]" href="log-viewer">
                        {{ __('translation.navigation.logs') }}
                    </x-nav-link>
                    @endcan

                    @can('headphones.index')
                    <x-nav-link class="text-white text-[16px]" href="{{ route('headphones.index') }}" :active="request()->routeIs('headphones.index')">
                        {{ __('translation.navigation.headphones') }}
                    </x-nav-link>
                    @endcan

                    @if(Auth::user() != null && Auth::user()->isAdmin())
                        @can('units.index')
                        <div class="dropdown">
                            <div class="dropbtn">
                                {{ __('translation.navigation.units') }}
                            </div>
                            <div class="dropdown-content">
                                <x-nav-link class="text-white text-[16px]" href="{{ route('units.index') }}" :active="request()->routeIs('units.index')">
                                    {{ __('translation.navigation.units_adminview') }}
                                </x-nav-link>
                                <x-nav-link class="text-white text-[16px]" href="{{ route('availableunits.index') }}" :active="request()->routeIs('availableunits.index')">
                                    {{ __('translation.navigation.units_userview') }}
                                </x-nav-link>
                            </div>
                        </div>
                        @endcan

                        @can('rents.index')
                        <div class="dropdown">
                            <div class="dropbtn">
                                {{ __('translation.navigation.rents') }}
                            </div>
                            <div class="dropdown-content">
                                <x-nav-link class="text-white text-[16px]" href="{{ route('rents.index') }}" :active="request()->routeIs('rents.index')">
                                    {{ __('translation.navigation.rents_normal') }}
                                </x-nav-link>
                                <x-nav-link class="text-white text-[16px]" href="{{ route('subrents.index') }}" :active="request()->routeIs('subrents.index')">
                                    {{ __('translation.navigation.rents_sub') }}
                                </x-nav-link>
                            </div>
                        </div>
                        @endcan
                    @endif

                    @can('rentedunits.index')
                    <x-nav-link class="text-white text-[16px]" href="{{ route('rentedunits.index') }}" :active="request()->routeIs('rentedunits.index')">
                        {{ __('translation.navigation.rentedunits') }}
                    </x-nav-link>
                    @endcan

                    <!--
                    @can('rentextensions.index')
                    <x-nav-link class="text-white text-[16px]" href="{{ route('rentextensions.index') }}" :active="request()->routeIs('rentextensions.index')">
                        {{ __('translation.navigation.rentextensions') }}
                    </x-nav-link>
                    @endcan
                    -->

                    @if (Auth::user() != null)
                        @if ( Auth::user()->hasAnyPermission(['drivertechnologies.index', 'fittypes.index', 'backtypes.index']) )
                        <div class="dropdown" style="width: 130px">
                            <div class="dropbtn" style="padding: 16px 10px;">
                                {{ __('translation.navigation.categories') }}
                            </div>
                            <div class="dropdown-content">
                                @can('drivertechnologies.index')
                                <x-nav-link class="text-white text-[16px]" href="{{ route('drivertechnologies.index') }}" :active="request()->routeIs('drivertechnologies.index')">
                                    {{ __('translation.navigation.drivertechnologies') }}
                                </x-nav-link>
                                @endcan

                                @can('fittypes.index')
                                <x-nav-link class="text-white text-[16px]" href="{{ route('fittypes.index') }}" :active="request()->routeIs('fittypes.index')">
                                    {{ __('translation.navigation.fittypes') }}
                                </x-nav-link>
                                @endcan

                                @can('backtypes.index')
                                <x-nav-link class="text-white text-[16px]" href="{{ route('backtypes.index') }}" :active="request()->routeIs('backtypes.index')">
                                    {{ __('translation.navigation.backtypes') }}
                                </x-nav-link>
                                @endcan

                                @can('manufacturers.index')
                                <x-nav-link class="text-white text-[16px]" href="{{ route('manufacturers.index') }}" :active="request()->routeIs('manufacturers.index')">
                                    {{ __('translation.navigation.manufacturers') }}
                                </x-nav-link>
                                @endcan

                                @can('rentstatuses.index')
                                <x-nav-link class="text-white text-[16px]" href="{{ route('rentstatuses.index') }}" :active="request()->routeIs('rentstatuses.index')">
                                    {{ __('translation.navigation.rentstatuses') }}
                                </x-nav-link>
                                @endcan
                            </div>
                        </div>
                        @endif
                    @endif
                </div>
            </div>

            @if (Auth::user() != null)
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('translation.account.team.menage') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('translation.account.team.settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('translation.account.team.create_new') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('translation.account.team.switch') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <div class="">
                    <livewire:renting.cart-counter />
                </div>
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('translation.account.manage_account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('translation.account.profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('translation.account.api_tokens.manage') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                         {{ __('translation.account.logout') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
            @endif

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('translation.navigation.dashboard') }}
            </x-responsive-nav-link>

            @can('users.index')
            <x-responsive-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                {{ __('translation.navigation.users') }}
            </x-responsive-nav-link>
            @endcan

            @can('logs.index')
            <x-responsive-nav-link href="log-viewer">
                {{ __('translation.navigation.logs') }}
            </x-responsive-nav-link>
            @endcan

            @can('headphones.index')
            <x-responsive-nav-link href="{{ route('headphones.index') }}" :active="request()->routeIs('headphones.index')">
                {{ __('translation.navigation.headphones') }}
            </x-responsive-nav-link>
            @endcan

            @can('units.index')
            <x-responsive-nav-link href="{{ route('units.index') }}" :active="request()->routeIs('units.index')">
                {{ __('translation.navigation.units') }}
            </x-responsive-nav-link>
            @endcan

            @can('rents.index')
            <x-responsive-nav-link href="{{ route('rents.index') }}" :active="request()->routeIs('rents.index')">
                {{ __('translation.navigation.rents') }}
            </x-responsive-nav-link>
            @endcan

            @can('rentedunits.index')
            <x-responsive-nav-link href="{{ route('rentedunits.index') }}" :active="request()->routeIs('rentedunits.index')">
                {{ __('translation.navigation.rentedunits') }}
            </x-responsive-nav-link>
            @endcan

            @can('rentextensions.index')
            <x-responsive-nav-link href="{{ route('rentextensions.index') }}" :active="request()->routeIs('rentextensions.index')">
                {{ __('translation.navigation.rentextensions') }}
            </x-responsive-nav-link>
            @endcan

            @can('drivertechnologies.index')
            <x-responsive-nav-link href="{{ route('drivertechnologies.index') }}" :active="request()->routeIs('drivertechnologies.index')">
                {{ __('translation.navigation.drivertechnologies') }}
            </x-responsive-nav-link>
            @endcan

            @can('fittypes.index')
            <x-responsive-nav-link href="{{ route('fittypes.index') }}" :active="request()->routeIs('fittypes.index')">
                {{ __('translation.navigation.fittypes') }}
            </x-responsive-nav-link>
            @endcan

            @can('backtypes.index')
            <x-responsive-nav-link href="{{ route('backtypes.index') }}" :active="request()->routeIs('backtypes.index')">
                {{ __('translation.navigation.backtypes') }}
            </x-responsive-nav-link>
            @endcan

            @can('manufacturers.index')
            <x-responsive-nav-link href="{{ route('manufacturers.index') }}" :active="request()->routeIs('manufacturers.index')">
                {{ __('translation.navigation.manufacturers') }}
            </x-responsive-nav-link>
            @endcan
        </div>

        <div class="border-t border-gray-200 pt-2">
            <livewire:renting.cart-counter />
        </div>
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @if (Auth::user() != null)
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            @endif

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('translation.account.profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('translation.account.api_tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                                   {{ __('translation.account.logout') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('translation.account.tema.manage') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('translation.account.team.settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('translation.account.team.create_new') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('translation.account.team.switch') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
