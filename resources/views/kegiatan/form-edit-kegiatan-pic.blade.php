
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
            <h1 class="display-2 text-white">Form Edit Kegiatan</h1>
            <p class="text-white mt-0 mb-5">edit data yang sesuai dengan kegiatan yang ingin dilaksanakan </p>
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
              <form method="post" action="/kegiatan/incedental-pic/{{ $kegiatans->id }}" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">informasi umum</h6>
                <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label name="information" id="keterangan" class="form-control-label" for="input-address">Sport Club</label>
                            <select id="cars" name="id_club" class="form-control form-control-alternative">
                              <option value="{{$sportclubs->id}}">{{$sportclubs->name}}</option>
                            </select>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label name="information" id="keterangan" class="form-control-label" for="input-address">Status</label>
                      <select id="cars" name="role" class="form-control form-control-alternative">
                        @if($kegiatans->role==1)
                        <option value="1" selected>aktif</option>
                        <option value="2">nonaktif</option>
                        <option value="3">pending</option>
                        @elseif($kegiatans->role==2)
                        <option value="1">aktif</option>
                        <option value="2" selected>nonaktif</option>
                        <option value="3">pending</option>
                        @elseif($kegiatans->role==3)
                        <option value="1" >aktif</option>
                        <option value="2">nonaktif</option>
                        <option value="3" selected>pending</option>
                        @endif
                      </select>
                    </div>
                  </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-username">Nama Kegiatan</label>
                        <input name="name" type="text" id="input-kegiatan" class="form-control form-control-alternative" placeholder="judul" value=" {{ $kegiatans->name}}">
                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group" {{ $errors->has('date') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">Tanggal kegiatan</label>
                        <input name="date" type="date" id="input-waktu" class="form-control form-control-alternative" placeholder="" value=" {{ $kegiatans->date}}">
                        <span class="text-danger"> {{ $errors->first('date') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('place') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-last-name">Tempat Kegiatan</label>
                        <textarea name="place" type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Tempat kegiatan">{{ $kegiatans->place}}</textarea>
                        <span class="text-danger"> {{ $errors->first('place') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group" {{ $errors->has('start_time') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">Waktu mulai</label>
                        <input name="start_time" type="time" id="input-waktu" class="form-control form-control-alternative" placeholder="" value="{{$kegiatans->start_time}}">
                        <span class="text-danger"> {{ $errors->first('start_time') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group" {{ $errors->has('finish_time') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">Waktu mulai</label>
                        <input name="finish_time" type="time" id="input-waktu" class="form-control form-control-alternative" placeholder="" value="{{$kegiatans->finish_time}}">
                        <span class="text-danger"> {{ $errors->first('finish_time') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <!-- <div class="col-lg-3"> -->
                      <!-- <div class="form-group" {{ $errors->has('activity_status') ? 'has-error' : '' }}>
                      @if($kegiatans->activity_status == 1)
                        <label class="form-control-label" for="input-last-name">Status kegiatan</label>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_status" class="custom-control-input" id="belum" type="radio" value="1" checked>
                          <label class="custom-control-label" for="belum">belum dilaksanakan</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_status" class="custom-control-input" id="sedang" type="radio" value="2">
                          <label class="custom-control-label" for="sedang">sedang berjalan</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_status" class="custom-control-input" id="selesai" type="radio" value="3">
                          <label class="custom-control-label" for="selesai">selesai</label>
                        </div>
                        @elseif($kegiatans->activity_status == 2)
                        <label class="form-control-label" for="input-last-name">Status kegiatan</label>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_status" class="custom-control-input" id="belum" type="radio" value="1">
                          <label class="custom-control-label" for="belum">belum dilaksanakan</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_status" class="custom-control-input" id="sedang" type="radio" value="2" checked>
                          <label class="custom-control-label" for="sedang">sedang berjalan</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_status" class="custom-control-input" id="selesai" type="radio" value="3">
                          <label class="custom-control-label" for="selesai">selesai</label>
                        </div>
                        @elseif($kegiatans->activity_status == 3)
                        <label class="form-control-label" for="input-last-name">Status kegiatan</label>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_status" class="custom-control-input" id="belum" type="radio" value="1">
                          <label class="custom-control-label" for="belum">belum dilaksanakan</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_status" class="custom-control-input" id="sedang" type="radio" value="2" >
                          <label class="custom-control-label" for="sedang">sedang berjalan</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_status" class="custom-control-input" id="selesai" type="radio" value="3" checked>
                          <label class="custom-control-label" for="selesai">selesai</label>
                        </div>
                        @endif
                        <span class="text-danger"> {{ $errors->first('activity_status') }}</span>
                      </div> -->
                    <!-- </div> -->
                    <!-- <div class="col-lg-3">
                      <div class="form-group"> -->
                      <!-- @if($kegiatans->activity_participant == 1)
                        <label class="form-control-label" for="input-last-name">Peserta</label>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_participant" class="custom-control-input" id="umum" type="radio" value="1" checked>
                          <label class="custom-control-label" for="umum">Umum</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_participant" class="custom-control-input" id="internal" type="radio" value="2">
                          <label class="custom-control-label" for="internal">internal</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_participant" class="custom-control-input" id="tertutup" type="radio" value="3">
                          <label class="custom-control-label" for="tertutup">tertutup</label>
                        </div>
                        @elseif($kegiatans->activity_status == 2)
                        <label class="form-control-label" for="input-last-name">Peserta</label>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_participant" class="custom-control-input" id="umum" type="radio" value="1" >
                          <label class="custom-control-label" for="umum">Umum</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_participant" class="custom-control-input" id="internal" type="radio" value="2" checked>
                          <label class="custom-control-label" for="internal">internal</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_participant" class="custom-control-input" id="tertutup" type="radio" value="3">
                          <label class="custom-control-label" for="tertutup">tertutup</label>
                        </div>
                        @elseif($kegiatans->activity_status == 3)
                        <label class="form-control-label" for="input-last-name">Peserta</label>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_participant" class="custom-control-input" id="umum" type="radio" value="1" >
                          <label class="custom-control-label" for="umum">Umum</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_participant" class="custom-control-input" id="internal" type="radio" value="2" >
                          <label class="custom-control-label" for="internal">internal</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="activity_participant" class="custom-control-input" id="tertutup" type="radio" value="3" checked>
                          <label class="custom-control-label" for="tertutup">tertutup</label>
                        </div>
                      @endif -->
                      <!-- </div> -->
                      <div class="col-lg-4">
                      <div class="form-group" {{ $errors->has('type') ? 'has-error' : '' }}>
                        @if($kegiatans->type == 1)
                        <label class="form-control-label" for="input-last-name">Tipe</label>
                        <div class="custom-control custom-radio mb-3">
                          <input name="type" class="custom-control-input" id="Insidental" type="radio" value="1" checked>
                          <label class="custom-control-label" for="Insidental">Insidental</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="type" class="custom-control-input" id="Rutin" type="radio" value="2">
                          <label class="custom-control-label" for="Rutin">Rutin</label>
                        </div>                      
                        @elseif($kegiatans->type == 2)
                        <label class="form-control-label" for="input-last-name">Tipe</label>
                        <div class="custom-control custom-radio mb-3">
                          <input name="type" class="custom-control-input" id="Insidental" type="radio" value="1">
                          <label class="custom-control-label" for="Insidental">Insidental</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input name="type" class="custom-control-input" id="Rutin" type="radio" value="2" checked>
                          <label class="custom-control-label" for="Rutin">Rutin</label>
                        </div>        
                        @endif
                        <span class="text-danger"> {{ $errors->first('type') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group" {{ $errors->has('proposal') ? 'has-error' : '' }}>
                          <label class="form-control-label" for="input-city">Proposal</label>
                          <input name="proposal" type="file" id="input-city" class="form-control form-control-alternative">
                          <span class="text-danger"> {{ $errors->first('proposal') }}</span>
                        </div>
                      </div>
                      <div class="col-lg-4">
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
                    <div class="col-lg-12" {{ $errors->has('budget') ? 'has-error' : '' }}>
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Dana</label>
                        <input name="budget" type="number" id="input-email" class="form-control form-control-alternative" placeholder="Rp." value="{{$kegiatans->budget}}">
                        <span class="text-danger"> {{ $errors->first('budget') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <!-- <div class="form-group">
                      @if($kegiatans->budget_type == 1)
                        <label class="form-control-label" for="input-last-name">Jenis dana</label>
                        <div class="custom-control custom-radio">
                          <input name="budget_type" class="custom-control-input" id="pemasukan" type="radio" value="1" checked>
                          <label class="custom-control-label pr-5" for="pemasukan">Pemasukan</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input name="budget_type" class="custom-control-input" id="pengeluaran" type="radio" value="2">
                          <label class="custom-control-label" for="pengeluaran">pengeluaran</label>
                        </div>   
                        @elseif($kegiatans->budget_type == 2)
                        <label class="form-control-label" for="input-last-name">Jenis dana</label>
                        <div class="custom-control custom-radio">
                          <input name="budget_type" class="custom-control-input" id="pemasukan" type="radio" value="1">
                          <label class="custom-control-label pr-5" for="pemasukan">Pemasukan</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input name="budget_type" class="custom-control-input" id="pengeluaran" type="radio" value="2" checked>
                          <label class="custom-control-label" for="pengeluaran">pengeluaran</label>
                        </div>   
                      @endif       
                      </div> -->
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12" {{ $errors->has('information') ? 'has-error' : '' }}>
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Keterangan</label>
                          <textarea name="information" id="keterangan" class="form-control form-control-alternative" placeholder="Keterangan"  type="text">{{ $kegiatans->information }}</textarea>
                          <span class="text-danger"> {{ $errors->first('information') }}</span>
                        </div>
                      </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <div class="text-right">
                  <input type="submit" name="submit" value="edit" class="btn btn-primary my-1">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script>
      window.onload = myFunction;
      function myFunction() {
        document.getElementById("input-waktu").value = "{{ $kegiatans->date->format('Y-m-d') }}";
      }
      </script>
      @endsection