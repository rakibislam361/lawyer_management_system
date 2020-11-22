<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin </div>
    </a>

    <!-- Divider -->
<!--    <hr class="sidebar-divider my-0">-->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
<!--    <hr class="sidebar-divider">-->

    <!-- Heading -->
    <div class="sidebar-heading">
        PAGES
    </div>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="mail_send.php" >
            <i class="fas fa-fw fa-envelope"></i><span>Mailing</span>
        </a>
        <a class="nav-link collapsed" href="enroll_membership.php" >
            <i class="fas fa-fw fa-user"></i><span>Enroll Lawyer list</span>
        </a>
        <a class="nav-link collapsed" href="membership_plan.php" >
            <i class="fas fa-fw fa-handshake"></i><span>Membership Plan</span>
        </a>
        <a class="nav-link collapsed" href="all_clients.php" >
            <i class="fas fa-fw fa-users"></i><span>Clients</span>
        </a>
        <a class="nav-link collapsed" href="all_lawyers.php" >
            <i class="fas fa-fw fa-user-tie"></i><span>Lawyers</span>
        </a>
        <a class="nav-link collapsed" href="all_cases.php" >
            <i class="fas fa-fw fa-file"></i><span>Cases</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-cog"></i>
                <span>Utilities</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="service.php">Lawyer services</a>
                </div>
            </div>
        </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <li class="nav-item">
        <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-power-off"></i>
            <span>Log out</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
