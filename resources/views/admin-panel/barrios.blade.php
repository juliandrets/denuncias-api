@extends('admin-panel.struct.index')

@section('content')
<div class="wrapper">

  <?php $section = 'barrios'; ?>
  @include('admin-panel.struct.header')
  @include('admin-panel.struct.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barrios
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Barrios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title  pull-left">Barrios cargados</h3>
                <div class="pull-right">
                  <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#create"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Barrio</button>
                </div>
              </div>

              <!-- /.box-header -->
              <div class="box-body">

                @if($event = app('request')->input('event'))
                  <section class="notifications">
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <i class="icon fa fa-check"></i> El barrio fue
                      @if($event == 'created')
                        creado correctamente.
                      @elseif($event == "delete")
                        borrado correctamente.
                      @elseif($event == 'update')
                        modificado correctamente.
                      @endif
                    </div>
                  </section>
                @endif

                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th style="width: 150px">Acciones</th>
                  </tr>
                  @foreach($barrios as $barrio)
                    <tr>
                      <td>{{ $loop->iteration }}.</td>
                      <td>{{ $barrio->name }}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info" data-toggle="dropdown"><i class="fa fa-cogs" aria-hidden="true"></i></button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li>
                              <a href="#">
                                <button type="button" style="background-color: transparent; padding: 0px; border: none" data-toggle="modal" data-target="#barrio-edit-{{ $barrio->id }}">
                                  <i class="fa fa-pencil" aria-hidden="true" style="margin-right: 10px"></i> Editar
                                </button>
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <button type="button" style="background-color: transparent; padding: 0px; border: none" data-toggle="modal" data-target="#barrio{{ $barrio->id }}">
                                  <i class="fa fa-trash" aria-hidden="true" style="margin-right: 10px"></i> Eliminar
                                </button>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <div class="pull-right">
                  {{ $barrios->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>


    <!-- Delete modal -->
    @foreach($barrios as $barrio)
    <div class="modal fade" id="barrio{{ $barrio->id }}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Borrar Barrio</h4>
          </div>
          <div class="modal-body">
            <p>Esta seguro de borrar el siguiente barrio? ({{ $barrio->name }}).</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            <a href="/api/adm/barrios/{{ $barrio->id }}/delete"><button type="button" class="btn btn-danger">Borrar Barrio</button></a>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    <!-- Update modal -->
    @foreach($barrios as $barrio)
    <div class="modal fade" id="barrio-edit-{{ $barrio->id }}">
      <form role="form" method="POST" action="/api/adm/barrios/{{ $barrio->id }}/update">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Editar barrio ({{ $barrio->name }})</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" name="name" class="form-control" placeholder="Nombre del Barrio" value="{{ $barrio->name }}">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success">Editar Barrio</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    @endforeach

    <!-- Create modal -->
    <div class="modal fade" id="create">
      <form role="form" method="POST" action="/api/adm/barrios">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Cargar nuevo barrio</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" name="name" class="form-control" placeholder="Nombre del Barrio">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success">Cargar Barrio</button>
            </div>
          </div>
        </div>
      </form>
    </div>

  </div>

@endsection

