<ul class="list-unstyled accordion-menu">
          <li class="{{ request()->is('admin') ? 'active-page' : '' }}">
                    <a href="{{ route('admin') }}"><i data-feather="home"></i>Dashboard</a>
          </li>
          <li class="sidebar-title">
                    Admin Settings
          </li>
          <li class="{{ request()->is('admin/debit*') ? 'active-page' : '' }}">
                    <a href="{{route('admin.debit')}}"><i data-feather="credit-card"></i>Debit Master</a>
          </li>
          <li class="{{ request()->is('admin/banner*') ? 'active-page' : '' }}">
                    <a href="#"><i data-feather="user-plus"></i>User Master</a>
          </li>
          <li class="{{ request()->is('admin/banner*') ? 'active-page' : '' }}">
                    <a href="#"><i data-feather="dollar-sign"></i>Mutasi Account</a>
          </li>
          <li class="sidebar-title">
                    Marketplace
          </li>
          <li class="{{ request()->is('admin/banner*') ? 'active-page' : '' }}">
                    <a href="#"><i data-feather="archive"></i>Point Of Sale</a>
          </li>
          <li class="{{ request()->is('admin/banner*') ? 'active-page' : '' }}">
                    <a href="#"><i data-feather="box"></i>Product Master</a>
          </li>
          <li class="sidebar-title">
                    Lainnya
          </li>
          <li class="{{ request()->is('admin/banner*') ? 'active-page' : '' }}">
                    <a href="#"><i data-feather="gift"></i>Beli System Ini</a>
          </li>
</ul>
