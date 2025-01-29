@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="container">
    <h1>Add New Service</h1>
    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Service Name</label>
            <input type="text" name="name" class="form-control" id="name" required >
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>

</div>
@endsection
