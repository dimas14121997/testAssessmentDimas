<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Home
          </a>
        </li>
          @can('isNotVendor')
 
        <li class="nav-item">
          <a class="nav-link" href="/user-management">
            <span data-feather="file-text"></span>
            User Management
          </a>
        </li>
        @endcan
        <li class="nav-item">
          <a class="nav-link" href="/vendor">
            <span data-feather="file-text"></span>
            Vendor
          </a>
        </li>
      </ul>

    </div>
  </nav>