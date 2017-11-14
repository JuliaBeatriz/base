<!DOCTYPE html>
<html>
<head>
	<title>Prueba</title>
</head>
<body>

	<h1 align="center">Reportes de Categorias</h1>
	<table align="center" width="100%">
		
		<thead>
			<tr>
				<td><strong>Id</strong></td>
				<td><strong>Nombre</strong></td>
				<td><strong>Descripcion</strong></td>
			</tr>

			<tbody>
				@foreach($categorias as $cat)
					<tr>
						<td>{{$cat->idcategoria}}</td>
						<td>{{$cat->nombre}}</td>
						<td>{{$cat->descripcion}}</td>
					</tr>
					@endforeach
			</tbody>

		</thead>

	</table>
		
</body>
</html>