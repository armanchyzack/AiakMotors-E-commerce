@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="container">
    <h1 class="mb-4">All Services</h1>
    <a href="{{ route('service.view') }}" class="btn btn-success mb-3">Add Service</a>

    <!-- Table for displaying services -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->price }} <i class="fa-solid fa-bangladeshi-taka-sign"></i></td>
                        <td>
                            <img src="{{ asset('storage/'.$service->image) }}" alt="service image" style="width: 100px; height: 60px; object-fit: cover;">
                        </td>
                        <td>
                            <a href="{{ route('service.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('service.delete', $service->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
