<div class="l-sidebar ">
    <div class="logo">
      <div class="logo__txt">O</div>
    </div>
    <div class="l-sidebar__content">
      <nav class="c-menu js-menu">
        <ul class="u-list">
          <li class="c-menu__item {{isset($post) ? 'is-active' : 'has-submenu'}}" data-toggle="tooltip" title="Posts" onclick="window.location='{{route('manage_posts.index')}}';">
            <div class="c-menu__item__inner"><i class="fas fa-file-alt"></i>
              <div class="c-menu-item__title"><span>Posts</span></div>
            </div>
          </li>
          <li class="c-menu__item {{isset($category) ? 'is-active' : 'has-submenu'}}" data-toggle="tooltip" title="Categories" onclick="window.location='{{route('categories.index')}}'">
            <div class="c-menu__item__inner"><i class="fa fa-align-left"></i>
              <div class="c-menu-item__title"><span>Categories</span></div>
            </div>
          </li>
          <li class="c-menu__item {{isset($user) ? 'is-active' : 'has-submenu'}}" data-toggle="tooltip" title="Users" onclick="window.location='{{route('users.index')}}';">
            <div class="c-menu__item__inner"><i class="fa fa-users"></i>
              <div class="c-menu-item__title"><span>Users</span></div>
            </div>
          </li>
          <li class="c-menu__item {{isset($role) ? 'is-active' : 'has-submenu'}}" data-toggle="tooltip" title="Roles" onclick="window.location='{{route('roles.index')}}';">
            <div class="c-menu__item__inner"><i class="fa fa-check-circle"></i>
              <div class="c-menu-item__title"><span>Roles</span></div>
            </div>
          </li>
          <li class="c-menu__item {{isset($permission) ? 'is-active' : 'has-submenu'}}" data-toggle="tooltip" title="Permissions" onclick="window.location='{{route('permissions.index')}}';">
            <div class="c-menu__item__inner"><i class="fa fa-minus-circle"></i>
              <div class="c-menu-item__title"><span>Permissions</span></div>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>