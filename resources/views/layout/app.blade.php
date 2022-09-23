<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

        <!-- IonIcons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css')}}">
        <style>
        #map {
            width: 700px;
            height: 400px;
        }
        </style>

        @yield('style-peta')
        <title>Kecamatan {{$data['nama']}}</title>
    </head>
    <body>
        <div class="wrapper">
            @include('layout.navbar')
          
            @include('layout.sidebar')
          
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <div class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1 class="m-0"><i class="fas fa-map-marker-alt"></i> Kecamatan {{$data['nama']}}</h1>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
              <!-- /.content-header -->
          
              <!-- Main content -->
              <div class="content">
                <div class="container-fluid">
                  @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block my-2">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                  @endif
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block my-2">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                  @endif
                  {{-- <div class="row">
                    <form action="">
                      <div class="form-group">
                        <label for="kelurahan">Kelurahan</label>
                        <select class="custom-select form-control-border border-width-2" id="kelurahan">
                          <option value="" selected>--- Semua Kelurahan ---</option>
                          @foreach ($data_kel as $kel)
                            <option value={{$kel->id}}>{{$kel->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </form>
                  </div>   --}}
                    <div class="row">
                        <div class="col">
                            <div id="map"></div>
                        </div>
                        <div class="col">
                            @include('layout.notes')
                        </div>
                    </div>
                    
                </div>
                <!-- /.container-fluid -->
              </div>
              <!-- /.content -->
            </div>

            <!-- /.content-wrapper -->
          
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
              <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
          
            <!-- Main Footer -->
            <footer class="main-footer">
              <strong>Copyright &copy; 2022 <a href="https://bandungkota.bps.go.id/">Badan Pusat Statistik Kota Bandung</a>.</strong>
            </footer>
          </div>
        
        @yield('script-peta')
        <script type="text/javascript">
          var gambar = {!! json_encode($gambar) !!};
          gambar.forEach(el => {
            popupContent = document.createElement("img");
            popupContent.src = `/images/${el.nama}`;
            popupContent.style.height = '100px';
            popupContent.style.width = '50px';
            L.marker([parseFloat(el.lat), parseFloat(el.long)])
            .addTo(map)
            .bindPopup(popupContent, {
              maxWidth: "auto"
            })
          });

          L.Control.geocoder().addTo(map);
        </script>
        <!-- jQuery -->
        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE -->
        <script src="{{ asset('adminlte/dist/js/adminlte.js')}}"></script>

        <script src="{{ asset('adminlte/dist/js/pages/dashboard3.js')}}"></script>
    </body>
</html>
