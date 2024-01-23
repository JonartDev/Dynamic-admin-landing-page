<x-layouts.base>
    {{-- If the user is authenticated --}}
    <x-loading-indicator />
    @auth()
    {{-- If the user is authenticated on the static sign in or the login page --}}
    @if (in_array(request()->route()->getName(),['sign-in', 'login'],))
    {{ $slot }}
    @elseif (in_array(request()->route()->getName(),['profile', 'my-profile'],))
    @include('layouts.navbars.auth.sidebar')
    <div class="main-content position-relative bg-gray-100">
        @include('layouts.navbars.auth.nav-profile')
        <div>
            {{ $slot }}
            @include('layouts.footers.auth.footer')
        </div>
    </div>
    @include('components.plugins.fixed-plugin')
    @else
    @include('layouts.navbars.auth.sidebar')
    @include('layouts.navbars.auth.nav')
    @include('components.plugins.fixed-plugin')
    {{ $slot }}
    <main>
        <div class="container-fluid">
            <div class="row">
                @include('layouts.footers.auth.footer')
            </div>
        </div>
    </main>
    @endif
    @endauth

    {{-- If the user is not authenticated (if the user is a guest) --}}
    @guest
    {{-- If the user is on the login page --}}
    @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
    {{ $slot }}
    <div class="mt-5">
    </div>

    {{-- If the user is on the sign up page --}}
    @elseif (!auth()->check() && in_array(request()->route()->getName(),['sign-up'],))
    <div>
        {{ $slot }}
    </div>
    @endif
    @endguest

</x-layouts.base>