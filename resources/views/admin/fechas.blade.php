<!DOCTYPE html>
<html>
<head>
	<title>Reporte de ventas</title>
</head>
<style>

 .col-md-12 {
    width: 100%;
}

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    background-color: #ECF0F5;
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}

.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}


.box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;

}


.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff;
}


.table-bordered {
    border: 1px solid #f4f4f4;
}


.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

table {
    background-color: transparent;
}

 .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #f4f4f4;
}


.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
}

.bg-red {
    background-color: #dd4b39 !important;
}


</style>

<body>
	<div class="navbar-header">
		<div class="table">

			 <img src="pagina/img/leons.png" border="0" width="150" height="100">
			 <h3 align="center" class="box-header with-border">
				 <font face="Times New Roman " size="15">RESERVAS</font></h3>
		</div>
	</div><br>
	<div class="col-md-12">
			<div class="box">
					<div class="content">
							<table class = "table">
								<thead>
									<tr>
										<th>Id</th>
										<th>Precio</th>
										<th>Fecha Ingreso</th>
										<th>Fecha Salida</th>

									</tr>
								</thead>
								<tbody>
									@foreach($reserva as $rese)
										<tr>
											<td>{{ $rese->id}}</td>
											<td>{{ $rese->costo}}</td>
											<td>{{ $rese->fecha_ingreso}}</td>
											<td>{{ $rese->fecha_salida}}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>


</body>
</html>
