@extends('admin.layouts.master')


@section('content')

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Office Name</th>
            <th>Office Email</th>
            <th>Office Contact</th>
            <th>Main Logo</th>
            <th>Side Logo</th>
        
        </tr>
    </thead>
    <tbody>
        @foreach ($sitesettings as $sitesetting)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{ $sitesetting->office_name ?? '' }}</td>
                <td>{{ $sitesetting->office_mail ?? '' }}</td>
                <td>{{ $sitesetting->office_contact ?? '' }}</td>
                <td > 
                    <img id="preview1"  src="{{ asset($sitesetting->main_logo) }}"
                    style="width: 150px; height:150px" />
                </td>
                <td > 
                    <img id="preview1"  src="{{ asset($sitesetting->side_logo)}}"
                    style="width: 150px; height:150px" />
                </td>
                
                
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    const previewImage1 = e => {
        const reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);
        reader.onload = () => {
            const preview = document.getElementById('preview1');
            preview.src = reader.result;
        };
    };
</script>


@endsection