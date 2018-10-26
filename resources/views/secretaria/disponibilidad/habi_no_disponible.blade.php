<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Hotel ICI</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="pagina/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="pagina/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="pagina/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="pagina/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="pagina/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="pagina/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text" href="{{ url('/secretaria') }}">
                    <img src="pagina/img/leon.png" border="0" width="200" height="100">
                </a>
            </div>


            <ul class="nav">
				<li>
                    <a href="s_listado_hoteles">
                        <i class="pe-7s-note2"></i>
                        <p>Listado de Hoteles</p>
                    </a>
                </li>
                <li>
                    <a href="s_listado_habitaciones">
                        <i class="pe-7s-note2"></i>
                        <p>Listado de habitaciones</p>
                    </a>
                </li>
                <li>
                    <a href="s_confirmar_datos">
                        <i class="pe-7s-check"></i>
                        <p>Confirmar</p>
                    </a>
                </li>
                <li>
                    <a href="disponibilidad_secretaria">
                        <i class="pe-7s-close-circle"></i>
                        <p>Disponibilidad</p>
                    </a>
                </li>
                <li class="active">
                    <a href="s_no_disponible">
                        <i class="pe-7s-hammer"></i>
                        <p>Habitaciones no disponible</p>
                    </a>
                </li>
                <li>
                    <a href="s_reportes">
                        <i class="pe-7s-print"></i>
                        <p>Reporte de Ventas</p>
                    </a>
                </li>


                <li class="active-pro">
                    <a href="">
                        <i class="pe-7s-rocket"></i>
                        <p>Creciendo cada Dia</p>
                    </a>
                </li>


            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="secretaria">Bienvenido a Hoteles ICI </a>
                </div>
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <p>
                                      <i class="pe-7s-menu"></i>
                                      {{ Auth::user()->name }}
                                      <b class="caret"></b>
                                  </p>

                            </a>
                          @guest
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                              </li>
                          @else
                            <ul class="dropdown-menu">
                              <li><a href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">Salir</a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </li>
                            </ul>
                          @endguest
                      </li>
                      <li class="separator hidden-lg"></li>
                  </ul>

                </div>
            </div>
        </nav>
        

        <!--En esta seccion se mostraran todo las reservaciones -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Habitaciones con disponibilidad cancelada</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">


                                            <thread>
                                            <th>ID_HABITACION</th>
                                            <th>NUM_PERSONAS</th>
                                            <th>FECHA_INICIO</th>
                                            <th>FECHA SALIDA</th>
                                            <th>ESTADO</th>
                                            <th>ACCION</th>
                                            </thread>
                                            <tbody>

                                            @foreach($reserva as $reser)

                                            <tr>
                                                @if($reser->estado == 2 or $reser->estado == 3 or $reser->estado == 4 )
                                                    <td>{{$reser->id_habitacion}}</td>
                                                    <td>{{$reser->num_personas}}</td>
                                                    <td>{{$reser->fecha_ingreso}}</td>
                                                    <td>{{$reser->fecha_salida}}</td>

                                                @if($reser->estado == 2)
                                                    <td>Mantenimiento</td>
                                                @elseif($reser->estado == 3)
                                                    <td>Remodelación</td>
                                                @else($reser->estado == 4)
                                                    <td>Otro Motivo</td>
                                                @endif
                                                <!--<td>{{$reser->estado}}</td>-->
                                                 <td> <a  href="{{route('secretaria_disponibilidad.destroy', $reser->id)}}" onclick="return confirmacion(¿seguro que desea cancelar la reserva?)"class="btn btn-danger"><i class="pe-7s-trash"></i>  Borrar</a></td>
                                                @endif
                                            </tr>

                                            @endforeach

                                            </tbody>


                                        </table>
                                        {!! $reserva->render()!!}
                                        

                                    </div>
                                    <td> <a  href="home" onclick=""class="btn btn-back">Volver</a></td>



                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>



    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="pagina/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="pagina/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="pagina/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="pagina/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="pagina/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="pagina/js/demo.js"></script>

</html>
