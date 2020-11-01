<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="{{ route('user.index') }}">User Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto"> </ul>
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" href="{{ route('home.logout') }}">Logout</a> </li>
        </ul>
    </div>
</nav>
