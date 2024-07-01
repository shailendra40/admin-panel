<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar & Preloader -->

  @include('admin.includes.nav')

  <!-- /.navbar -->

  <!-- Add this code to display the user's roles in the sidebar -->
  @include('admin.includes.sidebar')
  <aside class="main-sidebar">
    <div class="user-roles">
        @foreach(auth()->user()->roles as $role)
            <span class="badge badge-primary">{{ $role->name }}</span>
        @endforeach
    </div>
  </aside>

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
