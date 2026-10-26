<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <img src="{{ asset('assets-admin/img/icons/brands/vand.png') }}" style="height:48px">
      <strong class="ms-2" style="font-size:22px">VandRent.</strong>
      <span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>

    <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
    <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>Dashboard</div>
    </a>
    </li>

    <li class="menu-item {{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}">
      <a href="{{ route('admin.layanan.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-package"></i>
        <div class="text-truncate">Kelola layanan</div>
      </a>
    </li>

    <li class="menu-item {{ request()->routeIs('admin.operator.*') ? 'active' : '' }}">
      <a href="{{ route('admin.operator.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div class="text-truncate">Kelola operator</div>
      </a>
    </li>

    <li class="menu-item {{ request()->routeIs('admin.rekening.*') ? 'active' : '' }}">
      <a href="{{ route('admin.rekening.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-wallet"></i>
        <div class="text-truncate">Kelola rekening</div>
      </a>
    </li>
  </ul>
</aside>
<!-- / Menu -->
