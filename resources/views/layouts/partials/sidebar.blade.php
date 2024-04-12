<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a href="#"><img src="/../assets/images/svg/logo.svg" style="height: 30px" alt="Logo" srcset=""></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li
                    class="sidebar-item {{ request()->is('home') ? 'active' : '' }}">
                    <a href="/home" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li
                    class="sidebar-item {{ request()->is('tasks') ? 'active' : '' }}">
                    <a href="/tasks" class='sidebar-link'>
                        <i class="bi bi-clipboard-fill"></i>
                        <span>Tasks</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('categories') ? 'active' : '' }}">
                    <a href="/categories" class='sidebar-link'>
                        <i class="bi bi-tag-fill"></i> <span>Categories</span>
                    </a>
                </li>
                <li
                    class="sidebar-item {{ request()->is('calendar') ? 'active' : '' }}">
                    <a href="/calendar" class='sidebar-link'>
                        <i class="bi bi-calendar-fill"></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li
                    class="sidebar-item {{ request()->is('chatbot') ? 'active' : '' }}">
                    <a href="/chatbot" class='sidebar-link'>
                        <i class="bi bi-chat-fill"></i>
                        <span>Chatbot</span>
                    </a>
                </li>

                @if(auth()->user()->hasRole('admin'))
                    <li class="sidebar-title">Admin</li>
                    <li
                        class="sidebar-item {{ request()->is('users') ? 'active' : '' }}">
                        <a href="/users" class='sidebar-link'>
                            <i class="bi bi-person-fill"></i>
                            <span>Users</span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</div>
