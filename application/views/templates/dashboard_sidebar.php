<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Innerflow</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">INR</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <a href="<?=base_url('Administrator')?>" class="nav-link has-dropdown"><i class="fas fa-fw fa-fire"></i><span class="ml-2">Home</span></a>
              <li class="menu-header">Administrator</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown text-primary" data-toggle="dropdown"><i class="fas fa-fw fa-columns "></i> <span>Management</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?=base_url('Administrator/manageUser')?>">Management User</a></li>
                  <li><a class="nav-link" href="<?=base_url('Administrator/manageEvent')?>">Management Event</a></li>
                  <li><a class="nav-link" href="<?=base_url('Administrator/manageMateri')?>">Management Materi</a></li>
                  <li><a class="nav-link" href="<?=base_url('Administrator/manageRole')?>">Management Role Access</a></li>
                </ul>
              </li>
              <li class="menu-header">Member</li>
              <a href="<?=base_url('Member/profile')?>" class="nav-link "><i class="fas fa-fw fa-user"></i><span class="ml-1">Profile</span></a>
              <a href="<?=base_url('Member/event')?>" class="nav-link"><i class="fas fa-fw fa-bullhorn"></i><span class="ml-1">Event</span></a>
              <a href="<?=base_url('Member/materi')?>" class="nav-link"><i class="fas fa-fw fa-folder"></i><span class="ml-1">Materi</span></a>
              <li><a class="nav-link mt-2 text-danger" href="blank.html"><i class="fa fa-times"></i> <span>Logout</span></a></li>
        </aside>
      </div>