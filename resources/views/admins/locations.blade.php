@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Basic Layout</h5>
              <small class="text-muted float-end">Default label</small>
            </div>
      
<div class="card-body">
<form method="POST" action="{{ route('locations.store') }}">
    @csrf
    <div class="row">
        <div class="mb-3 col-md-6">
    <label for="country" class="form-label">Country:</label>
    <select name="country_id" id="country"class="form-control" required>
        <option value="">Select Country</option>
        @foreach($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3 col-md-6">
    <label for="state" class="form-label">State:</label>
    <select name="state_id" id="state" class="form-control" required>
        <option value="">Select State</option>
    </select>
</div>
<div class="mb-3 col-md-6">
    <label for="city" class="form-label">City:</label>
    <select name="city_id" id="city" class="form-control" required>
        <option value="">Select City</option>
    </select>
</div>
</div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
 </div>
 </div> 
</div>
 </div> 
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // CSRF Token setup for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Fetch states based on country selection
        $('#country').change(function () {
            let country_id = $(this).val();
            
            $('#state').html('<option value="">Select State</option>');
            $('#city').html('<option value="">Select City</option>');
            if (country_id) {
                $.ajax({
                    url: '/get-states/' + country_id,
                    type: 'GET',
                    success: function (data) {
                        $.each(data, function (key, value) {
                            $('#state').append('<option value="' + value.id + '">' + value.state_name + '</option>');
                        });
                    }
                });
            }
        });

        // Fetch cities based on state selection
        $('#state').change(function () {
            let state_id = $(this).val();
            
            $('#city').html('<option value="">Select City</option>');
            if (state_id) {
                $.ajax({
                    url: '/get-cities/' + state_id,
                    type: 'GET',
                    success: function (data) {
                        $.each(data, function (key, value) {
                            $('#city').append('<option value="' + value.id + '">' + value.city_name + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>

@endsection