@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Manage PopUP Message</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('popup.message.storeOrUpdate') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" style="height: 100px" name="description" id="summernote">{{ $details->description ?? '' }}</textarea>
                <span class="text-danger">
                    @error('description')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@push('customJs')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endpush
@endsection
