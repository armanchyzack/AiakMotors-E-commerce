@extends('Backend.Layouts.back_end_layout')

@section('content')
    <div class="card">
        @if (session()->has('deletesuccess'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('deletesuccess') }}
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card-header">
            <h2 class="text-center">Manage Car Gallery Images</h2>
        </div>

        <div class="card-body">
            <h4>Current Gallery Images</h4>
            <div class="row">
                @foreach ($car->images as $image)
                    <div class="col-md-3 mb-3">
                        <div class="image-card">
                            <img src="{{ $image->image_url }}" alt="{{ $image->image }}" class="img-thumbnail">
                            <!-- Delete Image Form -->
                            <form action="{{ route('product.gallary.image.delete', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Car Image Upload Form -->
            <form action="{{ route('product.gallary.image.upload', $car->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="car_images">Upload New Car Images</label>
                    <input type="file" class="form-control" id="car_images" name="car_images[]" multiple accept="image/*">
                </div>

                <div id="image_preview_container" class="image-preview-container">
                    <!-- Image previews will be appended here -->
                </div>

                <button type="submit" class="btn btn-primary mt-3">Upload Images</button>
            </form>
        </div>
    </div>

    @push('customJs')
        <script>
            // Handle image preview before uploading
            document.getElementById('car_images').addEventListener('change', function(event) {
                var files = event.target.files;
                var previewContainer = document.getElementById('image_preview_container');
                previewContainer.innerHTML = ''; // Clear previous previews

                Array.from(files).forEach(function(file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var imgPreview = document.createElement('div');
                        imgPreview.classList.add('image-preview');
                        imgPreview.innerHTML = `<img src="${e.target.result}" class="img-thumbnail" style="width: 100px; height: 100px;">`;
                        previewContainer.appendChild(imgPreview);
                    };
                    reader.readAsDataURL(file);
                });
            });
        </script>
    @endpush
@endsection
