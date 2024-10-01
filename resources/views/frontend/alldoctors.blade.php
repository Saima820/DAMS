@extends('frontend.master')


@section('content')

<h1 style="text-align: center;"> Book Your Doctor Appointments </h1>

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
										<!-- <div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">(17)</span>
										</div> -->

										<div class="row row-sm">
											<div class="col-6">
												<a href="{{route('view.docprofile',$doctor->id)}}" class="btn view-btn">View Profile</a>
											</div>
											<!-- <div class="col-6">
												<a href="#" data-toggle="modal" data-target="#booking" class="btn book-btn" >Book Now</a>
											</div> -->
										</div>
									</div>
								</div>
                                </div>
                                @endif
                                @endforeach




				   </div>
				</div>
			</section>

            <!-- Modal
<div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Appointment for Dr.{{$doctor->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                            <form action="{{route('book.appointment',$doctor->id)}}" method="post">

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

                        <div class="form-check">
                        <input class="form-check-input" type="radio" value="cash" name="payment_method" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                        Cash
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" value="online payment" name="payment_method" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                        Online Payment
                        </label>
                        </div>



                            <div class="clinic-booking">
                            <button class="btn btn-success" style="color:black" type="submit"> Book Now</button>
                            </div>


                        </form>
      </div>

    </div>
  </div>
</div> -->


@endsection
