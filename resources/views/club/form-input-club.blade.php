@extends('master')

@section('content')    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(./img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-primary opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Form Club</h1>
            <p class="text-white mt-0 mb-5">masukan semua data yang dibutuhkan dalam pembuatan suatu club </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">        
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Sport Club</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="/club/list-club">
              {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">informasi umum</h6>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label name="information" id="keterangan" class="form-control-label" for="input-address">PIC</label>
                        <select id="cars" name="pic" class="form-control form-control-alternative">
                        @foreach($users as $user)
                            @if($user->role == 3)
                            <option value="{{$user->id}}" selected>{{$user->name}}</option>
                            @endif
                        @endforeach 
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-username">Nama Sport Club</label>
                        <input name="name" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Sport Club">
                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                      </div>
                    </div>
                    <!-- <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Anggaran (/bulan)</label>
                        <input name="budget" type="number" id="input-email" class="form-control form-control-alternative" placeholder="anggaran">
                      </div>
                    </div> -->
                  </div>
                  <!-- <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username Admin</label>
                        <input name="admin_username" type="text" id="input-username" class="form-control form-control-alternative" placeholder="username">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Password</label>
                        <input name="admin_password" type="password" id="input-email" class="form-control form-control-alternative" placeholder="password">
                      </div>
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group" {{ $errors->has('description') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-first-name">Deskripsi</label>
                        <textarea name="description" type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Description" value="Lucky"></textarea>
                        <span class="text-danger"> {{ $errors->first('description') }}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Informasi Asset</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="custom-control custom-checkbox mb-3">
                        <input name="lapangan" class="custom-control-input" id="lapangan" type="checkbox" value="1">
                        <label class="custom-control-label" for="lapangan">lapangan</label>
                      </div>
                      <div class="custom-control custom-checkbox mb-3">
                        <input name="meja" class="custom-control-input" id="meja" type="checkbox" value="1">
                        <label class="custom-control-label" for="meja">meja</label>
                      </div>
                       <div class="custom-control custom-checkbox mb-3">
                        <input name="net" class="custom-control-input" id="net" type="checkbox" value="1">
                        <label class="custom-control-label" for="net">net</label>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="custom-control custom-checkbox mb-3">
                        <input name="raket" class="custom-control-input" id="raket" type="checkbox" value="1">
                        <label class="custom-control-label" for="raket">raket</label>
                      </div>
                      <div class="custom-control custom-checkbox mb-3">
                        <input name="bola" class="custom-control-input" id="bola" type="checkbox" value="1">
                        <label class="custom-control-label" for="bola">bola</label>
                      </div>
                    </div>
                  </div> -->
                <!-- </div> -->
                <!-- Description -->
                <div class=" text-right">
                  <button type="submit" name="submit" class="btn btn-primary my-4">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      @endsection