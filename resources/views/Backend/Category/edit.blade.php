@extends('Backend.Layouts.back_end_layout')
@section('content')
<style>
img {
    height: 100px;
    width: 150px;
}
</style>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Category</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Add a Category</h5>
        <span class="col-6 text-end"><a href="{{ route('category.all') }}" class="btn btn-success btn-sm">All  Category</a></span>
        <hr>
      <form action="{{ route('category.update' , $categories->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="mb-3">
          <label class="form-label">Category Name</label>
          <input type="text" name="title" class="form-control" value="{{ Str::ucfirst($categories->title) }}">
          <span class="text-danger">
            @error('title')
                {{ $message }}
            @enderror
        </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Category Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $categories->slug }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Current Category Image</label>
            <img src="{{ $categories->image_url }}" alt="{{ $categories->title }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Category Image</label>
            <input type="file" name="category_image" class="form-control" id="file-input">
            <span class="text-danger">
                @error('category_image')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3 col-lg-6">
            <div id="preview-container">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

@push('customJs')
<script>
    //?   no relode slug genarate same to same as title

    let title = $('input[name="title"]')
            let slug = $('input[name="slug"]')
            title.keyup(function(){
                let value=$(this).val().toLowerCase().split(' ').join('-')
                slug.val(value)
            })



 // image preview

 $(document).ready(function() {
                $("#file-input").on("change", function() {
                    var files = $(this)[0].files;
                    $("#preview-container").empty();
                    if (files.length > 0) {
                        for (var i = 0; i < files.length; i++) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<div class='preview'><img src='" + e.target.result +
                                    "'><button class='delete'>Delete</button></div>").appendTo(
                                    "#preview-container");
                            };
                            reader.readAsDataURL(files[i]);
                        }
                    }
                });


                $("#preview-container").on("click", ".delete", function() {
                    $(this).parent(".preview").remove();
                    $("#file-input").val(""); // Clear input value if needed
                });
            });

</script>
@endpush
@endsection
