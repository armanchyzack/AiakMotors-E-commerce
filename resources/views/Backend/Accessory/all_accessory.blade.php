@extends('Backend.Layouts.back_end_layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Accessory</h2>
    </div>
    <div class="card-body row">
        <h5 class="card-title col-6">All Accessory</h5>
        <span class="col-6 text-end"><a href="{{ route('accessory.view') }}" class="btn btn-success btn-sm">Add Accessory</a></span>
        <hr>
        <div class="table-responsive">
            <table class="display table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($accessories as $key => $ass)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td style="height: 2rem; width:1rem"><img style="width: 100%; height:100%" src="{{ $ass->image_url }}" alt=""></td>
                            <td>{{ $ass->category->title }}</td>
                            <td>{{ $ass->name }}</td>
                            <td>{{ $ass->price }}</td>
                            <td>
                                @if ($ass->status == 0)
                                    <a href="{{ route('accessory.status.update', $ass->id) }}" class="btn-sm btn-danger">
                                        <i class="fa-solid fa-toggle-off h5" style="color: #ac1025;"></i>
                                    </a>
                                @else
                                    <a href="{{ route('accessory.status.update', $ass->id) }}" class="btn btn-sm btn-success">
                                        <i class="fa-solid fa-toggle-on h5" style="color: #63E6BE;"></i>
                                    </a>
                                @endif
                            </td>
                            <td class="parent_class">
                                <a href="{{ route('accessory.edit', $ass->id) }}"><i class='fas fa-edit' style='font-size:1rem'></i></a>
                            </td>
                            <td class="text-right deleteBtn">
                                <button class="btn btn-sm" onclick="confirmDelete({{ $ass->id }})">
                                    <i class='fas fa-trash' style='font-size:1rem;color:red'></i>
                                </button>
                                <form action="{{ route('accessory.delete', $ass->id) }}" id="delete-form-{{ $ass->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="pagination">
                {{ $accessories->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Flash Messages -->
<div class="col-4 float-end card-header">
    @if (session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('warning'))
        <div class="alert alert-warning mt-3" role="alert">
            {{ session('warning') }}
        </div>
    @endif
    @if (session()->has('deletesuccess'))
        <div class="alert alert-danger mt-3" role="alert">
            {{ session('deletesuccess') }}
        </div>
    @endif
</div>

@push('customJs')
<script>
    function confirmDelete(categoryId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action will delete the product and its images!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform form submission to delete product
                document.getElementById(`delete-form-${categoryId}`).submit();
            }
        })
    }

    $("document").ready(function() {
        setTimeout(function() {
            $("div.alert").remove();
        }, 2000);
    })
</script>
@endpush
@endsection
