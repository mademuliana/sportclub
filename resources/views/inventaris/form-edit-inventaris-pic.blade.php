
@extends('master')

@section('content')
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(./img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-primary opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Form Edit Inventaris</h1>
            <p class="text-white mt-0 mb-5">edit data yang sesuai</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Inventaris</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="/inventaris/pic/{{$inventariss->id}}">
                <h6 class="heading-small text-muted mb-4">informasi umum</h6>
                <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label name="information" id="keterangan" class="form-control-label" for="input-address">Sport Club</label>
                            <select id="cars" name="id_club" class="form-control form-control-alternative">
                            @foreach($sportclubs as $sportclub)
                              @if($sportclub->id == $inventariss->id_club)
                              <option value="{{$sportclub->id}}" selected>{{$sportclub->name}}</option>
                              @else
                              <option value="{{$sportclub->id}}">{{$sportclub->name}}</option>
                              @endif
                            @endforeach 
                            </select>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-username">Nama Barang</label>
                        <input name="name" type="text" id="input-kegiatan" class="form-control form-control-alternative" placeholder="judul" value="{{$inventariss->name}}">
                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group" {{ $errors->has('time_purchased') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-email">Waktu Pembelian</label>
                        <input name="time_purchased" type="date" id="input-waktu" class="form-control form-control-alternative" placeholder="" value="{{$inventariss->time_purchased}}">
                        <span class="text-danger"> {{ $errors->first('time_purchased') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group" {{ $errors->has('condition') ? 'has-error' : '' }}>
                        @if($inventariss->condition == 1)
                        <label class="form-control-label" for="input-last-name">Kondisi</label>
                        <div class="custom-control custom-radio">
                          <input name="condition" class="custom-control-input" id="layak" type="radio" value="1" checked>
                          <label class="custom-control-label pr-5" for="layak">Layak Pakai</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input name="condition" class="custom-control-input" id="tidak" type="radio" value="2">
                          <label class="custom-control-label" for="tidak">Tidak Layak Pakai</label>
                        </div> 
                         <div class="custom-control custom-radio">
                          <input name="condition" class="custom-control-input" id="hilang" type="radio" value="3">
                          <label class="custom-control-label" for="hilang">Hilang</label>
                        </div>   
                        @elseif($inventariss->condition == 2)
                        <label class="form-control-label" for="input-last-name">Kondisi</label>
                        <div class="custom-control custom-radio">
                          <input name="condition" class="custom-control-input" id="layak" type="radio" value="1">
                          <label class="custom-control-label pr-5" for="layak">Layak Pakai</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input name="condition" class="custom-control-input" id="tidak" type="radio" value="2" checked>
                          <label class="custom-control-label" for="tidak">Tidak Layak Pakai</label>
                        </div> 
                         <div class="custom-control custom-radio">
                          <input name="condition" class="custom-control-input" id="hilang" type="radio" value="3">
                          <label class="custom-control-label" for="hilang">Hilang</label>
                        </div>   
                        @elseif($inventariss->condition == 3)
                        <label class="form-control-label" for="input-last-name">Kondisi</label>
                        <div class="custom-control custom-radio">
                          <input name="condition" class="custom-control-input" id="layak" type="radio" value="1">
                          <label class="custom-control-label pr-5" for="layak">Layak Pakai</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input name="condition" class="custom-control-input" id="tidak" type="radio" value="2" >
                          <label class="custom-control-label" for="tidak">Tidak Layak Pakai</label>
                        </div> 
                         <div class="custom-control custom-radio">
                          <input name="condition" class="custom-control-input" id="hilang" type="radio" value="3" checked>
                          <label class="custom-control-label" for="hilang">Hilang</label>
                        </div>   
                        @endif   
                        <span class="text-danger"> {{ $errors->first('condition') }}</span>      
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">informasi Tambahan</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group" {{ $errors->has('price') ? 'has-error' : '' }}>
                        <label class="form-control-label" for="input-city">Harga</label>
                        <input name="price" type="number" id="input-city" class="form-control form-control-alternative" placeholder="Rp." value="{{ $inventariss->price }}">
                        <span class="text-danger"> {{ $errors->first('price') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group" {{ $errors->has('information') ? 'has-error' : '' }}>
                          <label class="form-control-label" for="input-address">Keterangan</label>
                          <textarea name="information" id="keterangan" class="form-control form-control-alternative" placeholder="Keterangan"  type="text">{{ $inventariss->information }}</textarea>
                          <span class="text-danger"> {{ $errors->first('information') }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <div class=" text-right">
                  <input type="submit" name="submit" value="edit" class="btn btn-primary my-1">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script>
      window.onload = myFunction;
      function myFunction() {
        document.getElementById("input-waktu").value = "{{ $inventariss->time_purchased->format('Y-m-d') }}";
      }
      </script>
      @endsection