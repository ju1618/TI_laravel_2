@extends('layouts.template')

@section('content')

<style media="screen">
.card{
  width: 100%;
}

body{
  padding-top: 100px;
}
.container{
  /*border: 3px solid black;*/
  overflow: hidden;
}

.contenedorform{
  background-color: #F52854;
  height: auto;
  width: auto;
  padding: 25px 25px 25px 25px;
  border-radius: 0 0 10px 10px;
  margin-bottom: 10px;
  align-content: center;
}

</style>

<div class="container">
  <div class="contenedorform">
    <form id="form-change-password" role="form" method="POST" action="/home" novalidate class="form-horizontal">
    <div class="col-md-9">
      <label for="current-password" class="col-sm-4 control-label">Current Password</label>
      <div class="col-sm-8">
        <div class="form-group">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
        </div>
      </div>
      <label for="password" class="col-sm-4 control-label">New Password</label>
      <div class="col-sm-8">
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>
      <label for="password_confirmation" class="col-sm-4 control-label">Re-enter Password</label>
      <div class="col-sm-8">
        <div class="form-group">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-5 col-sm-6">
        <button type="submit" class="btn btn-danger">Enviar</button>
      </div>
    </div>
  </form>
 </div>
</div>

@endsection
