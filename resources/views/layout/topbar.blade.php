
<div class="d-flex align-items-center justify-content-between">
  <i class="bi bi-list toggle-sidebar-btn me-3"></i>
    <a href="/dashboard" class="logo d-flex align-items-center">
      <span class="d-none d-lg-block">HRIS.co</span>
    </a>
  </div><!-- End Logo -->


  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      {{-- <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li> --}}
      <!-- End Search Icon-->

      <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          @if($notifications->count() > 0)
          <span class="badge bg-primary badge-number">{{count($notifications)}}</span>
          @endif
        </a>
        <!-- End Notification Icon -->
        <div class="notif-container">
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
        </div>
        <!-- End Notification Dropdown Items -->

      </li>
      <!-- End Notification Nav -->

      {{-- <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-left-text"></i>
          <span class="badge bg-success badge-number">3</span>
        </a><!-- End Messages Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          <li class="dropdown-header">
            You have 3 new messages
            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="message-item">
            <a href="#">
              <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
              <div>
                <h4>Maria Hudson</h4>
                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                <p>4 hrs. ago</p>
              </div>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="message-item">
            <a href="#">
              <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
              <div>
                <h4>Anna Nelson</h4>
                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                <p>6 hrs. ago</p>
              </div>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="message-item">
            <a href="#">
              <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
              <div>
                <h4>David Muldon</h4>
                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                <p>8 hrs. ago</p>
              </div>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="dropdown-footer">
            <a href="#">Show all messages</a>
          </li>

        </ul><!-- End Messages Dropdown Items -->

      </li><!-- End Messages Nav --> --}}

      <li class="nav-item dropdown pe-3">
        @if(auth()->user()->hasIncompleteProfile())
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="{{asset('illustration/default.png')}}" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->username}}</span>
        </a><!-- End Profile Iamge Icon -->
        @else
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="{{asset('illustration/default.png')}}" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->member->nama}}</span>
        </a><!-- End Profile Iamge Icon -->
        @endif

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            @if(auth()->user()->hasProfile())
            <h6>{{auth()->user()->member->nama}}</h6>
            @else
            <h6>{{auth()->user()->username}}</h6>
            @endif
            <span>{{auth()->user()->role->role}}</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="/profile">
              <i class="fa-solid fa-user"></i>
              <span>My Profile</span>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="/profile">
              <i class="fa-solid fa-list-check"></i>
              <span>Riwayat Nilai & Tugas</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>


        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->
<x-notify::notify />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Panggil fungsi startPolling saat halaman selesai dimuat
    // $(document).ready(function() {
    //     startPolling();
    // });

    // function loadNewMessages() {
    //     $.ajax({
    //         url: "{{ route('notif.get') }}",
    //         type: "GET",
    //         dataType: "html",
    //         success: function(response) {
    //             // Ganti konten div atau elemen lain yang menampilkan pesan
    //             $("#notif-container").html(response);
    //             console.log("Pesan Diperbarui !");
    //         }
    //     });
    // }

    // // Fungsi untuk memperbarui secara berkala setiap beberapa detik
    // function startPolling() {
    //     setInterval(function() {
    //         loadNewMessages();
    //     }, 5000); // Ubah angka ini menjadi waktu refresh dalam milidetik (misalnya, 5000 untuk refresh setiap 5 detik)
    // }

    $(document).on('click', '.notification-item', function(e) {
        e.preventDefault();

        var url = $(this).data('url');

        // Kirim permintaan Ajax untuk mengubah status notifikasi menjadi "dibaca"
        $.ajax({
            url: '{{ route('read') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                notificationUrl: url
            },
            success: function(response) {
                // Redirect pengguna ke URL yang disimpan pada notifikasi
                window.location.href = url;
            },
            error: function(xhr, status, error) {
                // Tindakan penanganan kesalahan jika diperlukan
            }
        });
    });
</script>