  <!-- Main Sidebar Container -->
  <aside class="main-sidebar bg-success sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text text-white">Nature's Basket</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-white text-uppercase">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-white">Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-white">Category</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-white">Product</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('banner.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-white">Banner</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('users')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-white">Users</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.cart')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-white">Carts</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{route('admin.orders')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-white">Orders</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('faq.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-white">faq</p>
                </a>
            </li>

        </ul>
      </nav>
    </div>
  </aside>
