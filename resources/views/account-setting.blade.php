@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('profile')}}">
                <i class="bx bx-user me-1"></i> Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('notification')}}"
                ><i class="bx bx-bell me-1"></i> Notifications</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('connections')}}"
                ><i class="bx bx-link-alt me-1"></i> Connections</a
              >
            </li>
          </ul>
          <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <form id="productForm" class="mb-3" enctype="multipart/form-data" >
            @csrf
       
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="{{ asset($data->image) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"/>
                <div class="button-wrapper">
                  <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span><i class="bx bx-upload d-block d-sm-none"></i>
                    <input type="file" id="image" name="image" class="account-file-input"  accept="image/png, image/jpeg"/>
                  </label>
                </div>
              </div>
            </div>
            
            <hr class="my-0" />
            <div class="card-body">
           
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">First Name</label>
                    <input
                      class="form-control"
                      type="text"
                      id="name"
                      name="name"
                      value="{{ old('name', $data->name) }}"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $data->last_name) }}" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                      class="form-control"
                      type="text"
                      id="email"
                      name="email"
                      value="{{ old('email', $data->email) }}"
                      placeholder="john.doe@example.com"
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="organization" class="form-label">Organization</label>
                    <input
                      type="text"
                      class="form-control"
                      id="organization"
                      name="organization"
                      value="{{ old('organization', $data->organization) }}"
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phone_number">Phone Number</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">IND (+91)</span>
                      <input
                        type="text"
                        id="phone_number"
                        name="phone_number"
                        class="form-control"
                        placeholder="202 555 0111"
                        value="{{ old('phone_number', $data->phone_number) }}"
                      />
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $data->address) }}" placeholder="Address" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="state" class="form-label">State</label>
                    <input class="form-control" type="text" id="state" name="state" value="{{ old('state', $data->state) }}" placeholder="California" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="zip_code" class="form-label">Zip Code</label>
                    <input
                      type="text"
                      class="form-control"
                      id="zip_code"
                      name="zip_code"
                      value="{{ old('zip_code', $data->zip_code) }}"
                      placeholder="231465"
                      maxlength="6"
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Country</label>
                    <select id="country" name="country" class="select2 form-select">
                      <option value="">Select</option>
                      <option value="Australia"{{old('country',$data->country)=='Australia'?'selected':''}}>Australia</option>
                      <option value="Bangladesh"{{old('country',$data->country)=='Bangladesh'?'selected':''}}>Bangladesh</option>
                      <option value="Belarus"{{old('country',$data->country)=='Belarus'?'selected':''}}>Belarus</option>
                      <option value="Brazil"{{old('country',$data->country)=='Brazil'?'selected':''}}>Brazil</option>
                      <option value="Canada"{{old('country',$data->country)=='Canada'?'selected':''}}>Canada</option>
                      <option value="China"{{old('country',$data->country)=='China'?'selected':''}}>China</option>
                      <option value="France"{{old('country',$data->country)=='France'?'selected':''}}>France</option>
                      <option value="Germany"{{old('country',$data->country)=='Germany'?'selected':''}}>Germany</option>
                      <option value="India"{{old('country',$data->country)=='India'?'selected':''}}>India</option>
                      <option value="Indonesia"{{old('country',$data->country)=='Indonesia'?'selected':''}}>Indonesia</option>
                      <option value="Israel"{{old('country',$data->country)=='Israel'?'selected':''}}>Israel</option>
                      <option value="Italy"{{old('country',$data->country)=='Italy'?'selected':''}}>Italy</option>
                      <option value="Japan"{{old('country',$data->country)=='Japan'?'selected':''}}>Japan</option>
                      <option value="Korea"{{old('country',$data->country)=='Korea'?'selected':''}}>Korea, Republic of</option>
                      <option value="Mexico"{{old('country',$data->country)=='Mexico'?'selected':''}}>Mexico</option>
                      <option value="Philippines"{{old('country',$data->country)=='Philippines'?'selected':''}}>Philippines</option>
                      <option value="Russia"{{old('country',$data->country)=='Russia'?'selected':''}}>Russian Federation</option>
                      <option value="South Africa"{{old('country',$data->country)=='South Africa'?'selected':''}}>South Africa</option>
                      <option value="Thailand"{{old('country',$data->country)=='Thailand'?'selected':''}}>Thailand</option>
                      <option value="Turkey"{{old('country',$data->country)=='Turkey'?'selected':''}}>Turkey</option>
                      <option value="Ukraine"{{old('country',$data->country)=='Ukraine'?'selected':''}}>Ukraine</option>
                      <option value="United Arab Emirates"{{old('country',$data->country)=='United Arab Emirates'?'selected':''}}>United Arab Emirates</option>
                      <option value="United Kingdom"{{old('country',$data->country)=='United Kingdom'?'selected':''}}>United Kingdom</option>
                      <option value="United States"{{old('country',$data->country)=='United States'?'selected':''}}>United States</option>
                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="language" class="form-label">Language</label>
                    <select id="language"  name="language" class="select2 form-select">
                      <option value="">Select Language</option>
                      <option value="en"{{old('language',$data->language)=='en'?'selected':''}}>English</option>
                      <option value="fr"{{old('language',$data->language)=='fr'?'selected':''}}>French</option>
                      <option value="de"{{old('language',$data->language)=='de'?'selected':''}}>German</option>
                      <option value="pt"{{old('language',$data->language)=='pt'?'selected':''}}>Portuguese</option>
                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="time_zones" class="form-label">Timezone</label>
                    <select id="time_zones" name="time_zones" class="select2 form-select">
                      <option value="">Select Timezone</option>
                      <option value="12"{{old('time_zones',$data->time_zones)=='12'?'selected':''}}>(GMT-12:00) International Date Line West</option>
                      <option value="11"{{old('time_zones',$data->time_zones)=='11'?'selected':''}}>(GMT-11:00) Midway Island, Samoa</option>
                      <option value="10"{{old('time_zones',$data->time_zones)=='10'?'selected':''}}>(GMT-10:00) Hawaii</option>
                      <option value="9"{{old('time_zones',$data->time_zones)=='9'?'selected':''}}>(GMT-09:00) Alaska</option>
                      <option value="8"{{old('time_zones',$data->time_zones)=='8'?'selected':''}}>(GMT-08:00) Pacific Time (US & Canada)</option>
                      <option value="7"{{old('time_zones',$data->time_zones)=='7'?'selected':''}}>(GMT-08:00) Tijuana, Baja California</option>
                      <option value="6"{{old('time_zones',$data->time_zones)=='6'?'selected':''}}>(GMT-07:00) Arizona</option>
                      <option value="5"{{old('time_zones',$data->time_zones)=='5'?'selected':''}}>(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                      <option value="4"{{old('time_zones',$data->time_zones)=='4'?'selected':''}}>(GMT-07:00) Mountain Time (US & Canada)</option>
                      <option value="3"{{old('time_zones',$data->time_zones)=='3'?'selected':''}}>(GMT-06:00) Central America</option>
                      <option value="2"{{old('time_zones',$data->time_zones)=='2'?'selected':''}}>(GMT-06:00) Central Time (US & Canada)</option>
                      <option value="1"{{old('time_zones',$data->time_zones)=='1'?'selected':''}}>(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                      <option value="13"{{old('time_zones',$data->time_zones)=='13'?'selected':''}}>(GMT-06:00) Saskatchewan</option>
                      <option value="14"{{old('time_zones',$data->time_zones)=='14'?'selected':''}}>(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                      <option value="15"{{old('time_zones',$data->time_zones)=='15'?'selected':''}}>(GMT-05:00) Eastern Time (US & Canada)</option>
                      <option value="16"{{old('time_zones',$data->time_zones)=='16'?'selected':''}}>(GMT-05:00) Indiana (East)</option>
                      <option value="17"{{old('time_zones',$data->time_zones)=='17'?'selected':''}}>(GMT-04:00) Atlantic Time (Canada)</option>
                      <option value="18"{{old('time_zones',$data->time_zones)=='18'?'selected':''}}>(GMT-04:00) Caracas, La Paz</option>
                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="currency" class="form-label">Currency</label>
                    <select id="currency" name="currency" class="select2 form-select">
                      <option value="">Select Currency</option>
                      <option value="usd"{{old('currency',$data->currency)=='usd'?'selected':''}}>USD</option>
                      <option value="euro"{{old('currency',$data->currency)=='euro'?'selected':''}}>Euro</option>
                      <option value="pound"{{old('currency',$data->currency)=='pound'?'selected':''}}>Pound</option>
                      <option value="bitcoin"{{old('currency',$data->currency)=='bitcoin'?'selected':''}}>Bitcoin</option>
                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" id="password" name="password" value="{{ old('password', $data->password) }}" placeholder="********" />
                  </div>
                </div>
                <div class="mt-2">
                    @if($data->status == 1 )
                  <button type="submit" class="btn btn-primary me-2" disabled>Save changes</button>
                  @else
                  <button type="submit" class="btn btn-primary me-2" >Save changes</button>
                  @endif
                  <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
          <div class="card">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
              <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                  <h6 class="alert-heading fw-bold mb-1">Are you sure you want to  Deactivation  your account?</h6>
                  <p class="mb-0">Once you Deactivation your account, there is no going back. Please be certain.</p>
                </div>
              </div>
              <form id="formAccountDeactivation" >
                @csrf
              
                <div class="form-check mb-3">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    name="status"
                    id="status"
                    value="1" {{ $data->status == 1 ? 'checked' : '' }}
                  />
                  <label class="form-check-label" for="status"
                    >I confirm my account deactivation</label
                  >
                </div>
                @if($data->status == '1')
                <button type="submit" class="btn btn-success activate-account">activate Account</button>
                @else
                <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                @endif
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
   $(document).on('submit', '#productForm', function (e) {
    e.preventDefault();

    var formData = new FormData(this); // Use FormData for file upload support

    $.ajax({
        type: 'POST',
        url: "{{ route('profile-update') }}",
        data: formData,
        contentType: false,
        processData: false, // Prevent jQuery from processing the FormData
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            Swal.fire({
                title: 'Success!',
                text: response.message,
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                if (response.redirect_url) {
                    window.location.href = response.redirect_url;
                }
            });
        },
        error: function (response) {
            Swal.fire({
                title: 'Error!',
                text: 'Something went wrong!',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});

    </script>
 <script>
    $(document).on('submit', '#formAccountDeactivation', function (e) {
     e.preventDefault();
 
     var formData = new FormData(this); // Use FormData for file upload support
 
     $.ajax({
         type: 'POST',
         url: "{{ route('profile-status-update') }}",
         data: formData,
         contentType: false,
         processData: false, // Prevent jQuery from processing the FormData
         headers: {
             'X-CSRF-TOKEN': '{{ csrf_token() }}'
         },
         success: function (response) {
             Swal.fire({
                 title: 'Success!',
                 text: response.message,
                 icon: 'success',
                 confirmButtonText: 'OK'
             }).then(() => {
                 if (response.redirect_url) {
                     window.location.href = response.redirect_url;
                 }
             });
         },
         error: function (response) {
             Swal.fire({
                 title: 'Error!',
                 text: 'Something went wrong!',
                 icon: 'error',
                 confirmButtonText: 'OK'
             });
         }
     });
 });
 
     </script>
 

@endsection