<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/admin-panel/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">SECCIONES</li>
            <li @if($section == 'home') class="active" @endif>
                <a href="/api/adm">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li @if($section == 'categorias') class="active" @endif>
                <a href="/api/adm/categorias">
                    <i class="fa fa-cube"></i> <span>Categorias</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li @if($section == 'subcategorias') class="active" @endif>
                <a href="/api/adm/subcategorias">
                    <i class="fa fa-cubes"></i> <span>Sub-Categorias</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li @if($section == 'barrios') class="active" @endif>
                <a href="/api/adm/barrios">
                    <i class="fa fa-home"></i> <span>Barrios</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
        </ul>
    </section>
</aside>