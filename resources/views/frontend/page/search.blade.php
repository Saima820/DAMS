@extends('frontend.master')


@section('content')



<section class="section section-doctor">
				<div class="container-fluid">
				   <div class="row">

   <p>
        {{$allDoctor->count()}} results found for "{{ request()->search_key}}"
   </p>

                        @foreach ($allDoctor as $doctor)
                        <div class="col-lg-4">
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" style="height: 300px;" alt="User Image" src="{{url('/uploads/doctors/'.$doctor->image)}}">
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


										<div class="row row-sm">
											<div class="col-6">
												<a href="{{route('view.docprofile',$doctor->id)}}" class="btn view-btn">View Profile</a>
											</div>

										</div>
									</div>
								</div>
                                </div>
                                @endforeach




				   </div>
				</div>
			</section>


@endsection
