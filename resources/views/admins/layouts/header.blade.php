  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <img src="{{ asset('lte/dist/img/bit-bg-w.png') }}" class="user-image" alt="User Image">
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs">{{session()->get('dataLoginAdmins')['nama']}}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->

          <li class="user-header">
            <img src="{{ asset('lte/dist/img/bit-bg-w.png') }}" class="img-circle" alt="User Image">

            <p>
              {{session()->get('dataLoginAdmins')['username']}}
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="text-center">
              <a href="/logout" class="btn btn-default btn-flat">Logout</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>

  </nav>