
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
            <h1 class="display-2 text-white">Form Presensi</h1>
            <p class="text-white mt-0 mb-5">masukan semua data sesuai absensi</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12   mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Presensi</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-hover mb-3">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Nama Lengkap Peserta</th>
                    <th scope="col">Unit/Fakultas</th>
                    <th scope="col">Absensi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                ?>
                @foreach($presensis as $presensi)
                  @if($presensi->id_kegiatan == $kegiatans->id)
                    @foreach($anggotas as $anggota)
                      @if($anggota->id == $presensi->id_anggota)
                        @foreach($users as $user)
                          @if($anggota->id_user == $user->id)
                          <?php 
                            //inisialisasi nilai awal variable unutk menampung nilai looping 
                            $i=0;
                            ?>
                            <form method="post" action="/presensi/update-presensi/{{$kegiatans->id}}" enctype="multipart/form-data">
                            <tr>
                              <td>
                                {{ $no }}
                                <?php
                                  $no++;
                                ?>
                              </td>
                              <th>
                                {{$user->name}}
                              </th>
                              <td>
                                {{ $user->unit }}
                              </td>
                              <td>
                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    @if($presensi->type == 2)
                                      <div class="custom-control custom-radio">
                                        <input name="presensi[{{$presensi->id}}]" class="custom-control-input" id="Hadir[{{$presensi->id}}]" type="radio" value="2" require checked>
                                        <label class="custom-control-label pr-5" for="Hadir[{{$presensi->id}}]">Hadir</label>
                                      </div>
                                      <div class="custom-control custom-radio">
                                        <input name="presensi[{{$presensi->id}}]" class="custom-control-input" id="tidak_hadir[{{$presensi->id}}]" type="radio" value="3" require>
                                        <label class="custom-control-label" for="tidak_hadir[{{$presensi->id}}]">Tidak Hadir</label>
                                      </div> 
                                    @elseif($presensi->type == 3)
                                      <div class="custom-control custom-radio">
                                        <input name="presensi[{{$presensi->id}}]" class="custom-control-input" id="Hadir[{{$presensi->id}}]" type="radio" value="2" require>
                                        <label class="custom-control-label pr-5" for="Hadir[{{$presensi->id}}]">Hadir</label>
                                      </div>
                                      <div class="custom-control custom-radio">
                                        <input name="presensi[{{$presensi->id}}]" class="custom-control-input" id="tidak_hadir[{{$presensi->id}}]" type="radio" value="3" require checked>
                                        <label class="custom-control-label" for="tidak_hadir[{{$presensi->id}}]">Tidak Hadir</label>
                                      </div> 
                                    @else
                                      <div class="custom-control custom-radio">
                                        <input name="presensi[{{$presensi->id}}]" class="custom-control-input" id="Hadir[{{$presensi->id}}]" type="radio" value="2" require>
                                        <label class="custom-control-label pr-5" for="Hadir[{{$presensi->id}}]">Hadir</label>
                                      </div>
                                      <div class="custom-control custom-radio">
                                        <input name="presensi[{{$presensi->id}}]" class="custom-control-input" id="tidak_hadir[{{$presensi->id}}]" type="radio" value="3" require>
                                        <label class="custom-control-label" for="tidak_hadir[{{$presensi->id}}]">Tidak Hadir</label>
                                      </div> 
                                    @endif
                                  </div>
                                </div>
                              </div>
                              </td> 
                                <input type="hidden" id="presensi_id" name="presensi_id[{{$presensi->id}}]" value="{{$presensi->id}}">
                            </tr>
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @endif
                  @endforeach
                </tbody>
              </table>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group" {{ $errors->has('kwitansi') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="input-city">Kwitansi</label>
                      <input name="kwitansi" type="file" id="input-city" class="form-control form-control-alternative">
                      <span class="text-danger"> {{ $errors->first('kwitansi') }}</span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group" {{ $errors->has('data_absen') ? 'has-error' : '' }}>
                    <label class="form-control-label" for="input-city">Data Absen</label>
                    <input name="data_absen" type="file" id="input-city" class="form-control form-control-alternative">
                    <span class="text-danger"> {{ $errors->first('data_absen') }}</span>
                  </div>
                </div>
              </div>
            <hr class="my-4" />
              <!-- Description -->
              <div class="text-right">
                <input type="submit" name="submit" value="submit" class="btn btn-primary my-1">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
              </div>
            </form>
          </div>
        </div>
      </div>
      @endsection