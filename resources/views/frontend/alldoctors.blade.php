@extends('frontend.master')


@section('content')

<h2> Book Your Doctor Appointments </h2>

<section class="section section-doctor">
				<div class="container-fluid">
				   <div class="row">



                        @foreach ($allDoctor as $doctor)
                        @if($doctor->role=='doctor')
                        <div class="col-lg-4">
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="{{url('/uploads/doctors/'.$doctor->image)}}">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">{{$doctor->name}}</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MDS - Periodontology and Oral Implantology, BDS</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">(17)</span>
										</div>
										<ul class="available-info">
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


										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{route('view.docprofile',$doctor->id)}}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
                                </div>
                                @endif
                                @endforeach




				   </div>
				</div>
			</section>


@endsection
