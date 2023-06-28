<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
  <i class="bi bi-bell"></i>
  @if($notifications->count() > 0)
  <span class="badge bg-primary badge-number">{{count($notifications)}}</span>
  @endif
</a>
<!-- End Notification Icon -->
<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
  <li class="dropdown-header">
    You have {{count($notifications)}} new notifications
    <p style="font-size: 11px">Click to dismiss</p>
    <!-- <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a> -->
  </li>
  @if($notifications->count() > 0)
  <li>
    <hr class="dropdown-divider">
  </li>
  @endif
    @include('notification.notif')
</ul>