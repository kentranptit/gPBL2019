<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-info " href="{{ route('welcome') }}">
        <strong> 慰留 </strong>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('welcome') }}">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('visualize') }}">Visualize</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('search') }}">Search</a>
            </li>
        </ul>
    </div>
</nav>
