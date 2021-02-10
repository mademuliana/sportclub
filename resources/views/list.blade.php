@extends('master')

@section('content')
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Pendanaan</h5>
                      <span class="h2 font-weight-bold mb-0">Rp. 350,897</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
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
      <div class="row mt-5">
        <div class="col-xl-12   mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Kegiatan</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-success">Tambah</a>
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
      </div>
@endsection      