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
            <h1 class="display-2 text-white">Form Anggaran</h1>
            <p class="text-white mt-0 mb-5">masukan semua data yang dibutuhkan dalam penginputan anggaran </p>
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
                  <h3 class="mb-0">input Anggaran</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <form>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-3">
                      <h6 class="heading-small text-muted mb-4">Pilih Sport Club</h6>
                      <div class="form-group dropdown">
                        <select class="form-control form-control-alternative">
                          <option class="dropdown-item" value="volvo">Badminton</option>
                          <option class="dropdown-item" value="saab">Lari 300 meter</option>
                          <option class="dropdown-item" value="mercedes">Mercedes</option>
                          <option class="dropdown-item" value="audi">Audi</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <h6 class="heading-small text-muted mb-4">Jenis Dana</h6>
                      <div class="form-group dropdown">
                        <select class="form-control form-control-alternative">
                          <option class="dropdown-item" value="volvo">anggaran bulanan</option>
                          <option class="dropdown-item" value="saab">Penghargaan</option>
                          <option class="dropdown-item" value="mercedes">Denda</option>
                          <option class="dropdown-item" value="audi">lainnya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <h6 class="heading-small text-muted mb-4">Nominal</h6>
                        <input type="number" id="input-city" class="form-control form-control-alternative" placeholder="nominal" >
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Informasi Lengkap</h6>
                <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-2">
                        <h6 class="heading-small mb-4">Sport Club</h6>
                      </div>
                      <div class="col-lg-1">
                        <h6 class="heading-small mb-4"> : </h6>
                      </div>
                      <div class="col-lg-9">
                        <h6 class="heading-small mb-4"> Badminton </h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <h6 class="heading-small mb-4">Admin</h6>
                      </div>
                      <div class="col-lg-1">
                        <h6 class="heading-small mb-4"> : </h6>
                      </div>
                      <div class="col-lg-9">
                        <h6 class="heading-small mb-4"> Nur Muhammad Lutfhi </h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <h6 class="heading-small mb-4">Nominal</h6>
                      </div>
                      <div class="col-lg-1">
                        <h6 class="heading-small mb-4"> : </h6>
                      </div>
                      <div class="col-lg-9">
                        <h6 class="heading-small mb-4"> Rp 200,000 </h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <h6 class="heading-small mb-4">jenis</h6>
                      </div>
                      <div class="col-lg-1">
                        <h6 class="heading-small mb-4"> : </h6>
                      </div>
                      <div class="col-lg-9">
                        <h6 class="heading-small mb-4"> anggaran bulanan </h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <h6 class="heading-small mb-4">Pengirim</h6>
                      </div>
                      <div class="col-lg-1">
                        <h6 class="heading-small mb-4"> : </h6>
                      </div>
                      <div class="col-lg-9">
                        <h6 class="heading-small mb-4"> SDM </h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-5">
                        <h6 class="heading-small  mb-4">Masukan bukti</h6>
                        <input type="file" id="input-city" class="form-control form-control-alternative" placeholder="nominal" >
                      </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                
                <div class=" text-right">
                    <a href="#!" class="btn btn-md btn-primary">Submit</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      @endsection