@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Edit Spine Wheel Slice (Sticky)</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">Edit Spine Wheel Slice Text</h5>
        <hr>
        <form action="{{ route('wheel.slice.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Slice One -->
            <div class="mb-3">
                <label class="form-label">Slice One</label>
                <input type="text" name="One" class="form-control" value="{{ old('One', $wheelSlice->slice_one) }}">
                <span class="text-danger">
                    @error('One')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Slice Two -->
            <div class="mb-3">
                <label class="form-label">Slice Two</label>
                <input type="text" name="Two" class="form-control" value="{{ old('Two', $wheelSlice->slice_two) }}">
                <span class="text-danger">
                    @error('Two')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Slice Three -->
            <div class="mb-3">
                <label class="form-label">Slice Three</label>
                <input type="text" name="Three" class="form-control" value="{{ old('Three', $wheelSlice->slice_three) }}">
                <span class="text-danger">
                    @error('Three')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Slice Four -->
            <div class="mb-3">
                <label class="form-label">Slice Four</label>
                <input type="text" name="four" class="form-control" value="{{ old('four', $wheelSlice->slice_four) }}">
                <span class="text-danger">
                    @error('four')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Slice Five -->
            <div class="mb-3">
                <label class="form-label">Slice Five</label>
                <input type="text" name="five" class="form-control" value="{{ old('five', $wheelSlice->slice_five) }}">
                <span class="text-danger">
                    @error('five')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Slice Six -->
            <div class="mb-3">
                <label class="form-label">Slice Six</label>
                <input type="text" name="six" class="form-control" value="{{ old('six', $wheelSlice->slice_six) }}">
                <span class="text-danger">
                    @error('six')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Slice Seven -->
            <div class="mb-3">
                <label class="form-label">Slice Seven</label>
                <input type="text" name="seven" class="form-control" value="{{ old('seven', $wheelSlice->slice_seven) }}">
                <span class="text-danger">
                    @error('seven')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Slice Eight -->
            <div class="mb-3">
                <label class="form-label">Slice Eight</label>
                <input type="text" name="eight" class="form-control" value="{{ old('eight', $wheelSlice->slice_eight) }}">
                <span class="text-danger">
                    @error('eight')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <button type="submit" class="btn btn-warning w-100">Update</button>
        </form>
    </div>
</div>
@endsection
