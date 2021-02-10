
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
            <h1 class="display-2 text-white">Detail Kegiatan</h1>
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
                  <h3 class="mb-0"> Kegiatan</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">informasi umum</h6>
                <img src="{{URL('/poster/'.$kegiatans->poster)}}" style="width:100%; height:50%;"> <br /><br />
                <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label name="information" id="keterangan" class="form-control-label" for="input-address">Sport Club</label>
                            <select id="cars" name="id_club" class="form-control form-control-alternative" disabled>
                            @foreach($sportclubs as $sportclub)
                              @if($sportclub->id == $kegiatans->id_club)
                              <option value="{{$sportclub->id}}" selected>{{$sportclub->name}}</option>
                              @else
                              <option value="{{$sportclub->id}}">{{$sportclub->name}}</option>
                              @endif
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
                        <input name="name" type="text" id="input-kegiatan" class="form-control form-control-alternative" placeholder="judul" value=" {{ $kegiatans->name}}" disabled>
                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group" {{ $errors->has('date') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">Tanggal kegiatan</label>
                        <input name="date" type="date" id="input-waktu" class="form-control form-control-alternative" placeholder="" value=" {{ $kegiatans->date}}" disabled>
                        <span class="text-danger"> {{ $errors->first('date') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('place') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-last-name">Tempat Kegiatan</label>
                        <textarea name="place" type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Tempat kegiatan" disabled>{{ $kegiatans->place}}</textarea>
                        <span class="text-danger"> {{ $errors->first('place') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group" {{ $errors->has('start_time') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">Waktu mulai</label>
                        <input name="start_time" type="time" id="input-waktu" class="form-control form-control-alternative" placeholder="" value="{{$kegiatans->start_time}}" disabled>
                        <span class="text-danger"> {{ $errors->first('start_time') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group" {{ $errors->has('finish_time') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">Waktu mulai</label>
                        <input name="finish_time" type="time" id="input-waktu" class="form-control form-control-alternative" placeholder="" value="{{$kegiatans->finish_time}}" disabled>
                        <span class="text-danger"> {{ $errors->first('finish_time') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group" {{ $errors->has('type') ? 'has-error' : '' }} >
                      <label class="form-control-label" for="input-email">Tipe Kegiatan</label>
                        @if($kegiatans->type == 1)
                          <input name="budget" type="text" id="input-email" class="form-control form-control-alternative" placeholder="Rp." value="Incidental" disabled>
                          <span class="text-danger"> {{ $errors->first('budget') }}</span>
                        @elseif($kegiatans->type == 2)
                          <input name="budget" type="text" id="input-email" class="form-control form-control-alternative" placeholder="Rp." value="rutin" disabled>
                          <span class="text-danger"> {{ $errors->first('budget') }}</span>
                        @endif
                        <span class="text-danger"> {{ $errors->first('type') }}</span>
                      </div>
                    </div>
                      <div class="col-lg-3">
                        <label class="form-control-label" for="input-email">Proposal</label>
                        <br />
                        @if($kegiatans->proposal != null)
                          <?php $proposal=$kegiatans->proposal;
                            echo '<a href="'.URL::to('/proposal/'.$proposal).'">proposal '.$kegiatans->proposal.'</a>';
                          ?>
                        @else
                          -
                        @endif
                      </div>
                      <div class="col-lg-3">
                        <label class="form-control-label" for="input-email">Data Absen</label>
                        <br />
                        @if($kegiatans->data_absen != null)
                          <?php $data_absen=$kegiatans->data_absen;
                            echo '<a href="'.URL::to('/data_absen/'.$data_absen).'">data_absen '.$kegiatans->data_absen.'</a>';
                          ?>
                        @else
                          -
                        @endif
                      </div>
                      <div class="col-lg-3">
                        <label class="form-control-label" for="input-email">Kwitansi</label>
                        <br />
                        @if($kegiatans->kwitansi != null)
                          <?php $kwitansi=$kegiatans->kwitansi;
                            echo '<a href="'.URL::to('/kwitansi/'.$kwitansi).'">kwitansi '.$kegiatans->kwitansi.'</a>';
                          ?>
                        @else
                          -
                        @endif
                      </div>
                  </div>
                </div>
                @if($kegiatans->type == 1)
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">informasi Tambahan</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6" {{ $errors->has('budget') ? 'has-error' : '' }}>
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Dana Diajukan</label>
                        <input name="budget" type="number" id="input-email" class="form-control form-control-alternative" placeholder="Rp." value="{{number_format($kegiatans->budget, 0, ',', '.')}}" disabled>
                        <span class="text-danger"> {{ $errors->first('budget') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Dana Disetujui</label>
                        @if($kegiatans->budget_approved != null)
                          <input name="budget_approved" type="number" id="input-email" class="form-control form-control-alternative" placeholder="Rp." value="{{number_format($kegiatans->budget_approved, 0, ',', '.')}}" disabled>
                        @else 
                          <input name="budget_approved" type="number" id="input-email" class="form-control form-control-alternative" placeholder="Kegiatan belum di acc" value="-" disabled>
                        @endif
                        <span class="text-danger"> {{ $errors->first('budget_approved') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" {{ $errors->has('information') ? 'has-error' : '' }}>
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Keterangan</label>
                        <textarea name="information" id="keterangan" class="form-control form-control-alternative" placeholder="Keterangan"  type="text" disabled>{{ $kegiatans->information }}</textarea>
                        <span class="text-danger"> {{ $errors->first('information') }}</span>
                      </div>
                    </div>
                  </div>
                </div>
                @endif

                @if($kegiatans->is_approved == 2 || $kegiatans->is_approved == 3)                
                <div class="pl-lg-4">                  
                  <div class="row">
                    <div class="col-md-12" {{ $errors->has('informatreasonion') ? 'has-error' : '' }}>
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Alasan Penolakan/Tinjau  Ulang</label>
                        <textarea name="reason" id="keterangan" class="form-control form-control-alternative" placeholder="Keterangan"  type="text" disabled>{{ $kegiatans->reason }}</textarea>
                        <span class="text-danger"> {{ $errors->first('reason') }}</span>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
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