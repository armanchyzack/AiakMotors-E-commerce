@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Spine Wheel</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title text-bg-warning p-1">Edit Spine Wheel text</h5>
        <hr>
      <form action="{{ route('spinewheel.update', $spinewheel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="mb-3">
          <label class="form-label">Prize one</label>
          <input type="text" name="prize_one" class="form-control" value="{{ $spinewheel->prize_one }}">
          <span class="text-danger">
            @error('prize_one')
                {{ $message }}
            @enderror
          </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Prize two</label>
            <input type="text" name="prize_two" class="form-control"value="{{ $spinewheel->prize_two }}" >
            <span class="text-danger">
              @error('prize_two')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="mb-3">
            <label class="form-label">Prize three</label>
            <input type="text" name="prize_three" class="form-control"  value="{{ $spinewheel->prize_three }}">
           
            <br>
            <span class="text-danger">
              @error('prize_three')
                  {{ $message }}
              @enderror
            </span>
          </div>
        </div>
        <button type="submit" class="btn btn-warning">Submit</button>
      </form>
    </div>
</div>
@endsection
