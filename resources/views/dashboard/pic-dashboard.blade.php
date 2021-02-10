@extends('admin')


@section('content')
<?php
  $total_kegiatan = 0;
  $total_anggota = 0;
  $club_name = "";
  $pic_id = $role->id;
  $id_sc = 0;
?>
@foreach($sportclubs as $sportclub)
  @if($sportclub->pic == $pic_id)
    <?php
      $club_name = $sportclub->name;
      $id_sc = $sportclub->id;
    ?>
    @foreach($kegiatans as $kegiatan)
      @if(($sportclub->id == $id_sc) == ($kegiatan->id_club == $id_sc))
       @if ($kegiatan->deleted_at == null)
        <?php
          $total_kegiatan++;
        ?>
        @endif
      @endif
    @endforeach

    @foreach($anggotas as $anggota)
      @if(($sportclub->id == $id_sc) == ($anggota->id_sportclub == $id_sc))
        <?php
          $total_anggota++;
        ?>
      @endif
    @endforeach
    
    @foreach($users as $user)
      @if($user->id == $sportclub->pic)
        <?php  
          $pic_name = $user->name;
        ?>
      @endif
    @endforeach
        
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
                      <span class="h2 font-weight-bold mb-0">{{$club_name}}</span>
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
                      <span class="h2 font-weight-bold mb-0"><?php echo $pic_name ?></span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Kegiatan</h5>
                      <span class="h2 font-weight-bold mb-0">{{$total_kegiatan}} kegiatan</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Anggota</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $anggotas_count ?> anggota</span>
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
      <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card b shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-muted text-uppercase  ls-1 mb-1">Overview</h6>
                  <h2 class="mb-0">Kegiatan</h2>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="" data-suffix=" Kegiatan">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Bulanan</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>        
      </div>
      <div class="row mt-5">
        <div class="col-xl-12   mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Kegiatan</h3>
                </div>
                <div class="col text-right">
                  <!-- <form action="/dashboard/pic/search-kegiatan" method="GET">
                    <input type="text" name="cari" placeholder="Cari kegiatan.." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">
                  </form> -->
                  <!--<a class="btn btn-sm btn-primary" href="/kegiatan/list-kegiatan-pic/{{$id_sc}}">See all</a>-->
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
                    <th scope="col">Proposal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Acc</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($kegiatans as $kegiatan)
                    @if($kegiatan->deleted_at == null)
                  <tr class='clickable-row' data-href='/kegiatan/detail-kegiatan-pic/{{$kegiatan->id}}'>
                    <th scope="row">
                      {{$kegiatan->name}}
                    </th>
                    <td>
                      @foreach($sportclubs as $sportclub)
                        {{$sportclub->name}}
                      @endforeach
                    </td>
                    <td>
                      {{$kegiatan->place}}
                      <br>
                      {{$kegiatan->start_time}} - {{$kegiatan->finish_time}},  {{Carbon\Carbon::parse($kegiatan->date)->format('d-m-Y')}}
                    </td>
                    <?php
                      $today = new DateTime('today');
                      $dateFromDb = $kegiatan->date;
                      $today_fmt = $today->format('Y-m-d');
                    ?>
                    <td>
                      @if ($kegiatan->proposal != null)
                        <?php $proposal=$kegiatan->proposal;
                          echo '<a href="'.URL::to('/proposal/'.$proposal).'">proposal '.$kegiatan->id.'</a>';
                        ?>
                      @else 
                        kosong
                      @endif
                    </td>
                    @if ($kegiatan->is_approved == 1)                      
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
                      @else
                        <td>
                          pending
                        </td>
                      @endif
                    @else
                      <td>
                        pending
                      </td>
                    @endif
                    <td>
                      @if ($kegiatan->is_approved == 1)
                        Sudah Acc
                      @elseif($kegiatan->is_approved == 2)
                        Di Tolak
                      @else 
                        Belum Acc
                      @endif
                    </td>
                  </tr>
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
      <div class="row mt-5">
          <!-- <div class="col-xl-5 mb-5 mb-xl-0">
            <div class="card shadow">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Prestasi</h3>
                  </div>
                  <div class="col text-right">
                    <a href="/anggaran/list-anggaran" class="btn btn-sm btn-primary">See all</a>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">nama</th>
                      <th scope="col">Total <br> Prestasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">
                        Made Muliana
                      </th>
                      <td>
                        25
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        muhammad luthfi
                      </th>
                      <td>
                        30
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div> -->
          <div class=" col-xl-6">
            <div class="card shadow">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Anggota</h3>
                  </div>
                  <div class="col text-right">
                    <!-- <form action="/dashboard/pic/search-anggota" method="GET">
                      <input type="text" name="cari" placeholder="Cari Anggota.." value="{{ old('cari') }}">
                      <input type="submit" value="CARI">
                    </form> -->
                    <!--<a href="/anggota/list-anggota-pic/{{$id_sc}}" class="btn btn-sm btn-primary">See all</a>-->
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
                    @if($anggota->deleted_at == null) 
                        <tr class='clickable-row' data-href='/anggota/detail-anggota-pic/{{$anggota->id}}'>
                          <td>
                            {{ $anggota->name }}
                          </td>
                          <td>
                            {{ $anggota->nip }}
                          </td>
                          <td>
                            {{ $anggota->personal_contact }}
                          </td>
                          <td>
                            {{ $anggota->email }}
                          </td>
                          <td>
                            {{ $anggota->address }}
                          </td>
                        </tr>
                    @endif
                  @endforeach
                  </tbody>
                </table>
                <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                  {{$anggotas->links()}}
                </ul>
              </nav>
              </div>
            </div>
            </div><div class="col-xl-6">
              <div class="card shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Inventaris</h3>
                    </div>
                  <div class="col text-right">
                    <!-- <form action="/dashboard/pic/search-inventaris" method="GET">
                      <input type="text" name="cari" placeholder="Cari Inventaris.." value="{{ old('cari') }}">
                      <input type="submit" value="CARI">
                    </form> -->
                    <!--<a href="/inventaris/list-inventaris-pic/{{$id_sc}}" class="btn btn-sm btn-primary">See all</a>-->
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
                    @if($inventaris->deleted_at == null)
                      <tr class='clickable-row' data-href='/inventaris/detail-inventaris-pic/{{$inventaris->id}}'>
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
                  {{$inventariss->links()}}
                </ul>
              </nav>
              </div>
            </div>
          </div>
        </div>
        @endsection
        @section('js')
        <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
      var SalesChart = (function() {

      var $chart = $('#chart-sales');
      function init($chart) {

        var salesChart = new Chart($chart, {
          type: 'line',
          options: {
            scales: {
              yAxes: [{
                gridLines: {
                  lineWidth: 1,
                  color: '#861c1e',
                  zeroLineColor: '#861c1e'
                },
                ticks: {
                  callback: function(value) {
                    if (!(value % 10)) {
                      return value  ;
                    }
                  }
                }
              }]
            },
            tooltips: {
              callbacks: {
                label: function(item, data) {
                  var label = data.datasets[item.datasetIndex].label || '';
                  var yLabel = item.yLabel;
                  var content = '';

                  if (data.datasets.length > 1) {
                    content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                  }

                  content += '<span class="popover-body-value">' + yLabel + ' kegiatan</span>';
                  return content;
                }
              }
            }
          },
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep','Oct','Nov','Des'],
            datasets: [{
              label: 'keikutsertaan',
              data: [<?php echo "$jan,$feb,$mar,$apr,$may,$jun,$jul,$aug,$sep,$oct,$nov,$des" ?>]
            }]
          }
        });

        $chart.data('chart', salesChart);

      };

      if ($chart.length) {
        init($chart);
      }

      })();
  </script>
        @endsection