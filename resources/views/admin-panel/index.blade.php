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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ \App\Complaint::all()->count() }}</h3>

              <p>Denuncias</p>
            </div>
            <div class="icon">
              <i class="ion ion-sad-outline"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ \App\User::all()->count() }}</h3>

              <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ \App\Category::all()->count() }}</h3>

              <p>Categorias Denuncias</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ \App\Subcategory::all()->count() }}</h3>

              <p>SubCategorias Denuncias</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

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
                  <th style="width: 10px">#</th>
                  <th>Barrio</th>
                  <th>Cantidad de denuncias</th>
                  <th style="width: 150px">Acciones</th>
                </tr>
                @foreach($barrios as $barrio)
                  <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $barrio->name }}</td>
                    <td>{{ $barrio->countC }}</td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-info" data-toggle="dropdown"><i class="fa fa-cogs" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a href="/api/adm/denuncias/{{ $barrio->name }}">
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

