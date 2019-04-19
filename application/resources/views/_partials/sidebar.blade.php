<!-- Sidebar -->
<ul class="sidebar navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Home</span>
    </a>
  </li>
    @can('courseRegistration list')
  <li class="nav-item">
    <a class="nav-link" href="{{ route('course_registration.create') }}">
      <i class="fas fa-fw fa-calendar"></i>
      <span>Course registration</span></a>
  </li>
    @endcan
    @can('course list')
    <li class="nav-item ">
        <a class="nav-link " href="{{ url('/courses') }}" >
            <i class="fas fa-fw fa-calendar"></i>
            <span>Courses</span>
        </a>
    </li>
    @endcan
    @can('calendar list')
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/calendar') }}">
      <i class="fas fa-fw fa-calendar"></i>
      <span>Calendar</span></a>
  </li>
    @endcan

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Data </span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Data Definitions:</h6>
        @can('hall list')
      <a class="dropdown-item" href="{{ url('/halls') }}">Halls</a>
        @endcan
        @can('specialitie list')
      <a class="dropdown-item" href="{{ url('/specialities') }}">Specialties</a>
        @endcan
        @can('affiliation list')
      <a class="dropdown-item" href="{{ url('affiliations') }}">Affiliations</a>
        @endcan
        @can('universityAffiliation list')
      <a class="dropdown-item" href="{{ url('university_affiliations') }}">University Affiliations</a>
        @endcan
        @can('professionalData list')
      <a class="dropdown-item" href="{{ url('professional_data') }}">Professional Data</a>
        @endcan
      <div class="dropdown-divider"></div>
    </div>
  </li>


  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Persona </span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Persona:</h6>
        @can('user list')
        <a class="dropdown-item" href="{{ url('/users') }}">Users</a>
        @endcan
        @can('trainer list')
      <a class="dropdown-item" href="{{ url('/trainers') }}">Trainers</a>
        @endcan
        @can('trainee list')
      <a class="dropdown-item" href="{{ url('/trainees') }}">Trainees</a>
        @endcan
      <div class="dropdown-divider"></div>
    </div>
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Reports </span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Courses:</h6>
      <a class="dropdown-item" href="#">Payments</a>
      <a class="dropdown-item" href="#">Attendance</a>
      <a class="dropdown-item" href="#">Certifications</a>
      <div class="dropdown-divider"></div>

      <h6 class="dropdown-header">Statistics:</h6>
      <a class="dropdown-item" href="#">Report 1</a>
      <a class="dropdown-item" href="#">Report 2</a>
      <div class="dropdown-divider"></div>
    </div>
  </li>
</ul>
