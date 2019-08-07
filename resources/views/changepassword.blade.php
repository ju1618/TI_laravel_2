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
  overflow: hidden;
}

</style>


<div class="container">
 <div class="contenedorform">
   <div data-type="timetable" data-id="85503" id="wgt-85503" class="tap-sport-tools" style="width:100%; height:auto;">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cambiar contraseña</div>

                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form class="form-horizontal" method="POST" action="/home">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="control-label">Contraseña actual</label>

                            <div class="">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Nueva contraseña</label>

                            <div class="">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm" class="control-label">Confirmar nueva contraseña</label>

                            <div class="">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <center>  <button type="submit" class="btn btn-primary">
                                      Cambiar contraseña
                                  </button></center>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
