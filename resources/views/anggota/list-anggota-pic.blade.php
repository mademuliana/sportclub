
@extends('master')

@section('content')   
    <!-- End Navbar -->
    <!-- Header -->
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Anggota</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $sportclub_count; ?></span>
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
            <div class="col-xl-3 col-lg-6 ">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Anggota Aktif</h5>
                      <span class="h2 font-weight-bold mb-0">{{$aktif_anggota}}</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Anggota Nonaktif</h5>
                      <span class="h2 font-weight-bold mb-0">{{$nonaktif_anggota}}</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Anggota Pending</h5>
                      <span class="h2 font-weight-bold mb-0">{{$pending_anggota}}</span>
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
                  <h3 class="mb-0">Anggota</h3>
                </div>
                <div class="col text-right">
                  <form action="/anggota/list-anggota-pic/search/<?php $sportclub->id; ?>" method="GET">
                    <input type="text" name="cari" placeholder="Cari Anggota.." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">
                    <!-- <a href="/anggota/form-input-anggota" class="btn btn-sm btn-success">Tambah</a> -->
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
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Address</th>
                    <th scope="col">Personal Contact</th>
                    <th scope="col">Tempat, Tanggal Lahir</th>
                    <th scope="col">Status</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                <?php
                  $no_urut = 1;
                ?>
                    @foreach($users as $user)
                        <tr class='clickable-row' data-href='/anggota/detail-anggota-pic/{{$user->id}}'>
                          <th scope="row" >
                            {{$no_urut}}
                              <?php $no_urut++ ?>
                          </th>
                          <td>
                          {{ $user->name }}
                          </td>
                          <td>
                          {{ $user->nip }}
                          </td>
                          <td>
                          {{ $user->address }}
                          </td>
                          <td>
                          {{ $user->personal_contact }}
                          </td>
                          <td>
                          {{ $user->place_of_birth }}, {{Carbon\Carbon::parse($user->date_of_birth)->format('d-m-Y')}}
                          </td>
                          <td>
                          @if($user->id_role==1)
                            belum disetujui
                          @elseif($user->id_role==2)
                            aktif
                          @else ($user->id_role==3)
                            nonaktif
                          @endif
                          </td>
                          <td>
                          @if(in_array($user->id,$notapprove))
                          <form action="/anggota/approve-admin/{{$user->id}}" method="post">
                            {{ csrf_field() }}
                              <input type="submit" name="submit" value="Terima" class="btn btn-success my-1"> 
                              <input  type="hidden" name="_method" value="PUT">
                            </form>

                            <form action="/anggota/delete-admin/{{$user->id}}" method="post">
                              <input type="submit" name="submit" value="Tolak" class="btn btn-danger my-1">
                                {{ csrf_field() }}
                              <input  type="hidden" name="_method" value="DELETE">
                            </form>

                          @else
                          @if($user->id_role>=3)
                          <form action="/anggota/aktif/{{$user->id}}" method="post">
                              <input type="submit" name="submit" value="aktifkan" class="btn btn-success my-1">
                                {{ csrf_field() }}
                              <input  type="hidden" name="_method" value="PUT">
                          </form>
                          @else
                          <form action="/anggota/nonaktif/{{$user->id}}" method="post">
                              <input type="submit" name="submit" value="Nonaktifkan" class="btn btn-danger my-1">
                                {{ csrf_field() }}
                              <input  type="hidden" name="_method" value="PUT">
                            </form>
                          @endif
                            
                          @endif
                            
                          </td>
                        </tr>
                      
                @endforeach
                </tbody>
              </table>
              <div class="mr-4 pb-3">
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                  {{$users->links()}}
                </ul>
              </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      @endsection