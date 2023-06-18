<ul class="sidebar-nav" id="sidebar-nav">

    <!-- logo -->
    <div class="row align-items-center justify-content-center mb-4">
        <a href="index.html" class="logo text-center">
            <span class="d-none d-lg-block">HRIS.co</span>
        </a>
    </div>
    <li class="nav-heading">Pages</li>

    <li class="nav-item">
        <a class="nav-link " href="/dashboard">
            <i class="fa-solid fa-border-all fa-lg"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- End Dashboard Nav -->

        {{-- <li class="nav-item">
            <a class="nav-link " href="/employee-list">
                <i class="fa-solid fa-users"></i>
                <span>Employee List</span>
            </a>
        </li> --}}

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="fa-solid fa-wallet fa-lg"></i><span>Payroll</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="charts-chartjs.html">
                    <i class="bi bi-circle"></i><span>Chart.js</span>
                </a>
            </li>
            <li>
                <a href="charts-apexcharts.html">
                    <i class="bi bi-circle"></i><span>ApexCharts</span>
                </a>
            </li>
            <li>
                <a href="charts-echarts.html">
                    <i class="bi bi-circle"></i><span>ECharts</span>
                </a>
            </li>
        </ul>
    </li><!-- End Charts Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="fa-solid fa-lg fa-square-poll-vertical"></i><span>KPI</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{route('goals.index')}}">
                    <i class="bi bi-circle"></i><span>Goals Team</span>
                </a>
            </li>
            <li>
                <a href="{{route('kpi.index')}}">
                    <i class="bi bi-circle"></i><span>Group Data</span>
                </a>
            </li>
            <li>
                <a href="/reports">
                    <i class="bi bi-circle"></i><span>Sales Reports</span>
                </a>
            </li>
            {{-- <li>
                <a href="/index-employe">
                    <i class="bi bi-circle"></i><span>Data Employee</span>
                </a>
            </li> --}}
        </ul>
    </li><!-- End Icons Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="/progress">
            <i class="fa-solid fa-circle-info fa-lg"></i>
            <span>Detail Progress</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="fa-solid fa-right-from-bracket fa-lg"></i>
            <span>Log out</span>
        </a>
    </li>

    

</ul>
