<nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ active_link('home', 'text-primary') }}"
                        aria-current="page">
                        {{ trans('navbar.home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('placeholders') }}"
                        class="nav-link {{ active_link('placeholders', 'text-primary') }}" aria-current="page">
                        {{ trans('navbar.placeholders') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pluralization') }}"
                        class="nav-link {{ active_link('pluralization', 'text-primary') }}" aria-current="page">
                        {{ trans('navbar.pluralization') }}
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav">
                @include('includes.languages')
            </ul>
        </div>
    </div>
</nav>
