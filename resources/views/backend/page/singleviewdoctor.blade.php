@extends('backend.master')


@section('content')


<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
										<img src="{{url('/uploads/doctors/'.$viewDoctor->image)}}" class="img-fluid" alt="User Image">
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name">{{$viewDoctor->name}}</h4>
										<p class="doc-speciality">Specialist:{{$viewDoctor->department->name}}</p>
                                        <p class="doc-speciality">Phone Number:{{$viewDoctor->phonenumber}}</p>
                                        <p class="doc-speciality">Email:{{$viewDoctor->email}}</p>
                                        <p class="doc-speciality">Status:{{$viewDoctor->status}}</p>
                                        <p class="doc-speciality">Visiting Charge:{{$viewDoctor->visiting_charge}}</p>

									


									</div>
								</div>

							</div>
						</div>

                </div>

@endsection
