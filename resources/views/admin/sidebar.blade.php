
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend/image/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{route('admin.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                Dashboard
            </a>
          </li>
          <li class="nav-item has-treeview {{ Route::currentRouteName() == ('admin.category.create') || Route::currentRouteName() == ('admin.category.index') || Route::currentRouteName() == ('admin.category.edit') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.category.create')}}" class="{{  Route::currentRouteName() == ('admin.category.create') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.category.index')}}" class=" {{  Route::currentRouteName() == ('admin.category.index') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ Route::currentRouteName() == ('admin.brand.create') || Route::currentRouteName() == ('admin.brand.index') || Route::currentRouteName() == ('admin.brand.edit') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                Brand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.brand.create')}}" class="{{  Route::currentRouteName() == ('admin.brand.create') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.brand.index')}}" class="{{  Route::currentRouteName() == ('admin.brand.index') ||  Route::currentRouteName() == ('admin.brand.edit') ? 'active' : '' }}  nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview {{ Route::currentRouteName() == ('admin.company.create') || Route::currentRouteName() == ('admin.company.index') || Route::currentRouteName() == ('admin.company.edit') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Company 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.company.create')}}" class="{{  Route::currentRouteName() == ('admin.company.create') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.company.index')}}" class="{{  Route::currentRouteName() == ('admin.company.index') ||  Route::currentRouteName() == ('admin.company.edit') ? 'active' : '' }}  nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ Route::currentRouteName() == ('admin.product.create') || Route::currentRouteName() == ('admin.product.index') || Route::currentRouteName() == ('admin.product.edit') || Route::currentRouteName() == ('admin.pageproduct') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-share"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.product.create')}}" class=" {{  Route::currentRouteName() == ('admin.product.create') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.product.index')}}" class="{{  Route::currentRouteName() == ('admin.product.index') ||  Route::currentRouteName() == ('admin.product.edit') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.pageproduct')}}" class="{{  Route::currentRouteName() == ('admin.pageproduct') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ Route::currentRouteName() == ('admin.producttype.create') || Route::currentRouteName() == ('admin.producttype.index') || Route::currentRouteName() == ('admin.producttype.edit') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Product Type
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.producttype.create')}}" class=" {{  Route::currentRouteName() == ('admin.producttype.create') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.producttype.index')}}" class="{{  Route::currentRouteName() == ('admin.producttype.index') ||  Route::currentRouteName() == ('admin.producttype.edit') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ Route::currentRouteName() == ('admin.unit.create') || Route::currentRouteName() == ('admin.unit.index') || Route::currentRouteName() == ('admin.unit.edit') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Unit
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.unit.create')}}" class=" {{  Route::currentRouteName() == ('admin.unit.create') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.unit.index')}}" class="{{  Route::currentRouteName() == ('admin.unit.index') ||  Route::currentRouteName() == ('admin.unit.edit') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview {{ Route::currentRouteName() == ('admin.metatag.create') || Route::currentRouteName() == ('admin.metatag.index') || Route::currentRouteName() == ('admin.metatag.edit') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Meta Tag
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.metatag.create')}}" class=" {{  Route::currentRouteName() == ('admin.metatag.create') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.metatag.index')}}" class="{{  Route::currentRouteName() == ('admin.metatag.index') ||  Route::currentRouteName() == ('admin.metatag.edit') ? 'active' : '' }} nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" 
              onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="nav-icon far fa-circle text-info"></i>
              <p>Log Out</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>







