<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Marcaciones</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AD</b>V</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Marcaciones</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">En linea &nbsp; </small>
                  <span class="hidden-xs">{{auth()->user()->name}}</span>
                </a>

                <ul class="dropdown-menu">
                  <li class="user-footer">
                    <div class="pull-right">
                      <form class="" action="{{ route('logout') }}" method="post">
                        {{ csrf_field() }}
                        <button class="btn btn-danger btn-xs btn-block" >Cerrar sesion</button>
                      </form>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Inicio</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('welcome')}}"><i class="fa fa-circle-o"></i> Pagina de inicio</a></li>
                {{-- <li><a href="{{url('almacen/articulo')}}"><i class="fa fa-circle-o"></i> Artículos</a></li> --}}
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cog"></i>
                <span>Ingreso de datos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               {{-- <li><a href="{{url('/')}}"><i class="fa fa-circle-o"></i> Inicio</a></li> --}}
                <li><a href="{{url('cargar')}}"><i class="fa fa-circle-o"></i> Cargar archivo</a></li>
                
              </ul>
            </li>



            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Funcionarios</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('funcionarios')}}"><i class="fa fa-circle-o"></i>Listar funcionarios</a></li>
                {{-- <li><a href="{{url('compras/proveedor')}}"><i class="fa fa-circle-o"></i>Proveedores</a></li> --}}
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-clock-o"></i>
                <span>Atrasos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('historico')}}"><i class="fa fa-circle-o"></i> Notificar</a></li>
                <li><a href="{{url('atrasos')}}"><i class="fa fa-circle-o"></i> Ver</a></li> 

              </ul>
            </li>


          
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file"></i> <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('reportes')}}"><i class="fa fa-circle-o"></i>Funcionarios más atrasados</a></li>
                <li><a href="{{url('listar')}}"><i class="fa fa-circle-o"></i>Funcionarios Marcaciones</a></li> --}}
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('seguridad/usuario')}}"><i class="fa fa-circle-o"></i> Usuarios</a></li>

              </ul>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>

                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2017 <a href="www.pachasoft.com"></a>.</strong> All rights reserved.
      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts') <!-- para usas jscript -->
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>

  </body>
</html>