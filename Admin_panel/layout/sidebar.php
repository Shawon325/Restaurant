<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Tin Tin Restaurant<sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="?">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="users">
          <i class="fa fa-user"></i>
          <span>Users</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="users" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User details:</h6>
            <a class="collapse-item" href="?page=add_users">Add Users</a>
            <a class="collapse-item" href="?page=manage_users">Manage Users</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#groups" aria-expanded="true" aria-controls="groups">
          <i class="fa fa-users"></i>
          <span>Groups</span>
        </a>
        <div id="groups" class="collapse" aria-labelledby="groups" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Group details:</h6>
            <a class="collapse-item" href="?page=add_group">Add Groups</a>
            <a class="collapse-item" href="?page=manage_group">Manage Groups</a>
          </div>
        </div>
      </li>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Stores Info
  </div>

  <li class="nav-item">
    <a class="nav-link" href="?page=stores">
      <i class="fa fa-store"></i>
      <span>Stores</span>
    </a>
    <a class="nav-link" href="?page=tables">
      <i class="fa fa-table"></i>
      <span>Tables</span>
    </a>

    <a class="nav-link" href="?page=category">
      <i class="fas fa-puzzle-piece"></i>
      <span>Category</span>
    </a>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products" aria-expanded="true" aria-controls="products">
        <i class="fas fa-pizza-slice"></i>
        <span>Products</span>
      </a>
      <div id="products" class="collapse" aria-labelledby="products" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Product details:</h6>
          <a class="collapse-item" href="?page=add_products">Add Product</a>
          <a class="collapse-item" href="?page=manage_products">Manage Products</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orders" aria-expanded="true" aria-controls="orders">
        <i class="fas fa-plus-square"></i>
        <span>Order</span>
      </a>
      <div id="orders" class="collapse" aria-labelledby="orders" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Order details:</h6>
          <a class="collapse-item" href="?page=add_orders">Add Order</a>
          <a class="collapse-item" href="?page=manage_orders">Manage Orders</a>
        </div>
      </div>
    </li>
<!-- 
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reports" aria-expanded="true" aria-controls="reports">
        <i class="fas fa-file-alt"></i>
        <span>Report</span>
      </a>
      <div id="reports" class="collapse" aria-labelledby="reports" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Report details:</h6>
          <a class="collapse-item" href="?page=product_reports">Product Wise</a>
          <a class="collapse-item" href="?page=store_reports">Total Store Wise</a>
        </div>
      </div>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Account Details
    </div>

    <li class="nav-item">

      <a class="nav-link" href="?page=company_info">
        <i class="fas fa-align-justify"></i>
        <span>Company Info</span></a>

        <!-- <a class="nav-link" href="?page=profile">
          <i class="fas fa-id-card-alt"></i>
          <span>Profile</span></a>

        <a class="nav-link" href="?page=setting">
          <i class="fa fa-wrench"></i>
          <span>setting</span></a> -->

          <a class="nav-link" href="?action=log_out">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span></a>
    </li>




  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">