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
              <table class="table table-bordered">
                <tr>
                  <th style="width: 100px">Fecha</th>
                  <th>Vecino</th>
                  <th>Categoria</th>
                  <th>Direccion</th>
                  <th>Barrio</th>
                  <th style="width: 150px">Acciones</th>
                </tr>
                @foreach($denuncias as $denuncia)
                  <tr>
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
                          <li>
                            <a href="#">
                              <button type="button" style="background-color: transparent; padding: 0px; border: none">
                                <i class="fa fa-eye" aria-hidden="true" style="margin-right: 10px"></i> Ver denuncias
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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -
</div>
<!-- ./wrapper -->
@endsection

