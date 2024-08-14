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
										<p class="doc-speciality">{{$singleDoctor->specialist}}</p>
                                        <p class="doc-contact">{{$singleDoctor->phonenumber}}</p>
                                        <p class="doc-email">{{$singleDoctor->email}}</p>
                                        <p class="doc-status">{{$singleDoctor->status}}</p>
										<p class="doc-department"><img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">Dentist</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(35)</span>
										</div>
										<div class="clinic-details">
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA - <a href="javascript:void(0);">Get Directions</a></p>
											<ul class="clinic-gallery">
												<li>
													<a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
														<img src="assets/img/features/feature-01.jpg" alt="Feature">
													</a>
												</li>
												<li>
													<a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
														<img src="assets/img/features/feature-02.jpg" alt="Feature Image">
													</a>
												</li>
												<li>
													<a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
														<img src="assets/img/features/feature-03.jpg" alt="Feature">
													</a>
												</li>
												<li>
													<a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
														<img src="assets/img/features/feature-04.jpg" alt="Feature">
													</a>
												</li>
											</ul>
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



									<div class="clinic-booking">
                                    <button class="btn btn-success" style="color:black" type="submit"> Book Now</button>
									</div>


                                </form>
								</div>
							</div>
						</div>






							</div>

@endsection
