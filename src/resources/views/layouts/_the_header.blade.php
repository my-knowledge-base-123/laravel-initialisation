@if (Route::has('login'))
    <section class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </section>

@else
    <section class="fixed top-0 left-0 px-6 py-4 sm:block">
        <h1 class="text-gray-600 dark:text-gray-400">Header</h1>
    </section>
@endif
