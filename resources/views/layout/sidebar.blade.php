<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
          
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div>
          <a href="/" class="d-block"><i class="fas fa-map"></i> Peta Kecamatan Kota Bandung</a>
        </div>
      </div>

      @auth
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Kecamatan</li>
            @foreach ($data_kec as $k)
              @isset($data)
                @if ($data->slug == $k->slug)
                  <li class="nav-item"><a class="nav-link active" href="/peta/{{$k->slug}}"><i class="fas fa-map-marker-alt"></i> {{$k->nama}}</a></li>
                @else
                  <li class="nav-item"><a class="nav-link" href="/peta/{{$k->slug}}"><i class="fas fa-map-marker-alt"></i> {{$k->nama}}</a></li>
                @endif
              @else
                <li class="nav-item"><a class="nav-link" href="/peta/{{$k->slug}}"><i class="fas fa-map-marker-alt"></i> {{$k->nama}}</a></li>
              @endisset
            @endforeach
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      @endauth
    </div>
    <!-- /.sidebar -->
  </aside>