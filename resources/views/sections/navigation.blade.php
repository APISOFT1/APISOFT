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
                           
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/chartRecepcion/') }}">Recepción
                           
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/chartStock/') }}">Productos
                           
                            
                        </a>
                    </li>
                    @if(Auth::check())
                    @if (Auth::user()->isAdmin())
    
                    <li>
                        <a href="{{ url('/chartIngreso/') }}">Ingreso Por Miel
                           
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/chartIngresoCera/') }}">Ingreso Por Cera
                           
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/chartIngresoInventario/') }}">Ingreso Por Inventario
                            
                            
                        </a>
                    </li>
                    @endif
@endif
                </ul>
                @if(Auth::check())
                    @if (Auth::user()->isAdmin())
                    <li><a><i class="fa fa-briefcase"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li>
                        <a href="{{ url('/users/') }}">Gestionar Usuarios
                            <i class="fa fa-home" aria-hidden="true"></i>
                            
                        </a>
                    </li>
                    

                    @endif
                    @endif
                    </ul>

                    <li><a><i class="fa fa-home"></i> Planta <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li>
                        <a href="{{ url('Estanon') }}">Gestionar Estañones
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/RecepEstanon/') }}">Gestionar Recepción-Estañón
                            
                        </a>
                    </li>
                  
            
                   
                    
                    
                </ul>
                @if(Auth::check())
                    @if (Auth::user()->isAdmin())
                <li><a><i class="fa fa-users"></i> Afiliado <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li>
                        <a href="{{ url('Afiliado') }}">Gestionar Afiliado
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/Ubicacion/') }}">Gestionar Ubicación
                            
                        </a>
                    </li>
                  
                    <li>
                        <a href="{{ url('/Apiario/') }}">Gestionar Apiario
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/AfiliadoApiario/') }}">Gestionar Afiliado-Apiario
                            
                        </a>
                    </li>
                   
               
                    @endif
                    @endif
                    </ul>
                <li><a><i class="fa fa-list-alt"></i> Recepción <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li>
                        <a href="{{ url('RecepcionMateriaPrima') }}">Gestionar Recepción
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/Cera/') }}">Gestionar Extracción Cera
                            
                        </a>
                    </li>
                   

                </ul>
               
                
                <li><a><i class="fa fa-shopping-cart"></i> Inventario <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li>
                        <a href="{{ url('Stok') }}">Gestionar Stock
                            
                        </a>
                    </li>
                    </ul>

                    <li><a><i class="fa fa-cart-plus"></i> Servicios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li>
<<<<<<< HEAD
                        <a href="{{ url('Stok') }}">Gestionar Stock
=======
<<<<<<< HEAD
<<<<<<< .merge_file_a22668
                        <a href="{{ url('/IngresoCera/') }}">Gestionar Servicio Cera
=======
                        <a href="{{ url('Stok') }}">Gestionar Stock
>>>>>>> .merge_file_a07124
=======
                        <a href="{{ url('Stok') }}">Gestionar Stock
>>>>>>> Caro
>>>>>>> jeremy
                            
                        </a>
                    </li>
                    <li>
<<<<<<< HEAD
                        <a href="{{ url('/IngresoCera/') }}">Gestionar Servicio Cera
=======
<<<<<<< HEAD
<<<<<<< .merge_file_a22668
                        <a href="{{ url('/IngresoInventario/') }}">Gestionar Servicio Inventario
=======
                        <a href="{{ url('/IngresoCera/') }}">Gestionar Servicio Cera
>>>>>>> .merge_file_a07124
=======
                        <a href="{{ url('/IngresoCera/') }}">Gestionar Servicio Cera
>>>>>>> Caro
>>>>>>> jeremy
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/IngresoInventario/') }}">Gestionar Servicio Inventario
                            
                        </a>
                    </li>
                    
                   
                    
                        </a>
                    </li>
                    

                </ul>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
</div>
</body>