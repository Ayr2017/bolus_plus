<header class="mb-4">
    <div class="container">
        <div class="py-3 border-bottom d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
            <a href="{{ url('/') }}" class="d-inline-flex link-body-emphasis text-decoration-none fs-2">
                {{ config('app.name', 'Laravel') }}
            </a>

            <div class="ms-auto">
                @guest
                    @if (Route::has('login'))
                        <a
                            href="{{ route('login') }}"
                            class="btn btn-outline-primary me-2"
                        >
                            {{ __('Login') }}
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="btn btn-primary"
                        >
                            {{ __('Register') }}
                        </a>
                    @endif
                @else
                    <button
                        id="navbarDropdown"
                        class="nav-link dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        v-pre
                    >
                        <i class="bi bi-person-circle fs-5"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <div class="dropdown-item-text">{{ Auth::user()->name }}</div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a
                                class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                {{ __('Logout') }}
                            </a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                @endguest
            </div>
        </div>
    </div>
</header>
