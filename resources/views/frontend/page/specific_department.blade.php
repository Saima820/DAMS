@extends('frontend.master')


@section('content')

<h1 style="text-align: center;"> Book Your Doctor Appointments </h1>

<section class="section section-doctor">
				<div class="container-fluid">
				   <div class="row">


                        @foreach ($relatedDoctor as $doctor)
                        <div class="col-lg-4">
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="{{url('/uploads/doctors/'.$doctor->image)}}">
										</a>
										<!-- <a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a> -->
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">{{$doctor->name}}</a>


										</h3>
										<p class="speciality">Specialist:{{$doctor->department->name}}</p>
                                        <p class="speciality">Phone Number:{{$doctor->phonenumber}}</p>
                                        <p class="speciality">Email:{{$doctor->email}}</p>
                                        <p class="speciality">Status:{{$doctor->status}}</p>
                                        <p class="speciality">Visiting Charge:{{$doctor->visiting_charge}}</p>

										<!-- <div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">(17)</span>
										</div> -->
										<!-- <ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> {{$doctor->phonenumber}}
											</li>
											<li>
												<i class="far fa-clock"></i> {{$doctor->specialist}}
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> {{$doctor->email}}
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>


										</ul> -->
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
                                </div>
                                @endforeach




				   </div>
				</div>
			</section>


@endsection































