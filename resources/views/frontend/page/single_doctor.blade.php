@extends('frontend.master')


@section('content')


<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
										<img src="{{url('/uploads/doctors/'.$singleDoctor->image)}}" class="img-fluid" alt="User Image">
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name">{{$singleDoctor->name}}</h4>
										<p class="doc-speciality">Specialist:{{$singleDoctor->department->name}}</p>
                                        <p class="doc-contact">Phone Number:{{$singleDoctor->phonenumber}}</p>
                                        <p class="doc-email">Email:{{$singleDoctor->email}}</p>
                                        <p class="doc-status">Status:{{$singleDoctor->status}}</p>
                                        <p class="doc-status">Visiting Charge:{{$singleDoctor->visiting_charge}}</p>


										<div class="clinic-details">
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA - <a href="javascript:void(0);">Get Directions</a></p>

										</div>
										<div class="clinic-services">
											<span>Dental Fillings</span>
											<span>Teeth Whitneing</span>
										</div>
									</div>
								</div>
								<div class="doc-info-right">

                                <form action="{{route('book.appointment',$singleDoctor->id)}}" method="post">

                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label">Select Date</label>
                                    <input name="appointment_date" required type="date" class="form-control" aria-describedby="nameHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label">Select Slot</label>
                                   <select name="time_slot_id" id="" class="form-control">
                                    <option value="1">10-11</option>
                                    <option value="2">11-12</option>
                                    <option value="3">12-1:00</option>
                                   </select>
                                </div>


                                <div class="mb-3">
                                    <label for="exampleInputVisitingcharge1" class="form-label">Visiting Charge</label>
                                    <input name="visiting_charge" required value="{{$singleDoctor->visiting_charge}}" readonly type="text" class="form-control" aria-describedby="nameHelp">
                                </div>

									<div class="clinic-booking">
                                    <button class="btn btn-success" style="color:black" type="submit"> Book Now</button>
									</div>


                                </form>
								</div>
							</div>
						</div>
							</div>

@endsection
