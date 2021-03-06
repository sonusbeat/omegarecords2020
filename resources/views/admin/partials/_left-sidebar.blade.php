<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item {{ request()->segment(2) == 'dashboard' ? 'selected' : '' }}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->segment(2) == 'users' ? 'selected' : '' }}">
                    <a href="{{ route('admin.users.index') }}"
                       class="sidebar-link {{ request()->segment(2) == 'users' ? 'active' : '' }}"
                    >
                        <i class="fas fa-users"></i><span class="hide-menu">Usuarios</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->segment(2) == 'studio_gallery' ? 'selected' : '' }}">
                    <a href="{{ route('admin.studio_gallery.index') }}"
                       class="sidebar-link {{ request()->segment(2) == 'studio_gallery' ? 'active' : '' }}"
                    >
                        <i class="fas fa-images"></i><span class="hide-menu">Im&aacute;genes</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->segment(2) == 'equipment_categories' ? 'selected' : '' }}">
                    <a href="{{ route('admin.equipment_categories.index') }}"
                        class="sidebar-link {{ request()->segment(2) == 'equipment_categories' ? 'active' : '' }}"
                    >
                        <i class="fas fa-folder-open"></i><span class="hide-menu">Categorias de Equipo</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->segment(2) == 'equipment' ? 'selected' : '' }}">
                    <a href="{{ route('admin.equipment.index') }}"
                       class="sidebar-link {{ request()->segment(2) == 'equipment' ? 'active' : '' }}"
                    >
                        <i class="fas fa-microphone"></i><span class="hide-menu">Equipo</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->segment(2) == 'teachers' ? 'selected' : '' }}">
                    <a href="{{ route('admin.teachers.index') }}"
                       class="sidebar-link {{ request()->segment(2) == 'teachers' ? 'active' : '' }}"
                    >
                        <i class="fas fa-user"></i><span class="hide-menu">Instructores</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->segment(2) == 'courses' ? 'selected' : '' }}">
                    <a href="{{ route('admin.courses.index') }}"
                       class="sidebar-link {{ request()->segment(2) == 'courses' ? 'active' : '' }}"
                    >
                        <i class="fas fa-book"></i><span class="hide-menu">Cursos</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->segment(2) == 'course_messages' ? 'selected' : '' }}">
                    <a href="{{ route('admin.course_messages.index') }}"
                       class="sidebar-link {{ request()->segment(2) == 'course_messages' ? 'active' : '' }}"
                    >
                        <i class="fas fa-comments"></i><span class="hide-menu">Mensajes de Cursos</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
