{{-- Navigation --}}
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand m-0" href="/">
            <img src="{{ asset('assets/front/img/logo.png') }}" alt="Activ &reg;" class="logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse position-relative justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav toggle-visibility p-0 align-items-center">
                @foreach($frontMenu as $item)
                    @if(!blank($item->children))
                    <li class="nav-item dropdown-link" aria-haspopup="true" role="navigation">
                        <a href="#" class="nav-link text-center">{{ $item->title }}</a>
                        <div class="dropdown-links" aria-label="submenu">
                            @foreach($item->children as $child)
                                <a class="pb-3" href="/{{ $child->page->slug }}">{{ $child->title }}</a>
                            @endforeach
                        </div>
                    </li>
                    @else
                    <li class="nav-item {{ Request::is($item->page->slug . '*') ? 'active' : '' }}">
                        <a class="nav-link text-center" href="/{{ $item->page->slug }}">{{ $item->title }}</a>
                    </li>
                    @endif
                @endforeach
                <li class="toggle-button d-none d-lg-block ml-4">
                    <span class="icon icon--search">
                        <svg viewBox="0 0 24 24">
                            <use href="#shape-search"></use>
                        </svg>
                    </span>
                </li>
            </ul>

            <div class="search-field toggle-visibility hidden">
                <form method="get" action="{{ route('front.search-results') }}">
                    <input type="text" name="search" id="search" placeholder="Търсене по дума" autocomplete="off">
                    <span class="toggle-button d-none d-lg-flex icon icon--close-green">
                                <svg viewBox="0 0 9 9">
                                    <use href="#shape-close"></use>
                                </svg>
                            </span>

                    <ul id="results" style="display:none"></ul>
                </form>
            </div>
        </div>
    </div>
</nav>


{{--@dd($frontMenu->toArray())--}}