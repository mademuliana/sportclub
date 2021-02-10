
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
            <h1 class="display-2 text-white">Form Kegiatan</h1>
            <p class="text-white mt-0 mb-5">masukan semua data yang sesuai dengan kegiatan yang ingin dilaksanakan </p>
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
                  <h3 class="mb-0">Kegiatan</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="/kegiatan/incidental" enctype="multipart/form-data">
              {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">informasi umum</h6>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label name="information" id="keterangan" class="form-control-label" for="input-address">Sport Club</label>
                        <select id="cars" name="id_club" class="form-control form-control-alternative">
                        @foreach($sportclubs as $sportclub)
                          <option value="{{$sportclub->id}}">{{$sportclub->name}}</option>
                        @endforeach 
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-username">Nama Kegiatan</label>
                        <input name="name" type="text" id="input-kegiatan" class="form-control form-control-alternative" placeholder="judul" >
                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group" {{ $errors->has('date') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">Tanggal kegiatan</label>
                        <input name="date" type="date" id="input-waktu" class="form-control form-control-alternative" placeholder="">
                        <span class="text-danger"> {{ $errors->first('date') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('place') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-last-name">Tempat Kegiatan</label>
                        <textarea name="place" type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Tempat kegiatan" ></textarea>
                        <span class="text-danger"> {{ $errors->first('place') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group" {{ $errors->has('start_time') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">Waktu mulai</label>
                        <input name="start_time" type="time" id="input-waktu" class="form-control form-control-alternative" placeholder="">
                        <span class="text-danger"> {{ $errors->first('start_time') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group" {{ $errors->has('finish_time') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">Waktu selesai</label>
                        <input name="finish_time" type="time" id="input-waktu" class="form-control form-control-alternative" placeholder="">
                        <span class="text-danger"> {{ $errors->first('finish_time') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <!-- <div class="col-lg-3">
                      <div class="form-group" {{ $errors->has('type') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-last-name">Tipe</label>
                        <div class="custom-control custom-radio mb-3">
                          <input name="type" class="custom-control-input" id="Rutin" type="radio" value="1">
                          <label class="custom-control-label" for="Rutin">Rutin</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="type" class="custom-control-input" id="Insidental" type="radio" value="2">
                          <label class="custom-control-label" for="Insidental">Insidental</label>
                        </div>
                        <span class="text-danger"> {{ $errors->first('type') }}</span>
                      </div>
                    </div> -->
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('proposal') ? 'has-error' : '' }}>
                          <label class="form-control-label" for="input-city">Proposal</label>
                          <input name="proposal" type="file" id="input-city" class="form-control form-control-alternative">
                          <span class="text-danger"> {{ $errors->first('proposal') }}</span>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group" {{ $errors->has('poster') ? 'has-error' : '' }}>
                          <label class="form-control-label" for="input-city">Poster</label>
                          <input name="poster" type="file" id="input-city" class="form-control form-control-alternative">
                          <span class="text-danger"> {{ $errors->first('poster') }}</span>
                        </div>
                      </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">informasi Tambahan</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group" {{ $errors->has('budget') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-city">Dana</label>
                        <input name="budget" type="number" id="input-city" class="form-control form-control-alternative" placeholder="Rp." >
                        <span class="text-danger"> {{ $errors->first('budget') }}</span>
                      </div>
                    </div>
                    <!-- <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Jenis dana</label>
                        <div class="custom-control custom-radio">
                          <input name="budget_type" class="custom-control-input" id="pemasukan" type="radio" value="1">
                          <label class="custom-control-label pr-5" for="pemasukan">Pemasukan</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input name="budget_type" class="custom-control-input" id="pengeluaran" type="radio" value="2">
                          <label class="custom-control-label" for="pengeluaran">pengeluaran</label>
                        </div>          
                      </div>
                    </div> -->
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group" {{ $errors->has('information') ? 'has-error' : '' }}>
                          <label class="form-control-label" for="input-address">Keterangan</label>
                          <textarea name="information" id="keterangan" class="form-control form-control-alternative" placeholder="Keterangan"  type="text"></textarea>
                          <span class="text-danger">{{ $errors->first('information') }}</span>
                        </div>
                      </div>
                    </div>
                </div>
                <hr class="my-4" />
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