<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title', 'Inicio | Steades') </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
   <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  <!-- bootstrap Datatables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
 <link rel="stylesheet" href="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.css') }}" />

 
   <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

 <!--  <script src="{{ asset('dist/js/select2.js') }}"></script>-->
  <link rel="stylesheet" href="{{ asset('dist/css/select2.css') }}">
{{--   {!!HTML::script('dist/js/select2.js')!!}
  {!!HTML::style('dist/css/select2.css',['rel'=>'stylesheet'])!!} --}}

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
           
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
      <img src="{{ asset('assets/logos/logotipo.png') }}" width="35" height="35" >
      </span>
      <!-- logo for regular state and mobile devices -->
     <span class="logo-lg"><b>Steades</b> Inc.</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         <!-- <li class="dropdown messages-menu">
            <!-- Menu toggle button
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>

                <ul class="menu">
                  <li><!-- start message
                    <a href="#">
                      <div class="pull-left">

                        <img src="{{ asset('dist/img/user2-160x160.png') }}" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                   end message
                </ul>
                <!-- /.menu
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
           /.messages-menu -->

          <!-- Notifications Menu -->
         <!--  <li class="dropdown notifications-menu">
           
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-cubes"></i>

                <span class="label label-warning"></span>
           
            </a>
            <ul class="dropdown-menu">
    
                <li class="header">Usted no posee notificaciones</li>
        
                <li class="header">Usted tiene  notificaciones</li>
       
              <li>
   
                <ul class="menu">
                    
                            <li>
                              <a href="">
                                <i class="fa fa-cubes text-aqua"></i> Articulo agotado
                              </a>
                            </li>
                       

                
                </ul>
              </li>


            </ul>
          </li>
          <li class="dropdown notifications-menu">
        
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-file-text"></i>

        
                <span class="label label-warning"></span>
       
            </a>
            <ul class="dropdown-menu">
          
                <li class="header">Usted no posee notificaciones</li>
         
                <li class="header">Usted tiene  notificaciones</li>
          
              <li>
          
                <ul class="menu">

                 
                            <li>
                              <a href="">
                                <i class="fa fa-file-text text-aqua"></i> La Orden # no se ha pagado
                              </a>
                            </li>
                
              
                </ul>
              </li>


            </ul> -->
          </li> 

          <li class="dropdown user user-menu">

            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ asset('dist/img/user2-160x160.png') }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{ asset('dist/img/user2-160x160.png') }}" class="img-circle" alt="User Image">

                 <p>
                  {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                  <small>Miembro desde {{ Auth::user()->created_at }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">

                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="pull-right">

                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-danger">
                    Salir &nbsp;&nbsp;<i class="fa fa-sign-out"></i>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú de opciones</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ route('home') }}"><i class="fa fa-desktop"></i> <span>Inicio</span></a></li>
        
        @if (Auth::user()->idrole != 4)

        @if (Auth::user()->idrole != 3)
        <li ><a href="{{ route('equipo') }}"><i class="fa fa-group"></i> <span>Equipo de nómina</span></a></li>
        @endif
        <li ><a href="{{ route('timesheet') }}"><i class="fa fa-calendar"></i> <span>Timesheet</span></a></li>
        <li ><a href="{{ route('ajustes.create') }}"><i class="fa fa-ticket"></i> <span>Ajuste de pago</span></a></li>
        @if ((Auth::user()->idrole != 3)&&(Auth::user()->idrole != 4))
        <li ><a href="{{ route('historial') }}"><i class="fa fa-list-alt"></i> <span>Historial e informes</span></a></li>
        @endif
        <li class="treeview">
          <a href="#"><i class="fa fa-gears"></i> <span>Configuración</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>

          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"> Usuarios
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @if (Auth::user()->idrole != 2)
                  <li><a href="{{ route('usuarios.create') }}"><i class="fa fa-circle"></i> Crear usuario</a></li>
                @endif
                @if ((Auth::user()->idrole != 3)||(Auth::user()->idrole != 2))
                  <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-circle"></i> Listado de usuarios</a></li>
                @endif
              </ul>
            </li>
            
          
          </ul>
        </li>
        @endif

        @if (Auth::user()->idrole == 4)
        <li ><a href="{{ route('historial') }}"><i class="fa fa-list-alt"></i> <span>Historial e informes</span></a></li>
        <li ><a href="{{ route('resetPassword') }}"><i class="fa fa-key"></i> <span>Reset Password</span></a></li>
        


        @endif

        <li>
          <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    <i class="fa fa-sign-out"></i>
                    <span class="s-text">Salir</span>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
          </a>
        </li>

    
   

      </ul>

      <!-- /.sidebar-menu -->
    </section>

    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

  @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#"><b> Steades Inc</b></a>.</strong> All rights reserved.
  </footer>
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('plugins/moment/moment.js') }}"></script>

<!-- <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>-->
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!--<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>-->
<!-- AdminLTE App -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<!-- Select2 -->
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/select2/i18n/es.js') }}"></script>

<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('plugins/datepicker/locales/bootstrap-datepicker.es.js') }}"></script>
<!-- bootstrap color picker -->
<!-- DataTable -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- Bootstrap Datetimepicker v4.17.47 -->
<script src="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>

<!-- SweetAlert -->
<script src="{{ asset('plugins/sweetAlert/sweetalert.js') }}"></script>

<script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>


<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>


<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>


<script>
$( document ).ready(function() {


    $('.datepicker').datepicker({
       autoclose: true,
       closeText: 'Cerrar',
       prevText: '< Ant',
       nextText: 'Sig >',
       currentText: 'Hoy',
       monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
       monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
       dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
       dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
       dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
       weekHeader: 'Sm',
       dateFormat: 'd/m/y',
       firstDay: 1,
       isRTL: false,
       showMonthAfterYear: false,
       yearSuffix: ''
    });
});
</script>

@yield('javascript')
<script type="text/javascript">
  $(function () {

  

  });
</script>
</body>
</html>