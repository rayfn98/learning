<div class="header container">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <a class="navbar-brand">{{ config('app.name') }}</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Item 1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Item 2</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @include('partials.auth.navigations.' .\App\User::navigation())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                        {{ __("Language") }}</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('set language', ['es']) }}"> 
                            {{__("Español") }}
                        </a>
                        <a class="dropdown-item" href="{{ route('set language', ['en']) }}"> 
                            {{__("English") }}
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>