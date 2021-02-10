@extends('master')

@section('content')
<?php
  $joined_club = 0;
  $name = "";
  $user_id = $role->id;
?>
  @foreach($anggotas as $anggota)
    @if($anggota->id_user == $user_id)
      @if($anggota->id_role == 2)
          <?php
            $joined_club++;
          ?>      
        @endif
    @endif
    @foreach($users as $user)
      @if ($user->id == $user_id)
        <?php
          $name = $user->name;
        ?>
      @endif
    @endforeach
  @endforeach
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <a href="" class="col-xl-3 col-lg-6">   
            <div class="" >
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Profil</h5>
                      <span class="h2 font-weight-bold mb-0">{{$name}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-user"></i>
                      </div>                    
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap"><?php echo date('F Y', mktime(0, 0, 0, date('m'), 1, date('Y'))); ?></span> 
                  </p>
                </div>
              </div>
            </div>
          </a>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Club diikuti</h5>
                      <span class="h2 font-weight-bold mb-0">{{$joined_club}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                  </p>
                </div>
              </div>
            </div> 
            <?php
              // total keaktifan = ikut kegiatan tetapi hadir (type = 2)
              $total_keaktifan = 0;
            ?>
            @foreach($anggotas as $anggota)
              @if($anggota->id_user == $user_id) 
                <?php
                  $id_anggota = $anggota->id;
                ?>
                @foreach($presensis as $presensi)
                  @if($presensi->id_anggota == $id_anggota)
                    @if($presensi->type == 2 && $presensi->deleted_at == null)
                      <?php
                        $total_keaktifan++;
                      ?>
                    @endif
                  @endif
                @endforeach
              @endif
            @endforeach
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Keaktifan</h5>
                      <span class="h2 font-weight-bold mb-0"> <span class="text-success mr-2"></span>{{$total_keaktifan}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                        <i class="fas fa-check"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">                  
                  </p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">        
      <div class="row mt-5">
        <div class="col-xl-12   mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">History Kegiatan</h3>
                </div>
                <div class="col text-right">
                  <form action="/user/user/search-kegiatan" method="GET">
                    <input type="text" name="cari" placeholder="Cari Kegiatan.." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">
                  </form>                  
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-hover">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">klub</th>
                    <th scope="col">Tempat & waktu</th>
                    <th scope="col">Status kegiatan</th>
                    <th scope="col">Status keikutsertaan</th>
                  </tr>
                </thead>              
                <tbody>
                {{-- mengambil data anggota dengan ID 1 beserta keaktifan dan kegiatan --}}
                  @foreach($anggotas as $anggota)
                    @if($anggota->id_user == $user_id)
                      <?php
                        $id_anggota = $anggota->id;
                      ?>
                      @foreach($presensis as $presensi)
                        @if($presensi->id_anggota == $id_anggota && $presensi->deleted_at == null)
                          @foreach($kegiatans as $kegiatan)
                            @if($presensi->id_kegiatan == $kegiatan->id && $kegiatan->is_approved == 1)
                              <tr class='clickable-row' data-href='/kegiatan/detail-kegiatan-member/  {{$kegiatan->id}}'>
                                <th scope="row">
                                  {{$kegiatan->name}}
                                </th>
                                <td>
                                  @foreach($sportclubs as $sportclub)
                                    @if($sportclub->id == $kegiatan->id_club)
                                      {{$sportclub->name}}
                                    @endif
                                  @endforeach
                                </td>
                                <td>
                                  {{$kegiatan->place}}
                                  <br>
                                  {{$kegiatan->start_time}}-{{$kegiatan->finish_time}} {{Carbon\Carbon::parse($kegiatan->date)->format('d-m-Y')}}
                                </td>
                                 @if ($kegiatan->role==1)
                                    <?php
                                      $today = new DateTime('today');
                                      $dateFromDb = $kegiatan->date;
                                      $today_fmt = $today->format('Y-m-d');
                                    ?>
                                    @if($dateFromDb > $today_fmt)
                                      <td class="text-danger">
                                        belum dilaksanakan
                                      </td>
                                    @elseif($dateFromDb == $today_fmt)
                                      <td class="text-warning">
                                        berjalan
                                      </td>
                                    @elseif($dateFromDb < $today_fmt)
                                      <td class="text-success">
                                        telah dilaksanakan
                                      </td>
                                    @endif
                                @else
                                    @if($kegiatan->role==1)
                                        <?php
                                          $today = new DateTime('today');
                                          $today_fmt = $today->format('Y-m-d');
                                          $dateFromDb = $kegiatan->date;
                                        ?>
                                        @if($dateFromDb > $today_fmt)
                                        <td class="text-danger">
                                          belum dilaksanakan
                                        </td>
                                        @elseif($dateFromDb == $today_fmt)
                                        <td >
                                          berjalan
                                        </td>
                                        @elseif($dateFromDb < $today_fmt)
                                        <td class="text-success">
                                          telah dilaksanakan
                                        </td>
                                        @endif
                                      @elseif($kegiatan->role==2)
                                      <td class="text-danger">
                                        Nonaktif
                                      </td>
                                      @elseif($kegiatan->role==3)
                                      <td class="text-warning">
                                          Pending
                                      </td>
                                      @endif
                                    @endif
                                <td>
                                <?php
                                  $today = new DateTime('today');
                                  $today_fmt = $today->format('Y-m-d');
                                  $dateFromDb = $kegiatan->date;
                                ?>
                                  @if($presensi->type == 1)
                                    @if($dateFromDb > $today_fmt)
                                      terdaftar
                                    @elseif($dateFromDb == $today_fmt)
                                      terdaftar
                                    @elseif($dateFromDb < $today_fmt)
                                      tidak hadir
                                    @endif
                                  @elseif($presensi->type == 2)
                                    hadir
                                  @elseif($presensi->type == 3)
                                    tidak hadir
                                  @endif
                                </td>
                              </tr>
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @endif
                  @endforeach              
                </tbody>
              </table>
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    {{$kegiatans->links()}}
                  </ul>
                </nav>
            </div>
          </div>
        </div>
      </div>
      @endsection