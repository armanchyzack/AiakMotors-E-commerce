@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Spine Wheel</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Add Spine Wheel text</h5>
        <hr>
      <form action="{{ route('spinewheel.store') }}" method="POST" >
        @csrf
        <div class="mb-3">
          <label class="form-label">Prize One</label>
          <input type="text" name="prize_one" class="form-control">
          <span class="text-danger">
            @error('prize_one')
                {{ $message }}
            @enderror
          </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Prize Two</label>
            <input type="text" name="prize_two" class="form-control">
            <span class="text-danger">
              @error('prize_two')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="mb-3">
            <label class="form-label">Prize Three</label>
            <input type="text" name="prize_three" class="form-control" >
            <br>
            <span class="text-danger">
              @error('prize_three')
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
