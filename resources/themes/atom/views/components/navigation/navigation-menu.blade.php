<div class="relative flex hidden h-full w-full flex-col items-center gap-y-2 py-3 md:flex md:flex-row md:gap-x-8 md:gap-y-0 md:py-0"
    id="mobile-menu">
    @if (auth()->check())
        <button id="homeDropdown" data-dropdown-toggle="home-dropdown"
            class="dark:text-gray-200 {{ request()->is('user*') || request()->is('profile*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }} nav-item gap-x-1 ml-5 md:ml-0">
            <i class="mr-1 hidden navigation-icon home lg:inline-flex"></i>
            {{ auth()->user()->username }}

            <x-icons.chevron-down />
        </button>

        <div id="home-dropdown" class="z-10 block hidden w-44 bg-white py-2 text-sm shadow dark:bg-gray-800">
            <a href="{{ auth()->check() ? route('me.show') : route('welcome') }}"
                class="dropdown-item dark:hover:bg-gray-700 dark:text-gray-200">
                {{ __('Home') }}
            </a>

            @auth
                <a href="{{ route('profile.show', auth()->user()->username) }}"
                    class="dropdown-item dark:hover:bg-gray-700 dark:text-gray-200">
                    {{ __('My Profile') }}
                </a>
            @endauth
        </div>
    @else
        <a href="{{ route('welcome') }}"
            class="nav-item dark:text-gray-200 {{ request()->routeIs('welcome') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
            <i class="mr-1 hidden navigation-icon home lg:inline-flex"></i>
            {{ __('Home') }}
        </a>
    @endif

    <button id="communityDropdown" data-dropdown-toggle="community-dropdown"
        class="dark:text-gray-200 {{ request()->is('community*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }} nav-item gap-x-1 ml-5 md:ml-0">
        <i class="mr-1 hidden navigation-icon community lg:inline-flex"></i>
        {{ __('Community') }}

        <x-icons.chevron-down />
    </button>

    <div id="community-dropdown" class="z-10 block hidden w-44 bg-white py-2 text-sm shadow dark:bg-gray-800">
        <a href="{{ route('article.index') }}" class="dropdown-item dark:hover:bg-gray-700 dark:text-gray-200">
            {{ __('Articles') }}
        </a>

        <a href="{{ route('staff.index') }}" class="dropdown-item dark:hover:bg-gray-700 dark:text-gray-200">
            {{ __('Staff') }}
        </a>

        <a href="{{ route('teams.index') }}" class="dropdown-item dark:hover:bg-gray-700 dark:text-gray-200">
            {{ __('Teams') }}
        </a>

        <a href="{{ route('staff-applications.index') }}"
            class="dropdown-item dark:hover:bg-gray-700 dark:text-gray-200">
            {{ __('Staff applications') }}
        </a>

        <a href="{{ route('photos.index') }}" class="dropdown-item dark:hover:bg-gray-700 dark:text-gray-200">
            {{ __('Photos') }}
        </a>
    </div>

    <a href="{{ route('leaderboard.index') }}"
        class="nav-item dark:text-gray-200 {{ request()->routeIs('leaderboard.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
        <i class="mr-1 hidden navigation-icon leaderboards lg:inline-flex"></i>
        {{ __('Leaderboards') }}
    </a>

    <a href="{{ route('shop.index') }}"
        class="nav-item dark:text-gray-200 {{ request()->routeIs('shop.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
        <i class="mr-1 hidden navigation-icon shop lg:inline-flex"></i>
        {{ __('Shop') }}
    </a>

    <a href="{{ route('rules.index') }}"
        class="nav-item dark:text-gray-200 {{ request()->routeIs('rules.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
        <i class="mr-1 hidden navigation-icon rules lg:inline-flex"></i>
        {{ __('Rules') }}
    </a>

    <a href="{{ setting('discord_invitation_link') }}" target="_blank" class="nav-item dark:text-gray-200">
        {{ __('Discord') }}
    </a>
</div>
