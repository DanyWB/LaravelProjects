<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('admin.main.index') }}">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-th"></i> <span>Categories</span>
                </a>
                <a href="{{ route('admin.tag.index') }}">
                    <i class="fa fa-list"></i> <span>Tags</span>
                </a>
                <a href="{{ route('admin.post.index') }}">
                    <i class="fa fa-list"></i> <span>Posts</span>
                </a>
                <a href="{{ route('admin.user.index') }}">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>

        </ul>

    </section>
    <!-- /.sidebar -->
</aside>
