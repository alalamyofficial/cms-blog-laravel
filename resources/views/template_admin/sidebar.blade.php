<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">{{Auth::user()->name}}</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Starter</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                  <i class="fa fa-list-alt" style="color:#dc2d62"></i> <span>Categories</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('categories.create')}}">Create</a></li>
                  <li><a class="nav-link" href="{{route('categories.index')}}">Categories</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-tag" style="color:#62dc2d">
                  </i> <span>Tags</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('tags.create')}}">Create</a></li>
                  <li><a class="nav-link" href="{{route('tags.index')}}">Tags</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa 
                  fa-newspaper" style="color:#2db9dc"></i> <span>Posts</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('posts.create')}}">Create</a></li>
                  <li><a class="nav-link" href="{{route('posts.index')}}">Posts</a></li>
                  <li><a class="nav-link" href="{{route('trashed')}}">Trashed Posts</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas 
                  fa-users" style="color:#581845"></i> <span>Users</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('user.create')}}">Create</a></li>
                  <li><a class="nav-link" href="{{route('user.index')}}">Users</a></li>
                  <!-- <li><a class="nav-link" href="{{route('trashed')}}">Trashed Posts</a></li> -->
                </ul>
              </li>
              
        </aside>
      </div>