@extends('master')

@section('content')
    <!-- End Navbar -->
    <!-- Header -->
    <?php
        $total_kegiatan = 0;
        $ongoing_kegiatan = 0;
        $waiting_kegiatan = 0;
        $done_kegiatan = 0;
        $pic_id = $role->id;
    ?>
    
    @if($sportclub->pic == $pic_id)   
        <?php
          $id_sc = $sportclub->id;
        ?>
        @foreach($kegiatans as $kegiatan)
            @if(($sportclub->id == $id_sc) == ($kegiatan->id_club == $id_sc) && $kegiatan->deleted_at == null)
                <?php
                  $total_kegiatan++;
                  $today = new DateTime('today');
                  $today_fmt = $today->format('Y-m-d');
                  $dateFromDb = $kegiatan->date;
                ?>
                @if($kegiatan->deleted_at == null)
                    @if($dateFromDb > $today_fmt)
                      <?php
                        $waiting_kegiatan++;
                      ?>
                    @elseif($dateFromDb == $today_fmt)
                      <?php
                        $ongoing_kegiatan++;
                      ?>
                    @elseif($dateFromDb < $today_fmt)
                      <?php
                        $done_kegiatan++;
                      ?>
                    @endif
                @endif
            @endif
        @endforeach
    @endif
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total kegiatan</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $total_kegiatan }}</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">belum berjalan</h5>
                      <span class="h2 font-weight-bold mb-0">{{$waiting_kegiatan}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-times"></i>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">sedang berjalan</h5>
                      <span class="h2 font-weight-bold mb-0">{{$ongoing_kegiatan}}</span>
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
            <div class="col-xl-3 col-lg-6 ">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">selesai</h5>
                      <span class="h2 font-weight-bold mb-0">{{$done_kegiatan}}</span>
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
                  <h3 class="mb-0">Kegiatan</h3>
                </div>
                <div class="col text-right">
                  <form action="/kegiatan/list-kegiatan-pic/search/{{$sportclub->id}}" method="GET" style="margin-bottom:10px;">
                    <input type="text" name="cari" placeholder="Cari kegiatan.." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">                    
                  </form> 
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-rutin">Tambah kegiatan rutin</button>
                    <a href="/kegiatan/form-input-kegiatan-pic/{{$sportclub->id}}" class="btn btn-sm btn-success">Tambah kegiatan incidental</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-hover mb-3">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Klub</th>
                    <th scope="col">Tempat & waktu</th>
                    <th scope="col">Tipe kegiatan</th>
                    <th scope="col">Peserta</th>
                    <th scope="col">Status</th>
                    <th scope="col">Proposal</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Status Acc</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                ?>
                @foreach($kegiatans as $kegiatan)
                @if($kegiatan->deleted_at == null && $kegiatan->id_club == $sportclub->id)
                  <?php 
                  //inisialisasi nilai awal variable unutk menampung nilai looping 
                    $total_anggota=0;
                  ?>
                    <tr class='clickable-row' data-href='/kegiatan/detail-kegiatan-pic/{{$kegiatan->id}}'>
                    <td>
                      {{ $no }}
                      <?php
                        $no++;
                      ?>
                    </td>
                    <th scope="row">
                      {{$kegiatan->name}}
                    </th>
                    <td>
                      @if($sportclub->id == $kegiatan->id_club)
                        {{ $sportclub->name}} 
                      @endif
                    </td>
                    <td>
                      {{$kegiatan->place}}
                      <br>
                      {{Carbon\Carbon::parse($kegiatan->date)->format('d-m-Y')}}
                    </td>
                    <td>
                    @if($kegiatan->type == 1)
                      Insidental
                    @elseif($kegiatan->type == 2)
                      Rutin
                    @endif
                    </td>
                    <td>
                    <!-- looping untuk mencari jumlah anggota per sport club -->
                    @foreach($presensis as $presensi)
                      @if($presensi->id_kegiatan == $kegiatan->id)
                      <?php $total_anggota++ ?>
                      @endif
                    @endforeach
                    {{$total_anggota}}
                    </td>
                    @if($kegiatan->role == 1)
                    @if ($kegiatan->is_approved == 1)
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
                    @else
                      <td>
                        belum disetujui
                      </td>
                    @endif
                    @elseif($kegiatan->role == 2)
                    <td>
                      nonaktif
                    </td>
                    @elseif($kegiatan->role == 3)
                    <td>
                      pending
                    </td>
                    @endif
                    <td>
                      @if ($kegiatan->proposal != null)
                        <?php $proposal=$kegiatan->proposal;
                          echo '<a href="'.URL::to('/proposal/'.$proposal).'">proposal '.$kegiatan->id.'</a>';
                        ?>
                      @else 
                        kosong
                      @endif
                    </td>
                    <td>
                      @if ($kegiatan->poster != null)
                        <?php $poster=$kegiatan->poster;
                        echo '<a href="'.URL::to('/poster/'.$poster).'">poster '.$kegiatan->id.'</a>';
                        ?>
                      @else 
                        kosong  
                      @endif
                    </td>
                    <td>
                        @if ($kegiatan->is_approved == 1)
                            Sudah Acc
                        @elseif($kegiatan->is_approved == 2)
                            Di Tolak
                        @elseif($kegiatan->is_approved == 3)
                            TInjau Ulang
                        @else 
                            Belum Acc
                        @endif
                    </td>
                    <td>
                      @if($dateFromDb < $today_fmt)
                        @if ($kegiatan->is_approved == 1)
                          <a href="/presensi/form-input-presensi-pic/{{$kegiatan->id}}" class="btn btn-sm btn-primary my-1">Input Absensei</a>
                        @endif  
                      @endif
                      <!-- <form action="/kegiatan/pic/{{$kegiatan->id}}" method="post">
                        <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-primary my-1">
                          {{ csrf_field() }}
                        <input  type="hidden" name="_method" value="DELETE">
                      </form> -->
                      @if ($kegiatan->type == 1)
                        <a href="/kegiatan/incedental-pic/{{$sportclub->id}}/{{$kegiatan->id}}" class="btn btn-sm btn-primary my-1">Edit</a>
                      @elseif($kegiatan->type == 2)
                         <a href="/kegiatan/rutin-pic/{{$sportclub->id}}/{{$kegiatan->id}}" class="btn btn-sm btn-primary my-1">Edit</a>
                      @endif                              
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
              <div class="mr-4 pb-3">
              <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    {{$kegiatans->links()}}
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>

     <!-- start modal kegiatan rutin -->
     <div class="modal fade" id="modal-rutin" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
          <div class="modal-content bg-gradient-default">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="py-3 text-center">
            <form method="post" action="/kegiatan/rutin-pic" enctype="multipart/form-data">
            {{ csrf_field() }}
              <h4 class="heading mt-4">Input Kegiatan Rutin</h4>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                  <div class="form-group"  >
                    <label class="form-control-label" style="color:white" for="input-email">Sport Club</label>
                    <select id="cars" name="id_club" class="form-control form-control-alternative">
                      <option value="{{$sportclub->id}}">{{$sportclub->name}}</option>
                    </select>
                  </div>
                  <div class="form-group"  {{ $errors->has('name') ? 'has-error' : '' }}>
                    <label class="form-control-label" style="color:white" for="input-email">Nama Kegiatan</label>
                    <input name="name" type="text" id="input-kegiatan" class="form-control form-control-alternative" placeholder="judul" required >
                    <span class="text-danger"> {{ $errors->first('name') }}</span>
                  </div>
                  <div class="form-group" {{ $errors->has('place') ? 'has-error' : '' }}>
                    <label class="form-control-label" style="color:white" for="input-email">Tempat Kegiatan</label>
                    <textarea name="place" type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Tempat kegiatan" required></textarea>
                    <span class="text-danger"> {{ $errors->first('name') }}</span>
                  </div>
                  <div class="row form-group">
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('date') ? 'has-error' : '' }}>
                        <label class="form-control-label" style="color:white" for="input-email">Tanggal Kegiatan</label>
                        <input name="date" type="date" id="input-waktu" class="form-control form-control-alternative" placeholder="" required>
                        <span class="text-danger"> {{ $errors->first('date') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group" {{ $errors->has('start_time') ? 'has-error' : '' }}>
                        <label class="form-control-label" style="color:white" for="input-email">Mulai</label>
                        <input name="start_time" type="time" id="input-waktu" class="form-control form-control-alternative" placeholder="" required>
                        <span class="text-danger"> {{ $errors->first('start_time') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group" {{ $errors->has('finish_time') ? 'has-error' : '' }}>
                        <label class="form-control-label" style="color:white" for="input-email">Selesai</label>
                        <input name="finish_time" type="time" id="input-waktu" class="form-control form-control-alternative" placeholder="" required>
                        <span class="text-danger"> {{ $errors->first('finish_time') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" >
                    <div class="form-group" {{ $errors->has('poster') ? 'has-error' : '' }}>
                      <label class="form-control-label" style="color:white" for="input-email">Input Poster</label>
                      <input name="poster" type="file" id="poster" class="form-control form-control-alternative" placeholder="Tempat kegiatan" required>
                      <span class="text-danger"> {{ $errors->first('poster') }}</span>
                    </div>
                  </div>
                  <p class="mb-0"></p></p>
                  <p class="mb-0">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-white">Input</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end modal kegiatan rutin-->
      <!-- Footer -->
      @endsection