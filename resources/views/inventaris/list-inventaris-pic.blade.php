@extends('master')

@section('content')
    <!-- End Navbar -->
    <!-- Header -->
    <?php
      $total_inventaris = 0;
      $good_cond_inventaris = 0;
      $bad_cond_inventaris = 0;
      $gone_cond_inventaris = 0;
    ?>
    @foreach($inventariss as $inventaris)
      @if($inventaris->id_club == $sportclubs->id && $inventaris->deleted_at == null)
        <?php
          $total_inventaris++;
        ?>
        @if(1 == $inventaris->condition)
          <?php
            $good_cond_inventaris++;
          ?>
        @elseif(2 == $inventaris->condition)
          <?php
            $bad_cond_inventaris++;
          ?>
        @elseif(3 == $inventaris->condition)
          <?php
            $gone_cond_inventaris++;
          ?>
        @endif
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total inventaris</h5>
                      <span class="h2 font-weight-bold mb-0">{{$total_inventaris}}</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Kondisi Bagus</h5>
                      <span class="h2 font-weight-bold mb-0">{{$good_cond_inventaris}}</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Kondisi Buruk</h5>
                      <span class="h2 font-weight-bold mb-0">{{$bad_cond_inventaris}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Hilang</h5>
                      <span class="h2 font-weight-bold mb-0">{{$gone_cond_inventaris}}</span>
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
                  <h3 class="mb-0">Inventaris</h3>
                </div>
                <div class="col text-right">
                  <form action="/inventaris/list-inventaris-pic/search/{{$sportclubs->id}}" method="GET">
                    <input type="text" name="cari" placeholder="Cari inventaris.." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">
                    <a href="/inventaris/form-input-inventaris-pic/{{$sportclubs->id}}" class="btn btn-sm btn-success">Tambah</a>
                  </form>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-hover mb-3">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Club</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Waktu Pembelian</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no=1;
                ?>
                @foreach($inventariss as $inventaris)
                @if($inventaris->deleted_at == null && $inventaris->id_club == $sportclubs->id)
                <?php 
                  //inisialisasi nilai awal variable unutk menampung nilai looping 
                  $i=0;
                  ?>
                    <tr class='clickable-row' data-href='/inventaris/detail-inventaris-pic/{{$inventaris->id}}'>                    
                    <th scope="row">
                      {{ $no }}
                      <?php
                        $no++;
                      ?>
                    </th>
                    <td>
                      @if($sportclubs->id == $inventaris->id_club)
                        {{$sportclubs->name}}
                      @endif
                    </td>
                    <td>
                      {{$inventaris->name}}
                    </td>
                      @if(1 == $inventaris->condition)
                    <td class="text-success">
                        Layak pakai
                    </td>
                      @elseif(2 == $inventaris->condition)
                    <td class="text-warning">
                        Tidak layak pakai
                    </td>
                     @elseif(3 == $inventaris->condition)
                    <td class="text-warning">
                        Hilang
                    </td>
                      @endif
                    <td>
                      <?php
                        $price = number_format($inventaris->price , 0, ',', '.');
                      ?>
                      Rp{{$price}}
                    </td>
                    <td>
                      {{Carbon\Carbon::parse($inventaris->time_purchased)->format('d-m-Y')}}
                    </td>
                    <td>
                      <!-- <form action="/inventaris/pic/{{$inventaris->id}}" method="post">
                        <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-primary my-1">
                          {{ csrf_field() }}
                        <input  type="hidden" name="_method" value="DELETE">
                      </form> -->
                      <a href="/inventaris/pic/{{$inventaris->id}}" class="btn btn-sm btn-primary my-1">Edit</a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
              <div class="mr-4 pb-3">
              <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    {{ $inventariss->links() }}
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      @endsection