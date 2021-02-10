@extends('master')

@section('content')
    <?php
      $jumlah_club = 0;
      $aktif_club = 0;
      $nonaktif_club = 0;
    ?>
    @foreach($clubs as $club)
      <?php
        $jumlah_club++;
      ?>
      @if($club->role == 1)
        <?php
            $aktif_club++;
        ?>
      @elseif($club->role == 2)
        <?php
            $nonaktif_club++;
        ?>
      @endif
    @endforeach
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-4 col-lg-6 ">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total club</h5>
                      <span class="h2 font-weight-bold mb-0">{{$jumlah_club}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap"><?php echo date('F Y', mktime(0, 0, 0, date('m'), 1, date('Y'))); ?></span> 
                  </p>
                </div>
              </div>
            </div>
             <div class="col-xl-3 col-lg-6 ">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Klub Aktif</h5>
                      <span class="h2 font-weight-bold mb-0">{{$aktif_club}}</span>
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
            <div class="col-xl-3 col-lg-6 ">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Klub Nonaktif</h5>
                      <span class="h2 font-weight-bold mb-0">{{$nonaktif_club}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="fas fa-minus"></i>
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
                  <h3 class="mb-0">Sport Club</h3>
                </div>
                <div class="col text-right">
                  <form action="/club/list-club/search" method="GET">
                    <input type="text" name="cari" placeholder="Cari club.." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">
                    <a href="/club/form-input-club" class="btn btn-sm btn-success">Tambah</a>
                  </form>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-hover mb-3">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Sport Club</th>
                    <th scope="col">anggota</th>
                    <th scope="col">jumlah Asset</th>
                    <th scope="col">kegiatan</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $no_urut = 1;
                ?>
                @foreach($clubs as $club)
                @if($club->deleted_at == null)
                  <?php 
                  //inisialisasi nilai awal variable unutk menampung nilai looping 
                    $i=0;
                    $j=0;
                    $k=0;
                  ?>
                  <tr>
                    <th scope="row">
                        {{$no_urut}}
                        <?php $no_urut++ ?>
                    </th>
                    <td>
                    {{ $club->name }}
                    </td>
                    <td>
                    <!-- looping untuk mencari jumlah anggota per sport club -->
                    @foreach($anggotas as $anggota)
                      @if($anggota->id_sportclub == $club->id)
                      <?php $i++ ?>
                      @endif
                    @endforeach
                    {{$i}}
                    </td>
                    <td>
                    <!-- looping untuk mencari jumlah inventaris per sport club -->
                    @foreach($inventariss as $inventaris)
                      @if($inventaris->id_club == $club->id)
                      <?php $j++ ?>
                      @endif
                    @endforeach
                    {{$j}}
                    </td>
                    <td>
                    <!-- looping untuk mencari jumlah kegiatan per sport club -->
                    @foreach($kegiatans as $kegiatan)
                      @if($kegiatan->id_club == $club->id)
                      <?php $k++ ?>
                      @endif
                    @endforeach
                    {{$k}}
                    </td>
                    <td>
                      @if($club->role==1)
                      <button type="button" class="btn btn-danger my-1" data-toggle="modal" data-target="#modal-unjoin{{$club->id}}">
                          Nonaktifkan
                      </button>
                      <!-- <form action="/club/nonaktif/{{$club->id}}" method="post">
                        <input type="submit" name="submit" value="nonaktifkan" class="btn btn-danger my-1">
                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                      </form> -->

                      <form method="post" action="/club/nonaktif/{{$club->id}}">
                       <input type="hidden" id="current_pic" name="current_pic" value="{{$club->pic}}">
                      {{ csrf_field() }}
                      <div class="modal fade" id="modal-unjoin{{$club->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-unjoin" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                              <div class="modal-content bg-gradient-danger">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body" style="white-space: normal  !important;">
                                  <div class="py-3 text-center">
                                    <i class="fas fa-times-circle ni-3x"></i>
                                    <h4 class="heading mt-4">apakah anda ingin menonaktifkan Sportclub {{$club->name}}?</h4>
                                    <p class="mb-0">Seluruh keanggotaan dan kegiatan dari sportclub ini </p>
                                    <p class="mb-0">akan dinonaktifkan bersamaan saat sportclub ini di nonaktifkan</p>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" name="submit" value="nonaktifkan" class="btn btn-danger my-1">
                                  <input type="hidden" name="_method" value="PUT">
                                  <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                              </div>
                            </div> 
                      </form>
                      @elseif($club->role==2)
                      <form action="/club/aktif/{{$club->id}}" method="post">
                        <input type="submit" name="submit" value="Aktifkan" class="btn btn-success my-1">
                       <input type="hidden" id="current_pic" name="current_pic" value="{{$club->pic}}">
                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                      </form>
                      @endif
                      <a href="/club/{{$club->id}}" class="btn btn-primary my-1">EDIT</a>
                      <a href="/sport-club/sport-club/{{$club->id}}" class="btn btn-primary my-1">Detail</a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
              <div class="mr-4 pb-3">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    {{$clubs->links()}}
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection