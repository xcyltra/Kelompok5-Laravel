<!DOCTYPE html>
<html lang="en">

@include('AdminLTE.partials.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  @include('AdminLTE.partials.preloader')

  <!-- Navbar -->
  @include('AdminLTE.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @include('AdminLTE.partials.logo')

    <!-- Sidebar -->
    @include('AdminLTE.partials.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('AdminLTE.partials.content-header')
    <!-- /.content-header -->

    <!-- Main content -->
    @include('AdminLTE.partials.main-content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('AdminLTE.partials.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('AdminLTE.partials.scripts')
</body>
</html>
