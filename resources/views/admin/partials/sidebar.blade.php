<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fas fa-tachometer-alt"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.students.index' ? 'active' : '' }}" href="{{ route('admin.students.index') }}">
                <i class="app-menu__icon fas fa-suitcase-rolling"></i>
                <span class="app-menu__label">Students</span>
            </a>
        </li>
    </ul>
</aside>
