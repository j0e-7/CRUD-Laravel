@extends('template')
@section('title','Ingresar Estudiante')
@section('content')
<h1>Crear Nuevo Estudiante</h1>
<form action="{{url('estudiantes/')}}" method="POST">
    @csrf
  <div class="mb-3">
  <label for="lblCedula" class="form-label">Cedula</label>
  <input type="text" name ="cedula" class="form-control" id="cedula">
  </div>
  <div class="mb-3">
    <label for="lblNombre" class="form-label">Nombre</label>
    <input type="text" name ="nombre" class="form-control" id="nombre">
  </div>
  <div class="mb-3">
    <label for="lblApellido" class="form-label">Apellido</label>
    <input type="text"  name ="apellido" class="form-control" id="apeliido">
  </div>
  <div class="mb-3">
    <label for="lblDireccion" class="form-label">Direccion</label>
    <input type="text"  name ="direccion" class="form-control" id="direccion">
  </div>
  <div class="mb-3">
    <label for="lblTelefono" class="form-label">Telefono</label>
    <input type="text" name ="telefono" class="form-control" id="telefono">
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection