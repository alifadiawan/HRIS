<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
  <li class="dropdown-header">
    You have {{count($notifications)}} new notifications
    <!-- <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a> -->
  </li>
  @if($notifications->count() > 0)
  <li>
    <hr class="dropdown-divider">
  </li>
  @endif
    @include('notification.notif')
</ul>