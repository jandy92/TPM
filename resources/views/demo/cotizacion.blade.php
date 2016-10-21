@extends('master')
@section('title','Nueva cotizacion')
@section('content')

<div class="container">
    <h1> Nueva Cotización</h1>
    <form class="form-horizontal" role="form">
  <div class="form-group">
    <label >Empresa</label>
    <select class="form-control">
  <option>Selecciona empresa</option>
  <option>CCU</option>
  <option>L.A.M.P. Comunicaciones</option>
  <option>Kunstmann</option>
  <option>Monsters I.N.C.</option>
</select>
  </div>

  <div class="form-group">
    <label>Persona de  contacto</label>
    <select class="form-control">
  <option>Selecciona contacto</option>
  <option>José Oporto</option>
  <option>Carlos Zúñiga</option>
  <option>Pedro Miranda</option>
  <option>Bill Jobs</option>
  <option>Steve Gates</option>
</select>
  </div>
  <div class="form-group">
    <label>Giro</label>
    <input type="text" class="form-control" id="giro"
           placeholder="Introduce giro">
  </div>
  <div class="form-group">
    <label>Trabajo</label>
    <textarea class="form-control" rows="3" placeholder="Introduce trabajo a cotizar"></textarea>

  </div>


  <button type="submit" class="btn btn-primary">Realizar Cotización</button>
</form>
  </div>

@endsection