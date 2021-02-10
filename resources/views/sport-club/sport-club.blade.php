
@extends('master')

@section('content')
<?php
  $total_anggota = 0;
  $total_kegiatan = 0;
  $pic_name = ''; 
?>
@foreach($kegiatans as $kegiatan)
  @if($sportclubs->id == $kegiatan->id_club && $kegiatan->deleted_at == null)
    <?php
      $total_kegiatan++;
    ?>
  @endif
@endforeach
@foreach($anggotas as $anggota)
  @if($sportclubs->id == $anggota->id_sportclub && $anggota->deleted_at == null)
    <?php
      $total_anggota++;
    ?>      
  @endif
@endforeach
@foreach($users as $user)
    @if($sportclubs->pic == $user->id )
    <?php  $pic_name = $user->name; ?>            
    @endif
@endforeach
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6 ">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Profile</h5>
                      <span class="h2 font-weight-bold mb-0">{{$sportclubs->name}}</span>
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
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">PIC</h5>
                      <span class="h2 font-weight-bold mb-0">{{$pic_name}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Anggota</h5>
                      <span class="h2 font-weight-bold mb-0">{{$total_anggota}} Anggota</span>
                    </div> 
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Kegiatan</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $total_kegiatan}} kegiatan</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
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
                  <h3 class="mb-0">Kegiatan</h3>
                </div>
                <div class="col text-right">
                  <form action="/sport-club/sport-club/{{$sportclubs->id}}/searchKegiatan" method="GET">
                    <input type="text" name="cari" placeholder="Cari kegiatan.." value="{{ old('cari') }}">
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
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                ?>
                @foreach($kegiatans as $kegiatan)
                  @if($kegiatan->id_club == $sportclubs->id) 
                    @if($kegiatan->is_approved == 1 && $kegiatan->deleted_at == null)
                      <tr class='clickable-row' data-href='/kegiatan/detail/{{$kegiatan->id}}'>
                        <th scope="row">
                          {{$kegiatan->name}}
                        </th>
                        <td>
                          {{$sportclubs->name}}
                        </td>
                        <td>
                          {{$kegiatan->place}}
                          <br>
                          {{$kegiatan->start_time}}-{{$kegiatan->finish_time}}, {{Carbon\Carbon::parse($kegiatan->date)->format('d-m-Y')}}
                        </td>
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
                        <td class="text-warning">
                          berjalan
                        </td>
                        @elseif($dateFromDb < $today_fmt)
                        <td class="text-success">
                          telah dilaksanakan
                        </td>
                        @endif
                        </tr>
                    @endif
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
          <div class="row mt-5">
            <div class="col-xl-6">
              <div class="card shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Anggota</h3>
                    </div>
                  <div class="col text-right">
                    <form action="/sport-club/sport-club/{{$sportclubs->id}}/searchAnggota" method="GET">
                      <input type="text" name="cari" placeholder="Cari Anggota.." value="{{ old('cari') }}">
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
                      <th scope="col">Nama </th>
                      <th scope="col">NIP</th>
                      <th scope="col">no telp</th>
                      <th scope="col">email</th>
                      <th scope="col">alamat</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($anggotas as $anggota)
                    @if($anggota->id_sportclub == $sportclubs->id)
                      @foreach($users as $user)
                        @if($anggota->id_user == $user->id && $anggota->deleted_at == null)
                          <tr class='clickable-row' data-href='/anggota/detail/{{$user->id}}'>
                            <td>
                              {{ $user->name }}
                            </td>
                            <td>
                              {{ $user->nip }}
                            </td>
                            <td>
                              {{ $user->personal_contact }}
                            </td>
                            <td>
                              {{ $user->email }}
                            </td>
                            <td>
                              {{ $user->address }}
                            </td>
                          </tr>
                        @endif
                      @endforeach
                    @endif
                  @endforeach
                  </tbody>
                </table>
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    {{$users->links()}}
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
              <div class="card shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Inventaris</h3>
                    </div>
                  <div class="col text-right">
                    <form action="/sport-club/sport-club/{{$sportclubs->id}}/searchInventaris" method="GET">
                      <input type="text" name="cari" placeholder="Cari Inventaris.." value="{{ old('cari') }}">
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
                      <th scope="col">Nama </th>
                      <th scope="col">Kondisi</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Tanggal Pembelian</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($inventariss as $inventaris)
                    @if($inventaris->id_club == $sportclubs->id)
                      <tr class='clickable-row' data-href='/inventaris/detail/{{$inventaris->id}}'>                    
                        <td>
                          {{ $inventaris->name }}
                        </td>
                        <td>
                          {{ $inventaris->condition }}
                        </td>
                        <td>
                          <?php
                            $price = number_format($inventaris->price , 0, ',', '.');
                          ?>
                          Rp{{$price}}
                        </td>
                        <td>
                          {{ $inventaris->time_purchased }}
                        </td>
                      </tr>
                    @endif
                  @endforeach
                  </tbody>
                </table>
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    {{$users->links()}}
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>

      
      @endsection