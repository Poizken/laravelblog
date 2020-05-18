<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="build/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="{{ route('admin') }}" class="d-block">Alexander Pierce</a>
    </div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="{{ route('admin') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Admin-panel
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.posts.index') }}" class="nav-link">
                <i class="nav-icon far fa-sticky-note"></i>
                <p>
                    Posts
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.categories.index') }}" class="nav-link">
                <i class="nav-icon fas fa-list-ul"></i>
                <p>
                    Categories
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.tags.index') }}" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                    Tags
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.comments.index') }}" class="nav-link">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                    Comments
                    <span class="right badge badge-success">{{ $new_comments }}</span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Users
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.subscribers.index') }}" class="nav-link">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>
                    Subscribers
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
