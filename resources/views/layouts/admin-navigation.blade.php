<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/admin') }}">Booze Up!</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('/admin') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUsers" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-users" aria-hidden="true"></i>
                    <span class="nav-link-text">Users</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseUsers">
                    <li>
                        <a href="{{ url('/admin/user') }}">All Users</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/user/create') }}">Add User</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="BoozeTypes">
                <a class="nav-link" href="{{ url('/admin/booze') }}">
                    <i class="fa fa-fw fa-beer" aria-hidden="true"></i>
                    <span class="nav-link-text">Booze Types</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="News">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseNews" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-newspaper-o" aria-hidden="true"></i>
                    <span class="nav-link-text">News</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseNews">
                    <li>
                        <a href="{{ url('/admin/news') }}">All News</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/news/create') }}">Add News</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProducts" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-list-alt" aria-hidden="true"></i>
                    <span class="nav-link-text">Products</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseProducts">
                    <li>
                        <a href="{{ url('/admin/products') }}">All Products</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/products/create') }}">Add Products</a>
                    </li>
                </ul>
            </li>

        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-sign-out" aria-hidden="true"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</nav>