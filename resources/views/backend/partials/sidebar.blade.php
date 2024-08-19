<div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">



        <ul class="nav flex-column">

<!-- common -->

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Dashboard
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('patient.list')}}">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Patient List
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('appointment.list')}}">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                Appointment List
              </a>
            </li>



            <!-- admin access -->

            @if(auth()->user()->role=='admin')
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('doctor.list')}}">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Doctor List
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('payment.gateway')}}">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                Payment
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('department.list')}}">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                Department
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('prescription.list')}}">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                Disease
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('appointment.report')}}">
                <svg class="bi"><use xlink:href="#puzzle"/></svg>
                Report
              </a>
            </li>
@endif





<!-- doctor access -->

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('prescription.list')}}">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                Prescription
              </a>
            </li>





          </ul>



          <hr class="my-3">

          <ul class="nav flex-column mb-auto">

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('logout')}}">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Sign out
              </a>
            </li>
          </ul>
        </div>
