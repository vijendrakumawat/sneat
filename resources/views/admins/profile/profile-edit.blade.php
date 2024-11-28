@extends('admin.layouts.main')

@section('content')

          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>


              <!-- Basic Layout -->
              <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Basic Layout</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <form id="formAccountDeactivation" class="mb-3" enctype="multipart/form-data"  >
                        @csrf                
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">First Name</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="name"
                                  name="name"
                                  value="{{ old('name', $userDataEdit->name) }}"
                                  autofocus
                                />
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $userDataEdit->last_name) }}" />
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="email"
                                  name="email"
                                  value="{{ old('email', $userDataEdit->email) }}"
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
                                  value="{{ old('organization', $userDataEdit->organization) }}"
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
                                    value="{{ old('phone_number', $userDataEdit->phone_number) }}"
                                  />
                                </div>
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $userDataEdit->address) }}" placeholder="Address" />
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">State</label>
                                <input class="form-control" type="text" id="state" name="state" value="{{ old('state', $userDataEdit->state) }}" placeholder="California" />
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="zip_code" class="form-label">Zip Code</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="zip_code"
                                  name="zip_code"
                                  value="{{ old('zip_code', $userDataEdit->zip_code) }}"
                                  placeholder="231465"
                                  maxlength="6"
                                />
                              </div>
                              <div class="mb-3 col-md-6">
                                <label class="form-label" for="country">Country</label>
                                <select id="country" name="country" class="select2 form-select">
                                  <option value="">Select</option>
                                  <option value="Australia"{{old('country',$userDataEdit->country)=='Australia'?'selected':''}}>Australia</option>
                                  <option value="Bangladesh"{{old('country',$userDataEdit->country)=='Bangladesh'?'selected':''}}>Bangladesh</option>
                                  <option value="Belarus"{{old('country',$userDataEdit->country)=='Belarus'?'selected':''}}>Belarus</option>
                                  <option value="Brazil"{{old('country',$userDataEdit->country)=='Brazil'?'selected':''}}>Brazil</option>
                                  <option value="Canada"{{old('country',$userDataEdit->country)=='Canada'?'selected':''}}>Canada</option>
                                  <option value="China"{{old('country',$userDataEdit->country)=='China'?'selected':''}}>China</option>
                                  <option value="France"{{old('country',$userDataEdit->country)=='France'?'selected':''}}>France</option>
                                  <option value="Germany"{{old('country',$userDataEdit->country)=='Germany'?'selected':''}}>Germany</option>
                                  <option value="India"{{old('country',$userDataEdit->country)=='India'?'selected':''}}>India</option>
                                  <option value="Indonesia"{{old('country',$userDataEdit->country)=='Indonesia'?'selected':''}}>Indonesia</option>
                                  <option value="Israel"{{old('country',$userDataEdit->country)=='Israel'?'selected':''}}>Israel</option>
                                  <option value="Italy"{{old('country',$userDataEdit->country)=='Italy'?'selected':''}}>Italy</option>
                                  <option value="Japan"{{old('country',$userDataEdit->country)=='Japan'?'selected':''}}>Japan</option>
                                  <option value="Korea"{{old('country',$userDataEdit->country)=='Korea'?'selected':''}}>Korea, Republic of</option>
                                  <option value="Mexico"{{old('country',$userDataEdit->country)=='Mexico'?'selected':''}}>Mexico</option>
                                  <option value="Philippines"{{old('country',$userDataEdit->country)=='Philippines'?'selected':''}}>Philippines</option>
                                  <option value="Russia"{{old('country',$userDataEdit->country)=='Russia'?'selected':''}}>Russian Federation</option>
                                  <option value="South Africa"{{old('country',$userDataEdit->country)=='South Africa'?'selected':''}}>South Africa</option>
                                  <option value="Thailand"{{old('country',$userDataEdit->country)=='Thailand'?'selected':''}}>Thailand</option>
                                  <option value="Turkey"{{old('country',$userDataEdit->country)=='Turkey'?'selected':''}}>Turkey</option>
                                  <option value="Ukraine"{{old('country',$userDataEdit->country)=='Ukraine'?'selected':''}}>Ukraine</option>
                                  <option value="United Arab Emirates"{{old('country',$userDataEdit->country)=='United Arab Emirates'?'selected':''}}>United Arab Emirates</option>
                                  <option value="United Kingdom"{{old('country',$userDataEdit->country)=='United Kingdom'?'selected':''}}>United Kingdom</option>
                                  <option value="United States"{{old('country',$userDataEdit->country)=='United States'?'selected':''}}>United States</option>
                                </select>
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="language" class="form-label">Language</label>
                                <select id="language"  name="language" class="select2 form-select">
                                  <option value="">Select Language</option>
                                  <option value="en"{{old('language',$userDataEdit->language)=='en'?'selected':''}}>English</option>
                                  <option value="fr"{{old('language',$userDataEdit->language)=='fr'?'selected':''}}>French</option>
                                  <option value="de"{{old('language',$userDataEdit->language)=='de'?'selected':''}}>German</option>
                                  <option value="pt"{{old('language',$userDataEdit->language)=='pt'?'selected':''}}>Portuguese</option>
                                </select>
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="time_zones" class="form-label">Timezone</label>
                                <select id="time_zones" name="time_zones" class="select2 form-select">
                                  <option value="">Select Timezone</option>
                                  <option value="12"{{old('time_zones',$userDataEdit->time_zones)=='12'?'selected':''}}>(GMT-12:00) International Date Line West</option>
                                  <option value="11"{{old('time_zones',$userDataEdit->time_zones)=='11'?'selected':''}}>(GMT-11:00) Midway Island, Samoa</option>
                                  <option value="10"{{old('time_zones',$userDataEdit->time_zones)=='10'?'selected':''}}>(GMT-10:00) Hawaii</option>
                                  <option value="9"{{old('time_zones',$userDataEdit->time_zones)=='9'?'selected':''}}>(GMT-09:00) Alaska</option>
                                  <option value="8"{{old('time_zones',$userDataEdit->time_zones)=='8'?'selected':''}}>(GMT-08:00) Pacific Time (US & Canada)</option>
                                  <option value="7"{{old('time_zones',$userDataEdit->time_zones)=='7'?'selected':''}}>(GMT-08:00) Tijuana, Baja California</option>
                                  <option value="6"{{old('time_zones',$userDataEdit->time_zones)=='6'?'selected':''}}>(GMT-07:00) Arizona</option>
                                  <option value="5"{{old('time_zones',$userDataEdit->time_zones)=='5'?'selected':''}}>(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                  <option value="4"{{old('time_zones',$userDataEdit->time_zones)=='4'?'selected':''}}>(GMT-07:00) Mountain Time (US & Canada)</option>
                                  <option value="3"{{old('time_zones',$userDataEdit->time_zones)=='3'?'selected':''}}>(GMT-06:00) Central America</option>
                                  <option value="2"{{old('time_zones',$userDataEdit->time_zones)=='2'?'selected':''}}>(GMT-06:00) Central Time (US & Canada)</option>
                                  <option value="1"{{old('time_zones',$userDataEdit->time_zones)=='1'?'selected':''}}>(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                  <option value="13"{{old('time_zones',$userDataEdit->time_zones)=='13'?'selected':''}}>(GMT-06:00) Saskatchewan</option>
                                  <option value="14"{{old('time_zones',$userDataEdit->time_zones)=='14'?'selected':''}}>(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                  <option value="15"{{old('time_zones',$userDataEdit->time_zones)=='15'?'selected':''}}>(GMT-05:00) Eastern Time (US & Canada)</option>
                                  <option value="16"{{old('time_zones',$userDataEdit->time_zones)=='16'?'selected':''}}>(GMT-05:00) Indiana (East)</option>
                                  <option value="17"{{old('time_zones',$userDataEdit->time_zones)=='17'?'selected':''}}>(GMT-04:00) Atlantic Time (Canada)</option>
                                  <option value="18"{{old('time_zones',$userDataEdit->time_zones)=='18'?'selected':''}}>(GMT-04:00) Caracas, La Paz</option>
                                </select>
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="currency" class="form-label">Currency</label>
                                <select id="currency" name="currency" class="select2 form-select">
                                  <option value="">Select Currency</option>
                                  <option value="usd"{{old('currency',$userDataEdit->currency)=='usd'?'selected':''}}>USD</option>
                                  <option value="euro"{{old('currency',$userDataEdit->currency)=='euro'?'selected':''}}>Euro</option>
                                  <option value="pound"{{old('currency',$userDataEdit->currency)=='pound'?'selected':''}}>Pound</option>
                                  <option value="bitcoin"{{old('currency',$userDataEdit->currency)=='bitcoin'?'selected':''}}>Bitcoin</option>
                                </select>
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" id="password" name="password" value="{{ old('password', $userDataEdit->password) }}" placeholder="********" />
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image" /></br>
                                <spam> <img src="{{ asset($userDataEdit->image) }}"alt="user-avatar" class="d-block rounded" height="100" width="100" /></spam>
                              </div>
                            </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                      </form>
                    </div>
                  </div>
                </div>

                </div>
            </div>
            
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).on('submit', '#formAccountDeactivation', function (e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        var id = "{{ $userDataEdit->id }}"; // Pass the user ID from backend
        
        $.ajax({
            type: 'POST',
            url: "{{ route('profile-user-update', ':id') }}".replace(':id', id),
            data: formData,
            contentType: false,
            processData: false,
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
            error: function (xhr) {
                Swal.fire({
                    title: 'Error!',
                    text: xhr.responseJSON.message || 'Something went wrong!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
    

    </script>
@endsection