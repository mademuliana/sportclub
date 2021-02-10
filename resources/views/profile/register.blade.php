<!--

=========================================================
* Argon Dashboard - v1.1.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Favicon -->
  <link href="/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="/css/argon-dashboard.css?v=1.1.1" rel="stylesheet" />
  <link href="/css/style.css" rel="stylesheet" />
</head>

<body class="bg-gradient-primary">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->

        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                Create your own account
              </div>
              <form action="/register" method="POST">
                @csrf
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" name="name" placeholder="full name" value="{{ old('name') }}" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" name="username" placeholder="username" value="{{ old('username') }}" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Email"value="{{ old('email') }}" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-users"></i></span>
                    </div>
                    <select class="form-control" name="role">
                      <option value="" disabled selected>Choose your role</option>
                      <option value="1">super admin</option>
                      <option value="2">admin pic</option>
                      <option value="3">user</option>
                    </select>
                  </div>
                </div>
                <div class="form-group" id="sportclub">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-baseball-ball"></i></span>
                    </div>
                    
                    <select class="form-control" name="sport"  >
                      <option value="" disabled selected>Choose your sport</option>
                      @foreach($sportclubs as $sportclub)
                      <option value="<?php echo"$sportclub->id"; ?>"><?php echo"$sportclub->name"; ?></option>
                      @endforeach
                    </select>

                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="password"value="{{ old('password') }}" type="password">
                  </div>
                </div>
                
                <div class="row my-4">
                  <!-- <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                      </label>
                    </div>
                  </div> -->
                </div>
                @if ($errors->any())
                    <div class="bg-danger text-white py-2 px-4">
                        @foreach ($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Create account</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
 
  </div>
  <!--   Core   -->
  <script src="/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="/js/argon-dashboard.min.js?v=1.1.1"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
      
      $('select[name=role]').change(function(e){
        if ($('select[name=role]').val() == '2'){
          $('#sportclub').show();
        }else{
          $('#sportclub').hide();
        }
      });
  </script>
</body>

</html>