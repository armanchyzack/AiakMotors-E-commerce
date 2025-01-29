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
        <h5 class="card-title warning">Edit Menu</h5>
        <span class="text-end mb-3"><a href="{{ route('menu.all') }}" class="btn btn-success btn-sm">All  Menu</a></span>
        <hr>
      <form action="{{ route('menu.update', $menus->id) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="mb-3 ">
          <label class="form-label">Menu Name</label>
          <input type="text" name="title" class="form-control" value="{{ $menus->title }}">
          <span class="text-danger">
            @error('title')
                {{ $message }}
            @enderror
        </span>
        <label class="form-label">Menu slug</label>
          <input type="text" name="slug" class="form-control" value="{{ $menus->slug }}">
          <span class="text-danger">
            @error('slug')
                {{ $message }}
            @enderror
        </span>
        <button type="submit" class="btn btn-warning mt-3">Update</button>
      </form>
    </div>
</div>


@endsection

