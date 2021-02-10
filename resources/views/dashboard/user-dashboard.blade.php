@extends('user')

@section('content')
    <?php
    $joined_club = 0;
    $available_kegiatan = 0;
    $user_id = $role->id;
  ?>
  @foreach($anggotas as $anggota)
    @if($anggota->id_user == $user_id)
        @if($anggota->id_role == 2)
          <?php
            $joined_club++;
          ?>      
        @endif
    @endif
  @endforeach
  @foreach($approve as $sportclub_in)
  @foreach($kegiatans as $kegiatan)
    <?php
      $today = new DateTime('today');
      $dateFromDb = $kegiatan->date;
      $today_fmt = $today->format('Y-m-d');
    ?>  
    @if($kegiatan->is_approved == 1 && $dateFromDb > $today_fmt  && $kegiatan->deleted_at == null && $kegiatan->id_club == $sportclub_in->id)
      <?php
        $available_kegiatan++;
      ?>  
    @endif  
  @endforeach
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
                      <h5 class="card-title text-uppercase text-muted mb-0">klub yang diikuti</h5>
                      <span class="h2 font-weight-bold mb-0"> {{$joined_club}} </span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">kegiatan tersedia</h5>
                      <span class="h2 font-weight-bold mb-0">{{$available_kegiatan}} Kegiatan</span>
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
                  <!--<a class="btn btn-sm btn-primary" href="/kegiatan/list-kegiatan">See all</a>-->
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-hover">
                <thead class="thead-light">
                </thead>
                <tbody>      

                  @if($kegiatans_count != 0)
                  @foreach($approve as $sportclub_in)
                  @foreach($kegiatans as $kegiatan)
                  @if($kegiatan->id_club == $sportclub_in->id)

                      <tr>
                        
                        {{ csrf_field() }}

                        <th style="overflow:hidden; background-size:cover; background-position:center;">
                        @if(in_array($kegiatan->id,$kegiatans_include))
                        <form method="post" action="/dashboard/user/unjoin-event/{{$kegiatan->id}}">
                        {{ csrf_field() }}                        
                        <div class="card-body bg-gradient-success">
                          <img src="{{URL('/poster/'.$kegiatan->poster)}}" alt="Italian Trulli" data-toggle="modal" data-target="#modal-unjoin{{$kegiatan->id}}" style="height:100%;width:100%;object-fit: fill;" >
                        </div>
                        <div class="modal fade" id="modal-unjoin{{$kegiatan->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-unjoin" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                              <div class="modal-content bg-gradient-danger">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="py-3 text-center">
                                    <i class="fas fa-times-circle ni-3x"></i>
                                    <h4 class="heading mt-4">apakah anda ingin batal mengikuti kegiatan ini?</h4>
                                    <p class="mb-0">Nama Kegiatan: {{$kegiatan->name}}</p>
                                    <p class="mb-0">Tempat: {{$kegiatan->place}}</p>
                                    <p class="mb-0">tanggal: {{\Carbon\Carbon::parse($kegiatan->date)->isoFormat('dddd')}} {{\Carbon\Carbon::parse($kegiatan->date)->format('d/m/Y')}}</p>
                                    <br>
                                    Waktu: {{$kegiatan->start_time}} - {{$kegiatan->finish_time}}</p>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input  type="hidden" name="_method" value="DELETE">
                                  <button type="submit" name="submit" class="btn btn-white" value="DELETE">batal mengikuti</button>
                                  <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        @else
                        
                        <form method="post" action="/dashboard/user/join-event/{{$kegiatan->id}}">
                        {{ csrf_field() }}
                        <div class="card-body bg-gradient-default">
                          <img src="{{URL('/poster/'.$kegiatan->poster)}}" alt="Italian Trulli" data-toggle="modal" data-target="#modal-join{{$kegiatan->id}}" style="height:100%;width:100%;object-fit: fill;" >
                        </div>
                        <div class="modal fade" id="modal-join{{$kegiatan->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-join" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                              <div class="modal-content bg-gradient-default">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="py-3 text-center">
                                    <i class="ni ni-bell-55 ni-3x"></i>
                                    <h4 class="heading mt-4">apakah anda ingin mengikuti kegiatan ini?</h4>
                                    <p class="mb-0">Nama Kegiaatan: {{$kegiatan->name}}</p>
                                    <p class="mb-0">Tempat: {{$kegiatan->place}}</p>
                                    <p class="mb-0">tanggal: {{\Carbon\Carbon::parse($kegiatan->date)->isoFormat('dddd')}} {{\Carbon\Carbon::parse($kegiatan->date)->format('d/m/Y')}}</p>
                                    <br>
                                    Waktu: {{$kegiatan->start_time}} - {{$kegiatan->finish_time}}</p>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" name="submit" class="btn btn-white">ikuti</button>
                                  <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                              </div>
                            </div>
                            </form>
                        @endif
                        </th>
                      </tr>
                    @endif
                  @endforeach
                @endforeach
                @else
                
                <div class="card-body bg-gradient-default" style="height:300px;">
                   <img src="{{URL::asset('/poster/empty.png')}}" alt="Italian Trulli" data-toggle="modal"  style="height:250px;width:100%;object-fit: fill;" >
                </div>
               <??>
                @endif
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
      @endsection