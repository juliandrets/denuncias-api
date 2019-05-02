@extends('admin-panel.struct.index')

@section('content')
<div class="wrapper">

  <?php $section = 'home'; ?>
  @include('admin-panel.struct.header')
  @include('admin-panel.struct.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Denuncias {{ $barrio->name }}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title  pull-left">Control de denuncias</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              @if($event = app('request')->input('event'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  @if($event == 'delete')
                    <h4><i class="icon fa fa-check"></i> Fue eliminada correctamente!</h4>
                    La denuncia fue eliminada correctamente
                  @endif
                </div>
              @endif

              <table class="table table-bordered">
                <tr>
                  <th style="width: 50px">Status</th>
                  <th style="width: 100px">Fecha</th>
                  <th>Vecino</th>
                  <th>Categoria</th>
                  <th>Direccion</th>
                  <th>Barrio</th>
                  <th style="width: 150px">Acciones</th>
                </tr>
                @foreach($denuncias as $denuncia)
                  <tr>
                    <td align="center" >
                      @if($denuncia->checked)
                        <span data-toggle="tooltip" data-placement="top" title="Leído" style="cursor:pointer;">
                          <i class="fa fa-check text-green"  data-toggle="modal" data-target="#uncheckdenuncia{{ $denuncia->id }}"></i>
                        </span>
                      @else
                        <span data-toggle="tooltip" data-placement="top" title="No leído" style="cursor:pointer;">
                          <i class="fa fa-circle text-yellow" data-toggle="modal" data-target="#checkdenuncia{{ $denuncia->id }}"></i>
                        </span>
                      @endif
                    </td>
                    <td>{{ $denuncia->date}}.</td>
                    <td>{{ $denuncia->user['name'] }}</td>
                    <td>{{ $denuncia->category->name }} <span class="label label-warning">{{ $denuncia->subcategory->name }}</span></td>
                    <td>{{ $denuncia->address . " " . $denuncia->address_number}}</td>
                    <td>{{ $denuncia->neighborhood->name}}</td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-info" data-toggle="dropdown"><i class="fa fa-cogs" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          @if($denuncia->checked)
                          <li>
                            <a href="#" class="text-yellow" data-toggle="modal" data-target="#uncheckdenuncia{{ $denuncia->id }}">
                              <button type="button" style="background-color: transparent; padding: 0px; border: none">
                                <i class="fa fa-circle" aria-hidden="true" style="margin-right: 10px"></i> Marcar no como leída
                              </button>
                            </a>
                          </li>
                          @else
                          <li>
                            <a href="#" class="text-green" data-toggle="modal" data-target="#checkdenuncia{{ $denuncia->id }}">
                              <button type="button" style="background-color: transparent; padding: 0px; border: none">
                                <i class="fa fa-check" aria-hidden="true" style="margin-right: 10px"></i> Marcar como leída
                              </button>
                            </a>
                          </li>
                          @endif
                          <li>
                            <a href="#" class="text-red">
                              <button type="button" style="background-color: transparent; padding: 0px; border: none" data-toggle="modal" data-target="#borrardenuncia{{ $barrio->id }}">
                                <i class="fa fa-trash-o" aria-hidden="true" style="margin-right: 10px"></i> Eliminar
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
          </div>
        </div>
      </div>

      <!-- Delete modal -->
      @foreach($denuncias as $denuncia)
        <div class="modal fade" id="borrardenuncia{{ $denuncia->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-trash-o text-red" aria-hidden="true" style="margin-right: 10px"></i> Borrar Denuncia</h4>
              </div>
              <div class="modal-body">
                <p>Esta seguro de borrar la siguiente denuncia?.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <a href="/api/adm/denuncias/{{ $denuncia->id }}/{{ $denuncia->neighborhood->name }}/delete"><button type="button" class="btn btn-danger">Borrar Denuncia</button></a>
              </div>
            </div>
          </div>
        </div>
      @endforeach

      <!-- Check modal -->
      @foreach($denuncias as $denuncia)
        <div class="modal fade" id="checkdenuncia{{ $denuncia->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-check text-green" aria-hidden="true" style="margin-right: 10px"></i> Marcar como leída</h4>
              </div>
              <div class="modal-body">
                <p>Esta seguro de marcar la siguiente denuncia como leida?.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <a href="/api/adm/denuncias/{{ $denuncia->id }}/check"><button type="button" class="btn btn-success">Marcar como leīda</button></a>
              </div>
            </div>
          </div>
        </div>
      @endforeach

      <!-- UnCheck modal -->
      @foreach($denuncias as $denuncia)
        <div class="modal fade" id="uncheckdenuncia{{ $denuncia->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-circle text-yellow" aria-hidden="true" style="margin-right: 10px"></i> Marcar como no leída</h4>
              </div>
              <div class="modal-body">
                <p>Esta seguro de marcar la siguiente denuncia como no leida?.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <a href="/api/adm/denuncias/{{ $denuncia->id }}/check"><button type="button" class="btn btn-warning">Marcar como no leīda</button></a>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -
</div>
<!-- ./wrapper -->
@endsection

