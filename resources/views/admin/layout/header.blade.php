<div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="#">
                <img src="{{asset('public/logo.png')}}" class="header-brand-img" alt="tabler logo">
              </a>
              <div class="d-flex order-lg-2 ml-auto">


                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url({{asset('public/logo.png')}})"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{Auth::guard('admin')->user()->name}}</span>

                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <!-- <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-settings"></i> Settings
                    </a>
                    <a class="dropdown-item" href="#">
                      <span class="float-right"><span class="badge badge-primary">6</span></span>
                      <i class="dropdown-icon fe fe-mail"></i> Inbox
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-send"></i> Message
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-help-circle"></i> Need help?
                    </a> -->
                    <a class="dropdown-item"  href="{{ url('/admin/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>
                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">

              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="{{route('admin.home')}}" class="nav-link active"><i class="fe fe-home"></i> Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> City / Region </a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="{{route('admin.city.index')}}" class="dropdown-item ">Add / Manage</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Clinic</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="{{route('admin.clinic.create')}}" class="dropdown-item ">Add</a>
                      <a href="{{ route('admin.clinic.index')}}" class="dropdown-item ">Manage</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> Department</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="{{route('admin.department.index')}}" class="dropdown-item ">Add / Manage</a>
                      <a href="{{route('admin.department.order')}}" class="dropdown-item ">Manage Ordering</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> Doctor</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="{{route('admin.doctor.create')}}" class="dropdown-item ">Add</a>
                      <a href="{{route('admin.doctor.index')}}" class="dropdown-item ">List</a>
                      <a href="{{route('admin.doctor.order')}}" class="dropdown-item ">Manage Ordering</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-image"></i> Franchise</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="{{route('admin.franchise.create')}}" class="dropdown-item ">Add</a>
                      <a href="{{route('admin.franchise.index')}}" class="dropdown-item ">List</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link"  data-toggle="dropdown"><i class="fe fe-file-text"></i> Reports</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                        <a href="{{route('admin.report.index')}}" class="dropdown-item ">By Date</a>
                        <a href="{{route('admin.report.doctors')}}" class="dropdown-item ">By Doctor</a>
                    </div>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('admin.report.attempted_booking')}}" class="nav-link" ><i class="fe fe-file-text"></i> Attempted Bookings</a>
                </li>

                  <li class="nav-item">
                        <a href="{{url('/')}}" class="btn btn-success">Book an appointment</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
