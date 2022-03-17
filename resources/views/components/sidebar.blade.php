<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
      <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
        {{-- logo --}}
        <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
          <div class="d-table m-auto">
            <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">
            <span class="d-none d-md-inline ml-1">{{config('app.name')}}</span>
          </div>
        </a>
        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
          <i class="material-icons">&#xE5C4;</i>
        </a>
      </nav>
    </div>
    {{-- Search --}}
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
      <div class="input-group input-group-seamless ml-3">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fas fa-search"></i>
          </div>
        </div>
        <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
    </form>
    {{-- sidenav --}}
    <div class="nav-wrapper">
      <ul class="nav flex-column">
        <x-sidebar.sidebaritem label="Dashboard" icon="edit" href="dashboard"/>
        <x-sidebar.sidebaritem label="Students" icon="edit" href="students"/>
        <x-sidebar.sidebaritem label="Scores" icon="edit" href="scores"/>
        <x-sidebar.sidebaritem label="Ranking" icon="edit" href="ranking"/>
      </ul>
    </div>
  </aside>