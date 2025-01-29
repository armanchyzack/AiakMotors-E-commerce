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
        <h2 class="text-center">Nav Item</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Add a Menu</h5>
        <span class="col-6 text-end"><a href="{{ route('menu.all') }}" class="btn btn-success btn-sm">All  Menu</a></span>
        <hr>
      <form action="{{ route('menu.store') }}" method="POST" >
        @csrf
        <div class="mb-3 ">
          <label class="form-label">Menu Name</label>
          <input type="text" name="title" class="form-control">
          <span class="text-danger">
            @error('title')
                {{ $message }}
            @enderror
        </span>
        </div>
        <div class="mb-3 ">
        <label class="form-label">Menu slug</label>
          <input type="text" name="slug" class="form-control">
          <span class="text-danger">
            @error('slug')
                {{ $message }}
            @enderror
        </span>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
    </div>
</div>


@endsection

