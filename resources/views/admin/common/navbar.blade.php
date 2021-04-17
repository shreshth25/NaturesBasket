<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>
    @php
        use App\Models\Notification;
        $data = Notification::orderBy('created_at','DESC')->get();
    @endphp
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">{{count($data)}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">{{count($data)}} Notifications</span>
            @foreach ($data as $item)
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i>New order placed
              <span class="float-right text-muted text-sm">{{$item->created_at->diffForHumans()}}</span>
            </a>
            @endforeach

      </li>
        </ul>
</nav>
