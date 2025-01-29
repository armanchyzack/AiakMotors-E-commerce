@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Spine Wheel Slice</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Add Spine Wheel Slice text</h5>
        <hr>
      <form action="{{ route('wheel.slice.store') }}" method="POST" >
        @csrf
        <div class="mb-3">
          <label class="form-label">Slice One</label>
          <input type="text" name="One" class="form-control">
          <span class="text-danger">
            @error('One')
                {{ $message }}
            @enderror
          </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Slice Two</label>
            <input type="text" name="Two" class="form-control">
            <span class="text-danger">
              @error('Two')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="mb-3">
            <label class="form-label">Slice Three</label>
            <input type="text" name="Three" class="form-control" >
            <br>
            <span class="text-danger">
              @error('Three')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="mb-3">
            <label class="form-label">Slice four</label>
            <input type="text" name="four" class="form-control" >
            <br>
            <span class="text-danger">
              @error('four')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="mb-3">
            <label class="form-label">Slice five</label>
            <input type="text" name="five" class="form-control" >
            <br>
            <span class="text-danger">
              @error('five')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="mb-3">
            <label class="form-label">Slice six</label>
            <input type="text" name="six" class="form-control" >
            <br>
            <span class="text-danger">
              @error('six')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="mb-3">
            <label class="form-label">Slice seven</label>
            <input type="text" name="seven" class="form-control" >
            <br>
            <span class="text-danger">
              @error('seven')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="mb-3">
            <label class="form-label">Slice eight</label>
            <input type="text" name="eight" class="form-control" >
            <br>
            <span class="text-danger">
              @error('eight')
                  {{ $message }}
              @enderror
            </span>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</div>
@endsection
