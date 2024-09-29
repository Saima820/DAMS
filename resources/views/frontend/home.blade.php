@extends('frontend.master')

@section('content')


<!-- Main Wrapper -->
<div class="main-wrapper">

<!-- Home Banner -->
<section class="section section-search" style="background:url('https://kindgeek.com/blog/wp-content/uploads/2019/12/OBUZORLdEFO3HofPcHMa.jpeg') ;">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center">
							<h1>Search Doctor, Make an Appointment</h1>
							<p>Discover the best doctors the city nearest to you.</p>
						</div>

						<!-- Search -->
						<div class="search-box">
							<form action="{{route('search')}}">

								<div class="form-group search-info">
									<input name="search_key" value="{{request()->search_key}}" type="text" class="form-control" placeholder="{{__('Search Doctors Here')}}">
									<span class="form-text">Ex : Dr xyz etc</span>
								</div>
								<button type="submit" class="btn btn-primary search-btn active"><i class="fas fa-search"></i> <span>Search</span></button>
							</form>
						</div>
						<!-- /Search -->

					</div>
				</div>
			</section>
			<!-- /Home Banner -->

			<!-- Clinic and Specialities -->
			<section class="section section-specialities">
				<div class="container-fluid">
					<div class="section-header text-center">
						<h2>Departments</h2>
						<p class="sub-title">Here is all Departments.</p>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-9">
							<!-- Slider -->
							<div class="specialities-slider slider">
                               @foreach($allDepartment as $department)
								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="assets/img/specialities/specialities-01.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<a href="{{route('specific.department',$department->id)}}">{{$department->name}}</a>
								</div>
                                @endforeach
								<!-- /Slider Item -->

								<!-- Slider Item -->

								<!-- /Slider Item -->

								<!-- Slider Item -->

								<!-- /Slider Item -->

								<!-- Slider Item -->

								<!-- /Slider Item -->

								<!-- Slider Item -->

								<!-- /Slider Item -->

							</div>
							<!-- /Slider -->

						</div>
					</div>
				</div>
			</section>
			<!-- Clinic and Specialities -->

			<!-- Popular Section -->
			<section class="section section-doctor">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-lg-4">
							<div class="section-header ">
								<h2>Book Our Doctor</h2>
								<!-- <p>Lorem Ipsum is simply dummy text </p> -->
							</div>
							<div class="about-content">
								<p>Effortlessly schedule appointments with our qualified doctors at your convenience. Choose your preferred time and receive expert medical care without the hassle.</p>

								<!-- <a href="javascript:;">Read More..</a> -->
							</div>
						</div>
						<div class="col-lg-8">
							<div class="doctor-slider slider">

								<!-- Doctor Widget -->
                             @foreach($allDoctor as $doctor)

								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" style="height: 300px;" src="{{url('/uploads/doctors/'.$doctor->image)}}">
										</a>
										<!-- <a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a> -->
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">{{$doctor->name}}</a>
											<!-- <i class="fas fa-check-circle verified"></i> -->
										</h3>
										<p class="speciality">Specialist:{{$doctor->department->name}}</p>
                                        <p class="speciality">Phone Number:{{$doctor->phonenumber}}</p>
                                        <p class="speciality">Email:{{$doctor->email}}</p>
                                        <p class="speciality">Status:{{$doctor->status}}</p>
                                        <p class="speciality">Visiting Charge:{{$doctor->visiting_charge}}</p>

										<ul class="available-info">



										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{route('view.docprofile',$doctor->id)}}" class="btn view-btn">View Profile</a>
											</div>
											<!-- <div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div> -->
										</div>
									</div>
								</div>
                                @endforeach

								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->

								<!-- /Doctor Widget -->

								 <!-- Doctor Widget -->

								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->

								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->

								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->

								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->

								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->

								<!-- Doctor Widget -->

							</div>
						</div>
				   </div>
				</div>
			</section>
			<!-- /Popular Section -->

		   <!-- Availabe Features -->
		   <section class="section section-features">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-md-5 features-img">
							<img src="assets/img/features/feature.png" class="img-fluid" alt="Feature">
						</div>
						<div class="col-md-7">
							<div class="section-header">
								<h2 class="mt-2">Availabe Features in Our Clinic</h2>
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
							</div>
							<div class="features-slider slider">
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-01.jpg" class="img-fluid" alt="Feature">
									<p>Patient Ward</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-02.jpg" class="img-fluid" alt="Feature">
									<p>Test Room</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-03.jpg" class="img-fluid" alt="Feature">
									<p>ICU</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-04.jpg" class="img-fluid" alt="Feature">
									<p>Laboratory</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-05.jpg" class="img-fluid" alt="Feature">
									<p>Operation</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-06.jpg" class="img-fluid" alt="Feature">
									<p>Medical</p>
								</div>
								<!-- /Slider Item -->
							</div>
						</div>
				   </div>
				</div>
			</section>
			<!-- Availabe Features -->


	   </div>
	   <!-- /Main Wrapper -->

@endsection
