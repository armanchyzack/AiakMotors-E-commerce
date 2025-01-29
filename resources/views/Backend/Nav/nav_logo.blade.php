@extends('Backend.Layouts.back_end_layout')
@section('content')
<style>
img {
    height: 100px;
    width: 150px;
}
.logo-img{
    height: 100px;
    width: 150px;
}
</style>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">LOGO</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title warning">Update Logo</h5>
        <hr>
      <form action="{{ route('logo.update', $logos->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Current Website Logo</label>
            <img src="{{ $logos->logo_url }}" alt="" class="logo-img">
            <span class="text-danger">
                @error('logo')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Website Logo</label>
            <input type="file" name="logo" class="form-control" id="file-input">
            <span class="text-danger">
                @error('logo')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3 col-lg-6">
            <div id="preview-container">
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
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
