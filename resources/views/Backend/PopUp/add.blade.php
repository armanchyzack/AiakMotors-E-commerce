@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">PopUP Message</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Add PopUP Message Text</h5>
        <hr>
      <form action="{{ route('popup.message.store') }}" method="POST">
        @csrf
        <div class="mb-3 col-12">
            <label class="form-label">Add Text</label>
            <textarea class="form-control" style="height: 100px" name="details" id="summernote"></textarea>

            <span class="text-danger">
              @error('details')
                  {{ $message }}
              @enderror
        </span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('warning'))
    <div class="alert alert-warning">{{ session('warning') }}</div>
@endif




@push('customJs')
<script>
             $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
@endpush
@endsection
