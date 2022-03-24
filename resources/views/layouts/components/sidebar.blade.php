<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo" style="justify-content: center">
        <a href="#" style="height: 100%">
            <img src="/images/icon/tutorapp2.png" alt="TutorApp" style="height: 100%" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                @if (auth()->user()->usertype=='admin')
                <x-sidebar.sidebar-item label="Dashboard" iconClass="fas fa-tachometer-alt" :href="route('admin.home')" routeName="home" />
                <x-sidebar.sidebar-item label="Principals" iconClass="fas fa-user-md" :href="route('admin.principal.index')" routeName="principal"/>
                <x-sidebar.sidebar-item label="Teachers" iconClass="fas fa-user-md" :href="route('admin.teachers.index')" />
                <x-sidebar.sidebar-item label="Students" iconClass="fas fa-tachometer-alt" :href="route('admin.students.index')" />
                {{-- <x-sidebar.sidebar-item label="Students" iconClass="fas fa-user" :href="route('admin.home')" /> --}}
                @endif
                
                @if (auth()->user()->usertype=='teacher')
                    <x-sidebar.sidebar-item label="Dashboard" iconClass="fas fa-tachometer-alt" :href="route('teacher.home')"  routeName="home" />
                    <x-sidebar.sidebar-item label="Students" iconClass="fas fa-tachometer-alt" :href="route('teacher.students.index')" />
                    <x-sidebar.sidebar-item label="Resources" iconClass="fas fa-tachometer-alt" :hasDropdown="true">
                        <x-sidebar.sidebar-item2 label="Audio" :href="route('teacher.audio.index')"/>
                        <x-sidebar.sidebar-item2 label="Video" :href="route('teacher.video.index')"/>
                        {{-- <x-sidebar.sidebar-item2 label="Games" :href="route('teacher.audio.index')"/>
                        <x-sidebar.sidebar-item2 label="Quiz" :href="route('teacher.audio.index')"/> --}}
                    </x-sidebar.sidebar-item>
                @endif

                
                @if (auth()->user()->usertype=='principal')
                <x-sidebar.sidebar-item label="Teachers" iconClass="fas fa-user-md" :href="route('principal.teachers.index')" />
                <x-sidebar.sidebar-item label="Students" iconClass="fas fa-tachometer-alt" :href="route('principal.students.index')" />
                @endif
                
                {{-- <x-sidebar.sidebar-item label="Dashboard" iconClass="fas fa-tachometer-alt" href="#" :hasDropdown="true" >
                    <x-sidebar.sidebar-item2 label="BD1" :href="route('admin.home')"/>
                </x-sidebar.sidebar-item> --}}
                {{-- <li class="active has-sub">
                    <a   class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">Dashboard 4</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="fas fa-chart-bar"></i>Charts</a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="fas fa-table"></i>Tables</a>
                </li>
                <li>
                    <a href="form.html">
                        <i class="far fa-check-square"></i>Forms</a>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                </li>
                <li>
                    <a href="map.html">
                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="forget-pass.html">Forget Password</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>UI Elements</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="button.html">Button</a>
                        </li>
                        <li>
                            <a href="badge.html">Badges</a>
                        </li>
                        <li>
                            <a href="tab.html">Tabs</a>
                        </li>
                        <li>
                            <a href="card.html">Cards</a>
                        </li>
                        <li>
                            <a href="alert.html">Alerts</a>
                        </li>
                        <li>
                            <a href="progress-bar.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="modal.html">Modals</a>
                        </li>
                        <li>
                            <a href="switch.html">Switchs</a>
                        </li>
                        <li>
                            <a href="grid.html">Grids</a>
                        </li>
                        <li>
                            <a href="fontawesome.html">Fontawesome Icon</a>
                        </li>
                        <li>
                            <a href="typo.html">Typography</a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
    </div>
</aside>