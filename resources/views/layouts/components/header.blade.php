<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner" style="height:60px">
                <a class="logo" style="width:100%;height:100%" href="index.html">
                    <img src="/images/icon/tutorapp2.png" alt="CoolAdmin"  style="height:100%" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                
                @if (auth()->user()->usertype=='admin')
                <x-sidebar.sidebar-item label="Dashboard" iconClass="fas fa-tachometer-alt" :href="route('admin.home')" routeName="home" />
                <x-sidebar.sidebar-item label="Teachers" iconClass="fas fa-user-md" :href="route('admin.teachers.index')" />
                {{-- <x-sidebar.sidebar-item label="Students" iconClass="fas fa-user" :href="route('admin.home')" /> --}}
                @endif
                
                @if (auth()->user()->usertype=='teacher')
                    <x-sidebar.sidebar-item label="Dashboard" iconClass="fas fa-tachometer-alt" :href="route('teacher.home')"  routeName="home" />
                    <x-sidebar.sidebar-item label="Students" iconClass="fas fa-tachometer-alt" :href="route('teacher.students.index')" />
                    <x-sidebar.sidebar-item label="Resources" iconClass="fas fa-tachometer-alt" :href="route('teacher.home')" />
                @endif
                
            </ul>
        </div>
    </nav>
</header>