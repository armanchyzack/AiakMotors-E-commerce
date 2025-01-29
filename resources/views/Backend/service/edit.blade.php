@extends('Backend.Layouts.back_end_layout')
@section('content')
<style>
    img {
    width: 20%;
    height: 20vh;
}
</style>
<div class="container">
    <h1>Add New Service</h1>
    <form action="{{ route('service.update' , $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="name" class="form-label">Service Name</label>
            <input type="text" name="name" class="form-control" id="name"  value="{{ $service->name }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price"  value="{{ $service->price }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Image</label>
            <img src="{{config('app.url') . '/storage/' .$service->image }}" alt="">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <button type="submit" class="btn btn-warning">Save</button>
    </form>

</div>
@endsection
