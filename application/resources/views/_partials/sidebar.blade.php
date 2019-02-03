<!-- Sidebar -->
<ul class="sidebar navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Home</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('/course-registration') }}">
      <i class="fas fa-fw fa-calendar"></i>
      <span>Course registration</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('/calendar') }}">
      <i class="fas fa-fw fa-calendar"></i>
      <span>Calendar</span></a>
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Data </span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Data Definitions:</h6>
      <a class="dropdown-item" href="{{ url('/halls') }}">Halls</a>
      <a class="dropdown-item" href="{{ url('/specialties') }}">Specialties</a>
      <a class="dropdown-item" href="{{ url('affiliations') }}">Affiliations</a>
      <a class="dropdown-item" href="{{ url('university_affiliations') }}">University Affiliations</a>
      <a class="dropdown-item" href="{{ url('professional_data') }}">Professional Data</a>
      <div class="dropdown-divider"></div>

      <h6 class="dropdown-header">Courses:</h6>
      <a class="dropdown-item" href="{{ url('/courses') }}">Courses</a>
{{--      <a class="dropdown-item" href="{{ url('/lectures') }}">Lectures</a>--}}
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
      <a class="dropdown-item" href="{{ url('/users') }}">Users</a>
      <a class="dropdown-item" href="{{ url('/trainers') }}">Trainers</a>
      <a class="dropdown-item" href="{{ url('/trainees') }}">Trainees</a>
      <div class="dropdown-divider"></div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('/evaluation') }}">
      <i class="fas fa-fw fa-check"></i>
      <span>Evaluation</span></a>
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