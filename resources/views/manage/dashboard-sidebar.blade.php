<div class="l-sidebar ">
    <div class="logo">
      <div class="logo__txt">O</div>
    </div>
    <div class="l-sidebar__content">
      <nav class="c-menu js-menu">
        <ul class="u-list">
          <li class="c-menu__item is-active" data-toggle="tooltip" title="Blogs">
            <div class="c-menu__item__inner"><i class="fas fa-file-alt"></i>
              <div class="c-menu-item__title"><span>Blogs</span></div>
            </div>
          </li>
          <!-- <li class="c-menu__item has-submenu" data-toggle="tooltip" title="History">
            <div class="c-menu__item__inner"><i class="fa fa-history"></i>
              <div class="c-menu-item__title"><span>History</span></div>
            </div>
          </li> -->
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Manage Users" onclick="window.location='{{route('users.index')}}';">
            <div class="c-menu__item__inner"><i class="fa fa-users"></i>
              <div class="c-menu-item__title"><span>Manage Users</span></div>
            </div>
          </li>
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Settings" onclick="window.location='{{route('permissions.index')}}';">
            <div class="c-menu__item__inner"><i class="fa fa-cogs"></i>
              <div class="c-menu-item__title"><span>Settings</span></div>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>