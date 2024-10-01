<!-- Header -->
<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="index-2.html" class="navbar-brand logo">
							<img src="{{url('/logo.png')}}" style="width: 100px;" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index-2.html" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="active">
								<a href="{{route('home')}}">Home</a>
							</li>




                            <li>
								<a href="{{route('frontend.alldoctors')}}">{{__('All Doctors')}}</a>
							</li>


         <li style="margin-top: 18px;">
              <select onchange="location = this.options[this.selectedIndex].value;" name="" id="" class="form-control">
              <option  @if(session()->get('locale')=='en') selected @endif value="{{route('change.lang','en')}}">English
              </option>
                <option  @if(session()->get('locale')=='bn') selected @endif value="{{route('change.lang','bn')}}">Bangla
                </option>


              </select>
            </li>






























							<li>
								<a href="{{route('dashboard')}}">Admin</a>
							</li>
							<li class="login-link">
								<a href="login.html">Login / Signup</a>
							</li>
						</ul>
					</div>
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header">01736467363</p>
							</div>

						</li>
                     @guest('patientG')
						<li>


							<a href="" data-toggle="modal" data-target="#loginModal"> Login </a>

                        </li>

                        <li>
                        <a href="" data-toggle="modal" data-target="#exampleModal"> Register </a>

                        </li>

                        @endguest

                        @auth('patientG')
                        <li>
              <!-- Button trigger modal -->
               <div  class="row">
               <a href="{{route('view.profile')}}" class="" >
                <img style="width: 50px; border-radius:50px;" src="{{url('/uploads/patients/'.auth('patientG')->user()->image)}}" alt="">  {{ auth('patientG')->user()->patient_name }}
              </a>
               </div>

            </li>

            <li>
              <!-- Button trigger modal -->
             <a href="{{route('patient.logout')}}">Logout</a>
            </li>
            @endauth




					</ul>
				</nav>
			</header>
			<!-- /Header -->

<!-- Button trigger modal -->


<!-- Registration Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Patient Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('patient.registration')}}" method="post" enctype="multipart/form-data">
        @csrf

      <div class="modal-body">

      <div>
            <label for="">Enter your name:</label>
            <input value="{{old('patient_name')}}" required type="text" name="patient_name" placeholder="Enter your name" class="form-control">
          </div>

          <div>
            <label for="">Enter your email:</label>
            <input value="{{old('email')}}" required type="email" name="email" placeholder="Enter your email" class="form-control">
          </div>

          <div>
            <label for="">Enter your password:</label>
            <input required type="password" name="password" placeholder="Enter your password" class="form-control">
          </div>


          <div>
            <label for="">Retype your password:</label>
            <input required type="password" name="password_confirmation" placeholder="Retype your password" class="form-control">
          </div>

          <div>
            <label for="">Enter your Mobile Number:</label>
            <input value="{{old('mobile_number')}}" required type="number" name="mobile_number" placeholder="Enter your Mobile number" class="form-control">
          </div>

          <div>
            <label for="">Gender</label>
           <select class="form-control" name="gender" id="">
            <option value="Female"> Female </option>
            <option value="Male"> Male </option>
           </select>
          </div>

          <div>
            <label for="">Upload Your Image:</label>
            <input required type="file" name="patient_image" placeholder="Upload Your Image" class="form-control">
          </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary active" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary active">Register Now</button>
      </div>
</form>
    </div>
  </div>
</div>


<!-- Login Modal -->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Patient Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('patient.login')}}" method="post">
        @csrf

    <div class="modal-body">

  <div>
  <label for="">Enter your email:</label>
  <input required type="email" name="email" placeholder="Enter your email" class="form-control">
  </div>

    <div>
  <label for="">Enter your password:</label>
  <input required type="password" name="password" placeholder="Enter your password" class="form-control">
  </div>

  </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary active" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary active">Login Now</button>
        </div>

</form>

</div>
  </div>
   </div>






