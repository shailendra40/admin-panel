@extends('admin.layouts.master')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="quickForm" method="POST" action="{{ route('admin.sitesetting.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $sitesetting->id }}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Government Name</label>
                    <input type="text" name="govn_name" class="form-control" value="{{ $sitesetting->govn_name ?? '' }}"
                        placeholder="Government Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ministry Name</label>
                    <input type="text" name="ministry_name" class="form-control"
                        value="{{ $sitesetting->ministry_name ?? '' }}" placeholder="Ministry Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Department Name</label>
                    <input type="text" name="department_name" class="form-control"
                        value="{{ $sitesetting->department_name ?? '' }}" placeholder="Department Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Office Name</label>
                    <input type="text" name="office_name" class="form-control"
                        value="{{ $sitesetting->office_name ?? '' }}" placeholder="Office Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Office Address</label>
                    <input type="text" name="office_address" class="form-control"
                        value="{{ $sitesetting->office_address ?? '' }}" placeholder="Address">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Office Contact</label>
                    <input type="text" name="office_contact" class="form-control"
                        value="{{ $sitesetting->office_contact ?? '' }}" placeholder="Office Contact">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Office Email</label>
                    <input type="email" name="office_mail" class="form-control"
                        value="{{ $sitesetting->office_mail ?? '' }}" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Main Logo</label>
                    <input type="file" name="main_logo" class="form-control" value="{{ $sitesetting->main_logo ?? '' }}"
                        placeholder="Main Logo">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Side Logo</label>
                    <input type="file" name="side_logo" class="form-control" value="{{ $sitesetting->side_logo ?? '' }}"
                        placeholder="Side Logo">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Facebook URL</label>
                    <input type="url" name="facebook_link" class="form-control" value="{{ $sitesetting->facebook_link ?? '' }}"
                        placeholder="Facebook URL (https://)">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Insta URL</label>
                    <input type="url" name="instagram_link" class="form-control"
                        value="{{ $sitesetting->instagram_link ?? '' }}" placeholder="Insta URL (https://)">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Social URL</label>
                    <input type="url" name="social_link" class="form-control"
                        value="{{ $sitesetting->social_link ?? '' }}" placeholder="LinkedIN URL (https://)">
                </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn-primary">Update</button>
        </div>
        </form>



        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <script>
        const previewImage = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            };
        };
    </script>
@endsection
