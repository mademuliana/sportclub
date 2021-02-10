
@extends('master')

@section('content')
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(./img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-primary opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Form Registrasi User</h1>
            <p class="text-white mt-0 mb-5">masukan semua data yang dibutuhkan dalam form registrasi ini </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">        
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">User</h3>
                </div>
              </div>
            </div>
            <div class="card-body"> 
              <form action="/register" method="POST">
                @csrf
                <h6 class="heading-small text-muted mb-4">informasi umum</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-first-name">Nama Lengkap</label>
                        <input name="name" type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Nama Lengkap">
                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">                    
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('email') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-username"> Email </label>
                        <input name="email" type="email" id="input-username" class="form-control form-control-alternative" placeholder="sport@company.com">
                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('nip') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">NIP </label>
                        <input name="nip" type="number" id="input-email" class="form-control form-control-alternative" placeholder="6701232324">
                        <span class="text-danger"> {{ $errors->first('nip') }}</span>
                      </div>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('username') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-username"> Username </label>
                        <input name="username" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username">
                        <span class="text-danger"> {{ $errors->first('username') }}</span>
                      </div>
                    </div>                                  
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('password') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">Password </label>
                        <input name="password" type="password" id="input-email" class="form-control form-control-alternative" placeholder="password">
                        <span class="text-danger"> {{ $errors->first('password') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('unit') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-first-name">Unit Kerja</label>
                        <input name="unit" type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Unit Kerja">
                        <span class="text-danger"> {{ $errors->first('unit') }}</span>
                      </div>
                    </div>                    
                    <div class="col-lg-6">
                      <label class="form-control-label" for="input-email">Role</label>
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-users"></i></span>
                        </div>
                        <select class="form-control" name="role">
                          <option value="" disabled selected>Choose the role</option>
                          <option value="1">super admin</option>
                          <option value="2">admin pic</option>
                          <option value="3">user</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Informasi Pribadi</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group" {{ $errors->has('address') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-address">Alamat</label>
                        <input name="address" id="input-address" class="form-control form-control-alternative" placeholder="Alamat Rumah"  type="text">
                        <span class="text-danger"> {{ $errors->first('address') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group" {{ $errors->has('personal_contact') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-city">kontak personal</label>
                        <input name="personal_contact" type="number" id="input-cp" class="form-control form-control-alternative" placeholder="081xxxxxxxx" >
                        <span class="text-danger"> {{ $errors->first('personal_contact') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group" {{ $errors->has('place_of_birth') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-country">Tempat lahir</label>
                        <input name="place_of_birth" type="text" id="input-country" class="form-control form-control-alternative" placeholder="tempat" >
                        <span class="text-danger"> {{ $errors->first('place_of_birth') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group" {{ $errors->has('date_of_birth') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-country">Tanggal lahir</label>
                        <input name="date_of_birth" type="date" id="input-postal-code" class="form-control form-control-alternative">
                        <span class="text-danger"> {{ $errors->first('date_of_birth') }}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <div class=" text-right">
                  <button type="submit" name="submit" class="btn btn-primary my-4">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endsection