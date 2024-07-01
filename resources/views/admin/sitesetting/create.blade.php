@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <form id="quickForm" method="POST" action="{{ route('admin.sitesetting.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="govn_name">Government Name</label>
                            <input type="text" name="govn_name" class="form-control" placeholder="Government Name" value="{{ old('govn_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="ministry_name">Ministry Name</label>
                            <input type="text" name="ministry_name" class="form-control" placeholder="Ministry Name" value="{{ old('ministry_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="department_name">Department Name</label>
                            <input type="text" name="department_name" class="form-control" placeholder="Department Name" value="{{ old('department_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="office_name">Office Name</label>
                            <input type="text" name="office_name" class="form-control" placeholder="Office Name" required>
                        </div>

                        <div class="form-group">
                            <label for="office_address">Office Address</label>
                            <input type="text" name="office_address" class="form-control" placeholder="Office Address" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="office_contact">Phone Number</label>
                            <input type="tel" name="office_contact" class="form-control" placeholder="Phone Number" required>
                        </div>

                        <div class="form-group">
                            <label for="office_mail">Email</label>
                            <input type="email" name="office_mail" class="form-control" placeholder="Email" required>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slogan">Slogan</label>
                                <textarea name="slogan" class="form-control" placeholder="Slogan">{{ old('slogan') }}</textarea>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="main_logo">Main Logo</label>
                            <input type="file" name="main_logo" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="side_logo">Side Logo</label>
                            <input type="file" name="side_logo" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </section>
@endsection
