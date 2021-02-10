
@extends('master')

@section('content')
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">List Sport Club</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">

                
              @foreach($notapprove as $sportclubs)
                <div class="col-lg-3 col-md-6">
                  <div >
                    <button type="button " class="btn-icon-clipboard " style="background-color:#2c9c10; color:white" data-toggle="modal" data-target="#modal-not{{$sportclubs->id}}">
                      <div style="color:white;">
                        <i style="color:white" class="ni ni-active-40"></i>
                        <span style="color:white">{{$sportclubs->name}}</span>
                      </div>
                    </button>
                  </div>
                  <?php
                    $id = $sportclubs->id;
                    $jumlah_anggota = 0;
                    $jumlah_kegiatan = 0;
                    
                  ?>
                  <div class="modal fade" id="modal-not{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modal-not" aria-hidden="true">
                    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                      <div class="modal-content " style="background: linear-gradient(87deg, #12a84c 0, hsl(83, 100%, 32%) 100%) !important;">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="py-3 text-center">
                            <i class="fas fa-times-circle ni-3x"></i>
                            <h1></h1>
                            <h1 class="mt-4 heading" style="font-size: 18pt">Sport club {{ $sportclubs->name }}</h1>
                            <h4 class="heading " style="text-transform: none; text-align:justify;">
                              @foreach($users as $user)
                                @if($sportclubs->pic == $user->id)
                                permohonan anda untuk bergabung sedang di proses oleh admin {{$user->name}}. 
                                hubungi nomor atau tekan tombol whatsapp dibawah untuk mengkonfirmasi secara manual
                                @endif
                              @endforeach 
                            </h4>
                            <br>
                            <p class="heading " style="text-transform: none; text-align:justify;">
                              @foreach($users as $user)
                                @if($sportclubs->pic == $user->id)
                                  Nama Admin: {{$user->name}} 
                                  <br>
                                  Nomor Whatshapp: {{$user->personal_contact}} 
                                @endif
                              @endforeach
                            </p>
                          </div>
                        </div>
                        <div class="modal-footer">
                              @foreach($users as $user)
                                @if($sportclubs->pic == $user->id)
                                  <a href="https://api.whatsapp.com/send?phone=62{{$user->personal_contact}}&text=Saya%20sudah%20mengajukan%20perhomonan%20untuk%20mengikuti%20sportclub%20{{ $sportclubs->name }}%20mohon%20bantuannya%20untuk%20mengkonfirmasi%20ulang" name="submit" class="btn btn-white">whatsapp</a> 
                                @endif
                              @endforeach
                          <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach 

                @foreach($approve as $sportclub_in)
                <div class="col-lg-3 col-md-6">
                  <div >
                    <button type="button " class="btn-icon-clipboard " style="background-color:#5e72e4; color:white" data-toggle="modal" data-target="#modal-unjoin{{$sportclub_in->id}}">
                      <div style="color:white;">
                        <i style="color:white" class="ni ni-active-40"></i>
                        <span style="color:white">{{$sportclub_in->name}}</span>
                      </div>
                    </button>
                  </div>
                  
                  <?php
                    $id = $sportclub_in->id;
                    $jumlah_anggota = 0;
                    $jumlah_kegiatan = 0;
                    
                  ?>

                  <div class="modal fade" id="modal-unjoin{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modal-unjoin" aria-hidden="true">
                    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                      <div class="modal-content bg-gradient-danger">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="py-3 text-center">
                            <i class="fas fa-times-circle ni-3x"></i>
                            <h1></h1>
                            <h1 class="mt-4 heading" style="font-size: 18pt">Sport club {{ $sportclub_in->name }}</h1>
                            <h4 class="heading " style="text-transform: none; text-align:justify;">
                              @foreach($users as $user)
                                @if($sportclub_in->pic == $user->id)
                                hubungi admin {{$user->name}} untuk keluar dari sport club {{ $sportclub_in->name }}. 
                                admin dapat dihubungi melalui nomor atau tekan tombol whatsapp dibawah ini
                                @endif
                              @endforeach 
                            </h4>
                            <br>
                            <p class="heading " style="text-transform: none; text-align:justify;">
                              @foreach($users as $user)
                                @if($sportclub_in->pic == $user->id)
                                  Nama Admin: {{$user->name}} 
                                  <br>
                                  Nomor Whatshapp: {{$user->personal_contact}} 
                                @endif
                              @endforeach
                            </p>
                          </div>
                        </div>
                        <div class="modal-footer">
                              @foreach($users as $user)
                                @if($sportclub_in->pic == $user->id)
                                  <a href="https://api.whatsapp.com/send?phone=62{{$user->personal_contact}}&text=Saya%20ingin%20mengajukan%20permohonan%20untuk%20keluar%20dari%20sportclub%20{{ $sportclub_in->name }}" name="submit" class="btn btn-white">whatsapp</a> 
                                @endif
                              @endforeach
                          <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

               

                @foreach($except as $sportclub_ex)
                <div class="col-lg-3 col-md-6">
                  <div >
                    <button type="button " class="btn-icon-clipboard "  data-toggle="modal" data-target="#modal-join{{$sportclub_ex->id}}">
                      <div >
                        <i class="ni ni-active-40"></i>
                        <span>{{$sportclub_ex->name}}</span>
                      </div>
                    </button>
                  </div>
                  <?php
                    $id = $sportclub_ex->id;
                    $jumlah_anggota = 0;
                    $jumlah_kegiatan = 0;
                    
                  ?>
                  <form method="post" action="/sport/new-member/{{ $sportclub_ex->id }}">
                    {{ csrf_field() }}
                    <div class="modal fade" id="modal-join{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modal-join" aria-hidden="true">
                      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                        <div class="modal-content " style="background: linear-gradient(87deg,#7300c0 0, #034bc7 100%) !important;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="py-3 text-center">
                              <i class="ni ni-bell-55 ni-3x"></i>
                              <h4 class="heading mt-4">Anda Belum Bergabung</h4>
                              <p class="mb-0" style="text-transform: none; text-align:justify;">tentang {{ $sportclub_ex->name }}: {{ $sportclub_ex->description }}</p>
                              <p class="mb-0" style="text-transform: none; text-align:justify;">Admin : 
                              @foreach($users as $user)
                                @if($sportclub_ex->pic == $user->id)
                                  {{$user->name}}, 
                                @endif
                              @endforeach</p>
                              <p class="mb-0" style="text-transform: none; text-align:justify;"> total Anggota : 
                              @foreach($anggotas as $anggota)
                                @if($anggota->id_sportclub == $sportclub_ex->id)
                                  <?php $jumlah_anggota++ ?>
                                @endif
                              @endforeach
                              {{$jumlah_anggota}} Anggota</p>
                              <p class="mb-0" style="text-transform: none; text-align:justify;">Kegiatan : 
                              @foreach($kegiatans as $kegiatan)
                                @if($kegiatan->id_club == $sportclub_ex->id)
                                  <?php $jumlah_kegiatan++ ?>
                                @endif
                              @endforeach
                              {{$jumlah_kegiatan}} Kegiatan</p>
                              <p class="mb-0" style="text-transform: none; text-align:justify;">Asset: 
                              @foreach($inventariss as $inventaris)
                                @if($inventaris->id_club == $sportclub_ex->id)
                                  {{$inventaris->name}}, 
                                @endif
                              @endforeach</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-white">Bergabung</button>
                            <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                </div>
                @endforeach

                
              </div>    
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection