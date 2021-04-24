<li class="nav-item {{ Request::is('movies*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('movies.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Movies</span>
    </a>
</li>
<li class="nav-item {{ Request::is('series*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('series.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Series</span>
    </a>
</li>
<li class="nav-item {{ Request::is('clientels*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('clientels.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Clientels</span>
    </a>
</li>
