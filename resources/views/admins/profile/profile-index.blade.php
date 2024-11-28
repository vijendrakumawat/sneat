@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

<div class="card">
    <h5 class="card-header"></h5>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Image</th>
              <th>Name</th>
              <th>Email</th>
              <th>Contact No</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $key => $dataValue)
            <tr>

              <td>
                <i class="fab fa-angular fa-lg text-danger me-0"></i> <strong>{{$key+1}}</strong>
              </td>
             
              <td>
                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                  <li
                    data-bs-toggle="tooltip"
                    data-popup="tooltip-custom"
                    data-bs-placement="top"
                    class="avatar avatar-xs pull-up"
                    title="Lilian Fuller"
                  >
                  @if(!empty($dataValue->image))
                  <img src="{{asset($dataValue->image)}}" alt="Avatar" class="rounded-circle" />
                  @else
                    <img src="{{asset('admin/assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle" />
                    @endif
                  </li> 
                </ul>
              </td>
              <td>{{$dataValue->name}} {{$dataValue->last_name}}</td>
              <td>{{$dataValue->email}}</td>
              <td>{{$dataValue->phone_number}}</td>
              <td>
                <div class="dropdown">
                  <button
                    type="button"
                    class="btn p-0 dropdown-toggle hide-arrow"
                    data-bs-toggle="dropdown"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('profile-edit',$dataValue->id)}}"
                      ><i class="bx bx-edit-alt me-1"></i> Edit</a
                    >
                    <button class="dropdown-item delete-button" data-id="{{ $dataValue->id }}">
                      <i class="bx bx-trash me-1"></i> Delete
                    </button>
                    
                  </div>
                </div>
              </td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Bordered Table -->
</div>
</div>
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).on('click', '.delete-button', function (e) {
      e.preventDefault();

      // Get the ID of the record to delete
      const recordId = $(this).data('id');

      // Confirmation dialog
      Swal.fire({
          title: "Are you sure?",
          text: "This action delete user?.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "Cancel"
      }).then((result) => {
          if (result.isConfirmed) {
              // Proceed with the delete request
              $.ajax({
                  type: 'POST',
                  url: "{{ route('profile-user-delete') }}", // Define a route for delete
                  data: {
                      _token: '{{ csrf_token() }}', // CSRF token for security
                      id: recordId
                  },
                  success: function (response) {
                      // Show success message
                      Swal.fire({
                          title: 'Deleted!',
                          text: response.message || 'The record has been deleted.',
                          icon: 'success',
                          confirmButtonText: 'OK'
                      }).then(() => {
                          // Reload the page or remove the row from the table
                          location.reload(); // Optionally, remove the specific row
                      });
                  },
                  error: function (xhr) {
                      // Handle error
                      Swal.fire({
                          title: 'Error!',
                          text: xhr.responseJSON?.message || 'Something went wrong!',
                          icon: 'error',
                          confirmButtonText: 'OK'
                      });
                  }
              });
          }
      });
  });
</script>

@endsection