<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href=" {{ route('admin.main.index') }}" class="nav-link">
                        <i class="nav-icon far fa-solid fa-shop"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href=" {{ route('admin.category.index') }}" class="nav-link">
                        <i class="nav-icon far fa-folder"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
