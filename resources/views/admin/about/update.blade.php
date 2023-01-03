<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Update</title>
</head>
<body>
    <section class="content">
        <div class="container-fluid">
          <form id="quickForm"  method="POST" action="{{ route('admin.about.update') }}"
          enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{ $about->id }}">
          <div class="card-body">
              
              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Title" required value="{{ $about->title }}">
              </div>
    
              <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" class="form-control" onchange="previewImage(event)" placeholder="Image"
                      required>
              </div>
              <img id="preview" style="max-width: 500px; max-height:500px" />
    
              <div class="form-group">
                  <label for="content">Content</label>
                  <textarea id="summernote" name="content">
                    {{ $about->content }}  
                  </textarea>
              </div>   
          </div>
          <div class="card-footer">
              <button type="submit" class="btn-primary">Update About</button>
          </div>
      </form>
    </section>
</body>
</html>