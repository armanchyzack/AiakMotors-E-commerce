@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Footer</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Update Footer</h5>
        <hr>
      <form action="{{ route('footer.update', $footer->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="mb-3 col-12">
            <label class="form-label">Description</label>
            <textarea class="form-control" id="summernote" style="height: 100px" name="details">{{ $footer->details }}</textarea>

            <span class="text-danger">
              @error('details')
                  {{ $message }}
              @enderror
        </span>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
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
