@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Marquery Text</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Add Marquery Text</h5>
        <hr>
      <form action="{{ route('discount.text.store') }}" method="POST">
        @csrf
        <div class="mb-3 col-12">
            <label class="form-label">Add Text</label>
            <input class="form-control" style="height: 100px" name="details"></input>

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
@endsection
