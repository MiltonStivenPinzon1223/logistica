<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <title>Royale House</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Logistica</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('img').$user->photo}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{$user->name}}</h6>
                        <span>{{$user->roles->rol}}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="fa fa-th me-2"></i>Inicio</a>
                    @if ($user->id_roles == 1)
                        <a href="{{route('assistences.show', $user->id)}}" class="nav-item nav-link"><i class="fa fa-address-book me-2"></i>Historial eventos</a>
                        <a href="{{route('certificates.index')}}" class="nav-item nav-link"><i class="fa fa-address-book me-2"></i>Mis certificados</a>
                        <a href="{{route('collection.accounts.index')}}" class="nav-item nav-link"><i class="fa fa-address-book me-2"></i>Mis ganancias</a>
                    @endif
                    @if ($user->id_roles == 2)
                        <a href="{{route('events.index')}}" class="nav-item nav-link"><i class="fa fa-address-book me-2"></i>Historial eventos</a>
                        <a href="{{route('assistences.index')}}" class="nav-item nav-link"><i class="fa fa-address-book me-2"></i>Asistencias</a>
                        <a href="{{route('solicitudes.index')}}" class="nav-item nav-link"><i class="fa fa-address-book me-2"></i>Solicitudes</a>
                    @endif
                    @if ($user->id_roles == 3)
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Menu</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('roles.index') }}" class="nav-item nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">Roles</a>
                            <a href="{{ route('type.certificates.index') }}" class="nav-item nav-link {{ request()->routeIs('type.certificates.index') ? 'active' : '' }}">Tipo de certificados</a>
                            <a href="{{ route('type.clothings.index') }}" class="nav-item nav-link {{ request()->routeIs('type.clothings.index') ? 'active' : '' }}">Tipo de vestimentas</a>
                            <a href="{{ route('users.index') }}" class="nav-item nav-link {{ request()->routeIs('type.clothings.index') ? 'active' : '' }}">Usuarios</a>
                            <a href="{{ route('certificates.index') }}" class="nav-item nav-link {{ request()->routeIs('type.clothings.index') ? 'active' : '' }}">Certificados</a>
                        </div>
                    </div>
                    @endif
                    <a href="{{route('profile')}}" class="nav-item nav-link"><i class="fa fa-address-book me-2"></i>Mi perfil</a>
                    <a class="nav-item nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-window-close me-2"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        @yield('content')
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>