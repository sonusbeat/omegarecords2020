<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-edit"></i><span class="hide-menu">Gestionar</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.users.index') }}" class="sidebar-link">
                                <i class="fas fa-users"></i><span class="hide-menu">Usuarios</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.studio_gallery.index') }}" class="sidebar-link">
                                <i class="fas fa-images"></i><span class="hide-menu">Im&aacute;genes</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.equipment_categories.index') }}" class="sidebar-link">
                                <i class="fas fa-folder-open"></i><span class="hide-menu">Categorias de Equipo</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.equipment.index') }}" class="sidebar-link">
                                <i class="fas fa-microphone"></i><span class="hide-menu">Equipo</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
