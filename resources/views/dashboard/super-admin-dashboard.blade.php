<<<<<<< HEAD
@extends('master')
=======
@extends('super_admin')

>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
@section('content')

<?php


  $total_kegiatan = 0;
  $total_anggota = 0;
  $total_sport_club = 0;

  
?>
  @foreach($kegiatans as $kegiatan)
    @if($kegiatan->deleted_at == null && $kegiatan->role == 1)
        <?php
          $total_kegiatan++;
        ?>
    @endif
  @endforeach
  @foreach($anggotas as $anggota)
    @if($anggota->deleted_at == null)
        <?php
          $total_anggota++;
        ?>
    @endif
  @endforeach
  @foreach($sportclubs as $sportclub)
    @if($sportclub->deleted_at == null && $sportclub->role == 1)
        <?php
          $total_sport_club++;
        ?>
    @endif
  @endforeach

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total anggota</h5>
                      <span class="h2 font-weight-bold mb-0">{{$total_anggota}} anggota</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-user"></i>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Sport Club</h5>
                      <span class="h2 font-weight-bold mb-0">{{$total_sport_club}} Sport Club</span>
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
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card b shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-muted text-uppercase  ls-1 mb-1">Overview</h6>
                  <h2 class="mb-0">Kegiatan <?php echo"$tahun"?></h2>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="" data-suffix=" kegiatan">
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
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">anggota</h6>
                  <h2 class="mb-0">Sport Club</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="chart-orders" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-xl-7   mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Kegiatan</h3>
                </div>
                <div class="col text-right">
                  <form action="/dashboard/super-admin/search-kegiatan" method="GET">
                    <!--<input type="text" name="cari" placeholder="Cari Kegiatan.." value="{{ old('cari') }}">-->
                    <!--<input type="submit" value="CARI">-->
                    <a class="btn btn-sm btn-primary" href="/kegiatan/list-kegiatan">See all</a>
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
                @foreach($kegiatans as $kegiatan)
                  @if($kegiatan->deleted_at == null)
                    <tr class='clickable-row' data-href='/kegiatan/detail/{{$kegiatan->id}}'>
                      <th scope="row">
                        {{$kegiatan->name}}
                      </th>
                      <td>
                        @foreach($sportclubs as $sportclub)
                          @if($kegiatan->id_club == $sportclub->id)
                            {{$sportclub->name}}
                          @endif
                        @endforeach
                      </td>
                      <td>
                        {{$kegiatan->place}}
                        <br>
                        {{$kegiatan->start_time}}-{{$kegiatan->finish_time}},  {{Carbon\Carbon::parse($kegiatan->date)->format('d-m-Y')}}
                      </td>
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
                          pending
                        </td>
                      @endif
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
        <div class=" col-xl-5">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Sport Club </h3>
                </div>
                <div class="col text-right">
                  <form action="/dashboard/super-admin/search-sport-club" method="GET">
                    <!--<input type="text" name="cari" placeholder="Cari Sport Club.." value="{{ old('cari') }}">-->
                    <!--<input type="submit" value="CARI">-->
                    <a href="/club/list-club" class="btn btn-sm btn-primary">See all</a>
                  </form>                  
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-hover">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama klub</th>
                    <th scope="col">Anggota</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Inventaris</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($sportclubs as $sportclub)
                  <?php 
                  //inisialisasi nilai awal variable unutk menampung nilai looping 
                    $jumlah_anggota_per_sport_club=0;
                    $jumlah_kegiatan_per_sport_club=0;
                    $jumlah_inventaris_per_sport_club=0;
                  ?>
                  <tr class='clickable-row' data-href='/sport-club/sport-club/{{$sportclub->id}}'>
                    <td>
                    {{ $sportclub->name }}
                    </td>
                    <td>
                    <!-- looping untuk mencari jumlah anggota per sport club -->
                    @foreach($anggotas as $anggota)
                      @if($anggota->id_sportclub == $sportclub->id)
                        <?php $jumlah_anggota_per_sport_club++ ?>
                        
                      @endif
                    @endforeach
                    {{$jumlah_anggota_per_sport_club}}
                    
                    </td>
                    <td>
                    @foreach($kegiatans as $kegiatan)
                      @if($kegiatan->id_club == $sportclub->id)
                        <?php $jumlah_kegiatan_per_sport_club++ ?>
                      @endif
                    @endforeach
                    {{$jumlah_kegiatan_per_sport_club}}
                    </td>
                    <td>
                    @foreach($inventariss as $inventaris)
                      @if($inventaris->id_club == $sportclub->id)
                        <?php $jumlah_inventaris_per_sport_club++ ?>
                      @endif
                    @endforeach
                    {{$jumlah_inventaris_per_sport_club}}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                  {{$sportclubs->links()}}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
<<<<<<< HEAD

        @endsection
        @section('js')
        <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
    
  var OrdersChart = (function() {

    var $chart = $('#chart-orders');
    var $ordersSelect = $('[name="ordersSelect"]');

    // Init chart
    function initChart($chart) {

      // Create chart
      var ordersChart = new Chart($chart, {
        type: 'bar',
        options: {
          scales: {
            yAxes: [{
              gridLines: {
                lineWidth: 1,
                color: '#861c1e',
                zeroLineColor: '#dfe2e6'
              },
              ticks: {
                callback: function(value) {
                  if (!(value % 10)) {
                    //return '$' + value + 'k'
                    return value
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

                content += '<span class="popover-body-value">' + yLabel + ' anggota</span>';

                return content;
              }
            }
          }
        },
        data: {
          labels: [
            
            <?php foreach ($sportclub_name as $name){
                echo "'".$name."'".',';
               } ?>
        
        ],
          datasets: [{
            label: 'Sales',
            data: [
              <?php 
              foreach ($sportclub_anggota as $anggota) {
                echo $anggota.",";
              }
              
              ?>
              ]
          }]
        }
    });

    // Save to jQuery object
    $chart.data('chart', ordersChart);
  }


  // Init chart
  if ($chart.length) {
    initChart($chart);
  }

})();

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
            label: 'Performance',
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
=======
 
        @endsection
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
