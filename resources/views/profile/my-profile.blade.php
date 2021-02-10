
@extends('master')

@section('content')
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 350px; background-image: url(./img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-primary opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--9">
        <div class="row">          
          <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">My account</h3>
                  </div>                  
                </div>
              </div>          
              <div class="card-body">
                  <h6 class="heading-small text-muted mb-4">User information</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Username</label>
                          <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{$role->username}}" disabled >
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Email address</label>
                          <input type="email" id="input-email" class="form-control form-control-alternative" value="{{$role->email}}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Name</label>
                          <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="{{$role->name}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label class="form-control-label" for="input-last-name">Unit Kerja</label>
                          <input type="text" id="input-last-name" class="form-control form-control-alternative" value="{{$role->unit}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label class="form-control-label" for="input-last-name">Nomor Induk Pegawai</label>
                          <input type="text" id="input-last-name" class="form-control form-control-alternative" value="{{$role->nip}}" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4" />
                  <!-- Address -->
                  <h6 class="heading-small text-muted mb-4">Contact information</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Address</label>
                          <input id="input-address" class="form-control form-control-alternative" value="{{$role->address}}" disabled type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Personal Contact</label>
                          <input type="number" id="input-postal-code" class="form-control form-control-alternative" value="{{$role->personal_contact}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-city">Place Of Birth</label>
                          <input type="text" id="input-city" class="form-control form-control-alternative" value="{{$role->place_of_birth}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Date of Birth</label>
                          <input type="date" id="input-date" class="form-control form-control-alternative" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        @if($role->date_of_birth != null)
        <script>
        window.onload = myFunction;
        function myFunction() {
          document.getElementById("input-date").value = "{{ $role->date_of_birth->format('Y-m-d') }}";
        }
        </script>
      @endif
        @endsection