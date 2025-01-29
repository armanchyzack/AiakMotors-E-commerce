@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Social</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title text-bg-warning p-1">Edit Social Media</h5>
        <hr>
      <form action="{{ route('social.update', $socials->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="mb-3">
          <label class="form-label">Facebook Link</label>
          <input type="text" name="fb_link" class="form-control" value="{{ $socials->facebook }}">
          <span class="text-danger">
            @error('fb_link')
                {{ $message }}
            @enderror
          </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Messanger Link</label>
            <input type="text" name="msg_link" class="form-control"value="{{ $socials->messanger }}" >
            <span class="text-danger">
              @error('msg_link')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="mb-3">
            <label class="form-label">WhatsApp Link</label>
            <input type="text" name="wts_link" class="form-control" placeholder="1836666666" value="{{ $socials->whatsapp }}">
            <span>Input the number with out 0</span>
            <br>
            <span class="text-danger">
              @error('wts_link')
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
