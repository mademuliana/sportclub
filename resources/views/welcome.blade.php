@extends('master')

@section('content')
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
                      <span class="h2 font-weight-bold mb-0">2356 kegiatan</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">September 2019</span>
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
                      <span class="h2 font-weight-bold mb-0">924 anggota</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">September 2019</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Prestasi</h5>
                      <span class="h2 font-weight-bold mb-0">49 juara</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">September 2019</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 ">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sportclub terbaik</h5>
                      <span class="h2 font-weight-bold mb-0"></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-trophy"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    
                    <span class="text-nowrap">September 2019</span>
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
                  <h2 class="mb-0">Kegiatan</h2>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="" data-suffix=" kegiatan">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="" data-suffix=" kegiatan">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span>
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
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Keaktifan</h6>
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
                  <a class="btn btn-sm btn-primary" href="/kegiatan/list-kegiatan">See all</a>
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
                  <tr>
                    <th scope="row">
                      kejuaran bulutangkis
                    </th>
                    <td>
                      badminton
                    </td>
                    <td>
                      Gor MBG
                      <br>
                      12.00-14.00 24 september 2019
                    </td>
                    <td class="text-danger">
                      belum dilaksanakan
                    </td>
                  </tr>
                  <tr>
                      <th scope="row">
                        main bareng bola basket 1
                      </th>
                      <td>
                        umum
                      </td>
                      <td>
                        SC
                        <br>
                        12.00-14.00 24 september 2019
                      </td>
                      <td class="text-success">
                        selesai
                      </td>
                    </tr>
                    
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class=" col-xl-5">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Sport Club</h3>
                </div>
                <div class="col text-right">
                  <a href="/club/list-club" class="btn btn-sm btn-primary">See all</a>
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
                    <th scope="col">prestasi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      badminton
                    </th>
                    <td>
                      1,480
                    </td>
                   
                    <td>
                      100 Prestasi
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      badminton
                    </th>
                    <td>
                      1,480
                    </td>
                    
                    <td>
                      100 Prestasi
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      badminton
                    </th>
                    <td>
                      1,480
                    </td>
                   
                    <td>
                      100 Prestasi
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
          <div class="col-xl-5 mb-5 mb-xl-0">
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
                <!-- Projects table -->
                <table class="table align-items-center table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">nama</th>
                      <th scope="col">klub</th>
                      <th scope="col">Total <br> Prestasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">
                        Made Muliana
                      </th>
                      <td>
                        badminton
                      </td>
                      <td>
                        25
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        muhammad luthfi
                      </th>
                      <td>
                        basket
                      </td>
                      <td>
                        3000
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class=" col-xl-7">
            <div class="card shadow">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Pendanaan</h3>
                  </div>
                  <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
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
                      <th scope="col">pendanaan</th>
                      <th scope="col">Dana tersisa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">
                        badminton
                      </th>
                      <td>
                        1,480
                      </td>
                      <td>
                        Rp. 100,480
                      </td>
                      <td>
                        Rp. 20,000
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        @endsection