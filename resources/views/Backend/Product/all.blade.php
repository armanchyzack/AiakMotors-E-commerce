@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="card">
    <div class="card-header">
      <h2 class="text-center">Car</h2>
    </div>
    <div class="card-body row">
      <h5 class="card-title col-6">All Cars</h5>
        <span class="col-6 text-end"><a href="{{ route('product.view') }}" class="btn btn-success btn-sm">Add Car</a></span>
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
                <th scope="col">Discount Price</th>
                <th scope="">Edit</th>
                <th scope="">Delete</th>

              </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($cars as $index=>$car)

                <tr>
                  <th scope="row">{{ ++$index }}</th>
                  <td style="height: 2rem; width:1rem"><img style="width: 100%; height:100%" src="{{ $car->image_url }}" alt=""></td>
                  <td>
                    {{ $car->category->title }}
                  </td>
                  <td>{{ $car->name }}</td>
                  <td>{{ $car->price }}</td>

                  <td>
                    @if ($car->status == 0)
                    <a href="{{ route('product.status.update', $car->id) }} " btn-sm btn-danger> <i class="fa-solid fa-toggle-off h5" style="color: #ac1025;"></i></a>
                    @else
                    <a href="{{ route('product.status.update', $car->id) }}" btn btn-sm btn-success> <i class="fa-solid fa-toggle-on h5" style="color: #63E6BE;"></i></a>
                    @endif



                  </td>

                  <td class="parent_class " id="expanded_employee" data-id=""><a href="{{ route('product.edit', $car->id) }}"><i class='fas fa-edit' style='font-size:1rem'></i></a></td>
                  <td class="text-right deleteBtn">
                    <button class="btn btn-sm" onclick="confirmDelete({{ $car->id }})">
                        <i class='fas fa-trash' style='font-size:1rem;color:red'></i>
                    </button>
                    <a href="#"  class="btn btn-sm deleteBtn"></a>
                    <form action="{{ route('product.delete', $car->id) }}" id="delete-form-{{ $car->id }}" method="POST">
                        @csrf
                        @method("DELETE")

                    </form>

                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>

      </div>

    </div>
  </div>
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
</div>
@endif
@push('customJs')
<script>

function confirmDelete(carID) {
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
            document.getElementById(`delete-form-${carID}`).submit();
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
