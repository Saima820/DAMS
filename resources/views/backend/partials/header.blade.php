<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">
  <img src="{{url('/logo.png')}}" style="width: 100px;" class="img-fluid" alt="Logo">
  </a>

  <ul class="navbar-nav flex-row ">
    <li class="nav-item text-nowrap">
     <p  style="color:white; padding-right:30px;">

     {{auth()->user()->name}} <span class="badge badge-primary" style="background-color: blue;">{{ auth()->user()->role}}</span>
     </p>
    </li>
    <li class="nav-item text-nowrap">


    </li>
  </ul>

  <div id="navbarSearch" class="navbar-search w-100 collapse">

  </div>
</header>
