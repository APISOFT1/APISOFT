
<body class="nav-md">
<div class="container body">
    <div class="main_container">
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('dashboard') }}" class="site_title">
            <i class="fa fa-home"></i> <span>AAPIS Chorotega</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/b666f811889067.562541eff3013.png" class="img-circle profile_img">
            </div>
            <div class="profile_info">
            <span>Bienvenido</span>
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                <li><a><i class="fa fa-bar-chart-o"></i> Estadísticas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li>
                        <a href="{{ route('dashboard') }}">Afiliado   
                            <i class="fa fa-user" aria-hidden="true"></i>
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/chartRecepcion/') }}">Recepción
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/chartIngreso/') }}">Ingreso
                            <i class="fa fa-money" aria-hidden="true"></i>
                            
                        </a>
                    </li>
                </ul>
    
                    <li><a><i class="fa fa-user"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li>
                        <a href="{{ url('/users/') }}">Usuarios
                            <i class="fa fa-home" aria-hidden="true"></i>
                            
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/register/') }}">Registrar
                            <i class="fa fa-user" aria-hidden="true"></i>
                            
                        </a>
                    </li>
                </ul>
           
           
            
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
</div>
</body>