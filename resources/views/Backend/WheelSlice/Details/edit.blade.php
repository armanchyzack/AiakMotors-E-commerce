@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Details</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Edit Detail</h5>
        <hr>
        @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('details.update', $detail->id) }}" method="POST">
        @csrf
        @method('PUT')



        <div class="mb-3">
            <label class="form-label">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $detail->title) }}" required class="form-control">
            <span class="text-danger">
                @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control" id="summernote" required>{{ old('description', $detail->description) }}</textarea>
            <span class="text-danger">
                @error('description')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            </span>
        </div>









        <button type="submit" class="btn btn-warning">Update Detail</button>
    </form>
    </div>
</div>
@push('customJs')
    <script>
        $(document).ready(function() {
  $('#summernote').summernote();
});
    </script>
@endpush
@endsection
