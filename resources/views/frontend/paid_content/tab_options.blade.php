<ul class="creator-menu">
    <li class="creator-menu-item @if (Route::currentRouteName() == 'creator.timeline') active @endif">
        <a href="{{ route('creator.timeline', ['type' => 'timeline']) }}" class="creator-menu-link">My page</a>
    </li>
    <li class="creator-menu-item @if (Route::currentRouteName() == 'creator.package') active @endif">
        <a href="{{ route('creator.package') }}" class="creator-menu-link">Package</a>
    </li>
    <li class="creator-menu-item @if (Route::currentRouteName() == 'creator.subscribers') active @endif">
        <a href="{{ route('creator.subscribers') }}" class="creator-menu-link">Subscriber</a>
    </li>

    <li class="creator-menu-item @if (Route::currentRouteName() == 'post.type') active @endif"">
        <button type="button" class="post-type">More<i class="fa-solid fa-sort-down ms-2"></i></button>

        <ul class="creator-dropdown-menu">
            <li>
                <a class="dropdown-item" href="{{ route('post.type', ['type' => 'public_post']) }}">
                    <img src="{{ asset('assets/frontend/paid-content/images/new/world.svg') }}" alt="" />
                    Public Post</a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('post.type', ['type' => 'subscriber_post']) }}">
                    <img src="{{ asset('assets/frontend/paid-content/images/new/subscribe.svg') }}" alt="" />
                    Subscriber Post</a>
            </li>
        </ul>
    </li>
</ul>
