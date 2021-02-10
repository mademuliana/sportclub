@extends('master')

@section('content')
    <?php
      $total_kegiatan = 0;
      $kegiatan_pending = 0;
      $kegiatan_ditolak = 0;
      $kegiatan_diacc = 0;
    ?>
    @foreach($kegiatans as $kegiatan)
      @if($kegiatan->deleted_at == null)
        <?php 
          $total_kegiatan++;
        ?>
        @if($kegiatan->is_approved == 1)
          <?php
            $kegiatan_diacc++;
          ?>
        @elseif($kegiatan->is_approved == 2)
          <?php
            $kegiatan_ditolak++;
          ?>
        @elseif($kegiatan->is_approved == 0)
          <?php
              $kegiatan_pending++;
          ?>
        @endif
      @endif
    @endforeach
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total kegiatan</h5>
                      <span class="h2 font-weight-bold mb-0">{{$total_kegiatan}}</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Kegiatan Pending</h5>
                      <span class="h2 font-weight-bold mb-0">{{$kegiatan_pending}}</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Kegiatan di Tolak</h5>
                      <span class="h2 font-weight-bold mb-0">{{$kegiatan_ditolak}}</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Sudah di Acc</h5>
                      <span class="h2 font-weight-bold mb-0">{{$kegiatan_diacc}}</span>
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
                  <form action="/kegiatan/list-kegiatan/searchApproved" method="GET">
                    <input type="text" name="cari" placeholder="Cari kegiatan.." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">
                    <!-- <a href="/kegiatan/form-input-kegiatan" class="btn btn-sm btn-success">Tambah</a> -->
                  </form>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-hover mb-3">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Klub</th>
                    <th scope="col">budget diajukan</th>
                    <th scope="col">Proposal</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Status Acc</th>
                    <th scope="col">budget aprrove</th> 
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($kegiatans as $kegiatan)
                @if($kegiatan->deleted_at == null)
                  <script>
                    window.onload = myFunction{{$kegiatan->id}};
                      function myFunction{{$kegiatan->id}}() {
                        document.getElementById("ba{{$kegiatan->id}}").value = "{{$kegiatan->budget_approved}}";
                      }
                    </script>
                    <?php 
                      //inisialisasi nilai awal variable unutk menampung nilai looping 
                      $i=0;
                    ?>
                    @if($kegiatan->type == 1 && $kegiatan->role == 1)
                    <tr>
                      <th scope="row">
                        {{$kegiatan->name}}
                        <br>
                        tempat: {{$kegiatan->place}}
                        <br>
                        waktu: {{$kegiatan->start_time}}-{{$kegiatan->finish_time}}, {{Carbon\Carbon::parse($kegiatan->date)->format('d-m-Y')}}
                      </th>
                      <td>
                        @foreach($sportclubs as $sportclub)
                          @if($sportclub->id == $kegiatan->id_club)
                            {{ $sportclub->name}} 
                          @endif
                        @endforeach
                      </td>
                      <td>
                        <?php
                          $budget = number_format($kegiatan->budget, 0, ',', '.');
                        ?>
                      Rp{{$budget}}
                      </td>
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
                        @else 
                          Belum Acc
                        @endif
                      </td>                    
                      @if ($kegiatan->is_approved == 1)
                      <td>
                        <?php
                          $budget_approved = number_format($kegiatan->budget_approved, 0, ',', '.');
                        ?>
                        Rp{{$budget_approved}}
                      </td>
                      <td>
                        <form action="/kegiatan/not-approved/{{$kegiatan->id}}" method="post">
                          <button type="button" class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#modal-tolak{{$kegiatan->id}}">
                            Tolak
                          </button>
                          <div class="modal fade" id="modal-tolak{{$kegiatan->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-tolak" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                              <div class="modal-content bg-gradient-default">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="py-3 text-center">
                                    <i class="fas fa-times-circle ni-3x"></i>
                                    <h4 class="heading mt-4">apakah anda ingin menolak kegiatan ini?</h4>                                                                  
                                  </div>
                                  <div class="form-group"  {{ $errors->has('reason') ? 'has-error' : '' }}>
                                    <input name="reason" type="text" id="input-kegiatan" class="form-control form-control-alternative" placeholder="Keterangan" required >
                                    <span class="text-danger"> {{ $errors->first('reason') }}</span>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" name="submit" value="Tolak" class="btn btn-primary my-1">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="PUT">
                                  <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                              </div>
                            </div>
                          </form>
                          
                          
                          <form action="/kegiatan/tinjau-ulang/{{$kegiatan->id}}" method="post">
                          <button type="button" class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#modal-Tinjau{{$kegiatan->id}}">
                            Tinjau Ulang
                          </button>
                          <div class="modal fade" id="modal-Tinjau{{$kegiatan->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-Tinjau" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                              <div class="modal-content bg-gradient-default">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="py-3 text-center">
                                    <i class="fas fa-times-circle ni-3x"></i>
                                    <h4 class="heading mt-4">apakah anda ingin mem-pending kegiatan ini?</h4>                                                                  
                                  </div>
                                  <div class="form-group"  {{ $errors->has('reason') ? 'has-error' : '' }}>
                                    <input name="reason" type="text" id="input-kegiatan" class="form-control form-control-alternative" placeholder="Keterangan" required >
                                    <span class="text-danger"> {{ $errors->first('reason') }}</span>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" name="submit" value="Tinjau Ulang" class="btn btn-primary my-1">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="PUT">
                                  <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                              </div>
                            </div>                             
                          </form>
                          <a href="/kegiatan/detail/{{$kegiatan->id}}" class="btn btn-sm btn-primary my-1">Detail</a>
                      </td>
                        @elseif($kegiatan->is_approved == 2)
                      <td>
                          <form action="/kegiatan/approved/{{$kegiatan->id}}" method="post">
                            {{ csrf_field() }}

                            <input name="budget_approve" type="number" id="ba{{$kegiatan->id}}" class="form-control form-control-alternative" required>
                      </td>
                      <td>
                            <input type="submit" name="submit" value="Acc" class="btn btn-primary my-1">
                            <input type="hidden" name="_method" value="PUT">
                          </form>

                          
                          <form action="/kegiatan/tinjau-ulang/{{$kegiatan->id}}" method="post">
                          <button type="button" class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#modal-Tinjau{{$kegiatan->id}}">
                            Tinjau Ulang
                          </button>
                          <div class="modal fade" id="modal-Tinjau{{$kegiatan->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-Tinjau" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                              <div class="modal-content bg-gradient-default">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="py-3 text-center">
                                    <i class="fas fa-times-circle ni-3x"></i>
                                    <h4 class="heading mt-4">apakah anda ingin mem-pending kegiatan ini?</h4>                                                                  
                                  </div>
                                  <div class="form-group"  {{ $errors->has('reason') ? 'has-error' : '' }}>
                                    <input name="reason" type="text" id="input-kegiatan" class="form-control form-control-alternative" placeholder="Keterangan" required >
                                    <span class="text-danger"> {{ $errors->first('reason') }}</span>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" name="submit" value="Tinjau Ulang" class="btn btn-primary my-1">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="PUT">
                                  <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                              </div>
                            </div>                             
                          </form>
                          
                          <a href="/kegiatan/detail/{{$kegiatan->id}}" class="btn btn-sm btn-primary my-1">Detail</a>
                      </td>
                        @elseif($kegiatan->is_approved == 2)
                      <td>
                          <form action="/kegiatan/approved/{{$kegiatan->id}}" method="post">
                            {{ csrf_field() }}

                            <input name="budget_approve" type="number" id="ba{{$kegiatan->id}}" class="form-control form-control-alternative" required>
                      </td>
                      <td>
                            <input type="submit" name="submit" value="Acc" class="btn btn-primary my-1">
                            <input type="hidden" name="_method" value="PUT">
                          </form>

                          
                          <form action="/kegiatan/tinjau-ulang/{{$kegiatan->id}}" method="post">
                          <button type="button" class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#modal-Tinjau{{$kegiatan->id}}">
                            Tinjau Ulang
                          </button>
                          <div class="modal fade" id="modal-Tinjau{{$kegiatan->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-Tinjau" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                              <div class="modal-content bg-gradient-default">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="py-3 text-center">
                                    <i class="fas fa-times-circle ni-3x"></i>
                                    <h4 class="heading mt-4">apakah anda ingin mem-pending kegiatan ini?</h4>                                                                  
                                  </div>
                                  <div class="form-group"  {{ $errors->has('reason') ? 'has-error' : '' }}>
                                    <input name="reason" type="text" id="input-kegiatan" class="form-control form-control-alternative" placeholder="Keterangan" required >
                                    <span class="text-danger"> {{ $errors->first('reason') }}</span>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" name="submit" value="Tinjau Ulang" class="btn btn-primary my-1">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="PUT">
                                  <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                              </div>
                            </div>                             
                          </form>
                          
                          <a href="/kegiatan/detail/{{$kegiatan->id}}" class="btn btn-sm btn-primary my-1">Detail</a>
                      </td>
                      @elseif($kegiatan->is_approved == 3)
                      <td>
                          <form action="/kegiatan/approved/{{$kegiatan->id}}" method="post">
                            {{ csrf_field() }}

                            <input name="budget_approve" type="number" id="ba{{$kegiatan->id}}" class="form-control form-control-alternative" required>
                      </td>
                      <td>
                            <input type="submit" name="submit" value="Acc" class="btn btn-primary my-1">
                            <input type="hidden" name="_method" value="PUT">
                          </form>

                          <form action="/kegiatan/not-approved/{{$kegiatan->id}}" method="post">
                          <button type="button" class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#modal-tolak{{$kegiatan->id}}">
                            Tolak
                          </button>
                          <div class="modal fade" id="modal-tolak{{$kegiatan->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-tolak" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                              <div class="modal-content bg-gradient-default">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="py-3 text-center">
                                    <i class="fas fa-times-circle ni-3x"></i>
                                    <h4 class="heading mt-4">apakah anda ingin menolak kegiatan ini?</h4>                                                                  
                                  </div>
                                  <div class="form-group"  {{ $errors->has('reason') ? 'has-error' : '' }}>
                                    <input name="reason" type="text" id="input-kegiatan" class="form-control form-control-alternative" placeholder="Keterangan" required >
                                    <span class="text-danger"> {{ $errors->first('reason') }}</span>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" name="submit" value="Tolak" class="btn btn-primary my-1">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="PUT">
                                  <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                              </div>
                            </div>                             
                          </form>
                          
                          <a href="/kegiatan/detail/{{$kegiatan->id}}" class="btn btn-sm btn-primary my-1">Detail</a>
                      </td>
                        @else
                      <td>
                          <form action="/kegiatan/approved/{{$kegiatan->id}}" method="post">
                            {{ csrf_field() }}
                            <input name="budget_approve" type="number" id="ba{{$kegiatan->id}}" class="form-control form-control-alternative" required>
                      </td>
                      <td> 
                            <input type="submit" name="submit" value="Acc" class="btn btn-primary my-1">
                            <input type="hidden" name="_method" value="PUT">
                          </form>

                          <form action="/kegiatan/not-approved/{{$kegiatan->id}}" method="post">
                          <button type="button" class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#modal-tolak{{$kegiatan->id}}">
                            Tolak
                          </button>
                          <div class="modal fade" id="modal-tolak{{$kegiatan->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-tolak" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                              <div class="modal-content bg-gradient-default">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="py-3 text-center">
                                    <i class="fas fa-times-circle ni-3x"></i>
                                    <h4 class="heading mt-4">apakah anda ingin menolak kegiatan ini?</h4>                                                                  
                                  </div>
                                  <div class="form-group"  {{ $errors->has('reason') ? 'has-error' : '' }}>
                                    <input name="reason" type="text" id="input-kegiatan" class="form-control form-control-alternative" placeholder="Keterangan" required >
                                    <span class="text-danger"> {{ $errors->first('reason') }}</span>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" name="submit" value="Tolak" class="btn btn-primary my-1">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="PUT">
                                  <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                              </div>
                            </div>                             
                          </form>

                          <form action="/kegiatan/tinjau-ulang/{{$kegiatan->id}}" method="post">
                          <button type="button" class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#modal-Tinjau{{$kegiatan->id}}">
                            Tinjau Ulang
                          </button>
                          <div class="modal fade" id="modal-Tinjau{{$kegiatan->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-Tinjau" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                              <div class="modal-content bg-gradient-default">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="py-3 text-center">
                                    <i class="fas fa-times-circle ni-3x"></i>
                                    <h4 class="heading mt-4">apakah anda ingin mem-pending kegiatan ini?</h4>                                                                  
                                  </div>
                                  <div class="form-group"  {{ $errors->has('reason') ? 'has-error' : '' }}>
                                    <input name="reason" type="text" id="input-kegiatan" class="form-control form-control-alternative" placeholder="Keterangan" required >
                                    <span class="text-danger"> {{ $errors->first('reason') }}</span>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" name="submit" value="Tinjau Ulang" class="btn btn-primary my-1">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="PUT">
                                  <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                              </div>
                            </div>                             
                          </form>
                          <a href="/kegiatan/detail/{{$kegiatan->id}}" class="btn btn-sm btn-primary my-1">Detail</a>
                      </td>
                        @endif
                      </td>
                    </tr>
                    @endif
                  @endif
                  @endforeach
                </tbody>
              </table>
              <div class="mr-4 pb-3">
              <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    {{ $kegiatans->links() }}
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      @endsection