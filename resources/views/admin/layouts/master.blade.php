<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar & Preloader -->

  @include('admin.includes.nav')

  <!-- /.navbar -->

  @include('admin.includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('admin.includes.breadcrumbs')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
 
        <!-- Main row -->
        <div class="row">

          @yield('content')
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.includes.footer')

  @include('admin.includes.controlsidebar')
</div>
<!-- ./wrapper -->

@include('admin.includes.scripts')
</body>
</html>
