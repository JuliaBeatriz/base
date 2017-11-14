
@extends('layouts.admin')
@section('contenido')
<div class="container">
    {{--El row esta creando una fila --}}
    <div class="row">
	    <div class="col-md-12">
		    <h3>Administración de categorias <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
	    </div>
    </div>

 {{--Este div crea una fila donde se realizara la busqueda de datos --}}
    <div class="row">
	    	<div class="col-md-12">
	    		@include('almacen.categoria.search')
	    	</div>
	    </div>


{{--En este otro row esta creando de nuevo otra fila --}}

    <div class="row">
	    <div class="col-md-12">
	    	<div class="table-responsive">
	    		{{-- La parte table.striped funciona para que la tabla te muestre de dos colores en blanco y gris --}}
	    		<table class="table table-striped table-bordered">
	    			{{-- Encabezado de tabla --}}
	    			<thead>
	    				<th>Id</th>
	    				<th>Nombre</th>
	    				<th>Descripcion</th>
	    				<th>Opciones</th>
	    			</thead>
	    	{{-- Estamos recorriendo la tabla categoria y tomamos un registro al cual llamamos $cat --}}
		   @foreach ($categorias as $cat)
		         <tr>
		         	<td>{{$cat->idcategoria}}</td>
		         	<td>{{$cat->nombre}}</td>
		         	<td>{{$cat->descripcion}}</td>
		         	{{-- Colocamos las opciones --}}
		         	<td>
		         		<a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}">
		         			
		         		<button class="btn btn-primary">Editar</button>

		         	</a>

		         		<a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal">
		         		<button class="btn btn-danger">Eliminar</button></a>

		         	</td>
		         </tr>
		         @include('almacen.categoria.modal')
		   @endforeach 
		        </table>
		    </div>
		    {{--Crea fichas con las paginas de registro --}}
		    {{$categorias->render()}}
		    <h6>Este espacio es lo que hace el render</h6>
	    </div>
    </div>
</div>
@endsection