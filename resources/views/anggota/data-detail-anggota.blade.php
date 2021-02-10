
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
            <h1 class="display-2 text-white">Detail Data Anggota</h1>
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
                <h6 class="heading-small text-muted mb-4">informasi umum</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-first-name">Nama Lengkap</label>
                        <input name="name" type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Nama Lengkap" value=" {{ $users->name }}" disabled>
                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                      </div>
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('unit') ? 'has-error' : '' }}> 
                        <label class="form-control-label" for="input-username">Unit</label>
                        <input name="unit" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value=" {{ $users->unit }}" disabled >
                        <span class="text-danger"> {{ $errors->first('unit') }}</span>
                      </div>
                    </div>   
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('nip') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">NIP</label>
                        <input name="nip" type="number" id="input-email" class="form-control form-control-alternative" value="{{$users->nip}}" disabled>
                        <span class="text-danger"> {{ $errors->first('nip') }}</span>
                      </div>
                    </div>                 
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group" {{ $errors->has('email') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-username"> Email </label>
                        <input name="email" type="email" id="input-username" class="form-control form-control-alternative" placeholder="sport@company.com" value=" {{ $users->email }}" disabled>
                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                      </div>
                    </div>
                    <!-- <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('password') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">Password </label>
                        <input name="password" type="password" id="input-email" class="form-control form-control-alternative" placeholder="password" value=" {{ $users->password }} ">
                        <span class="text-danger"> {{ $errors->first('password') }}</span>
                      </div>
                    </div> -->
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
                        <input name="address" id="input-address" class="form-control form-control-alternative" placeholder="Alamat Rumah"  type="text" value=" {{ $users->address }} " disabled>
                        <span class="text-danger"> {{ $errors->first('address') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group" {{ $errors->has('personal_contact') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">kontak personal</label>
                        <input name="personal_contact" type="text" id="input-email" class="form-control form-control-alternative" value="{{$users->personal_contact}} " disabled>
                        <span class="text-danger"> {{ $errors->first('personal_contact') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group" {{ $errors->has('place_of_birth') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-country">Tempat lahir</label>
                        <input name="place_of_birth" type="text" id="input-country" class="form-control form-control-alternative" placeholder="tempat" value=" {{ $users->place_of_birth }} "disabled>
                        <span class="text-danger"> {{ $errors->first('place_of_birth') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group" {{ $errors->has('date_of_birth') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-country">Tanggal lahir</label>
                        <input name="date_of_birth" type="date" id="input-postal-code" class="form-control form-control-alternative" disabled>
                        <span class="text-danger"> {{ $errors->first('date_of_birth') }}</span>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      @if($users->date_of_birth != null)
        <script>
        window.onload = myFunction;
        function myFunction() {
          document.getElementById("input-postal-code").value = "{{ $users->date_of_birth->format('Y-m-d') }}";
        }
        </script>
      @endif
      @endsection