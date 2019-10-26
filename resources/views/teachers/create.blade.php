@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                  <span class="card-header-custom">
                    <i class="fas fa-chalkboard-teacher mr-2"></i>
                    New Teacher
                  </span>
                </div>
                <div class="card-text px-2 py-2">
                  <form method="POST" action="{{route('teachers.store')}}">
                    @csrf
                    <div class="row">
                      <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="teacher_id">Teacher ID</label>
                          <input 
                            autofocus
                            type="text" 
                            name="teacher_id" 
                            aria-describedby="teacher_idHelp" 
                            class="form-control @error('teacher_id') is-invalid @enderror"
                            value="{{old('teacher_id')}}">
                            <div class="invalid-feedback">
                                @error('teacher_id') {{$message}} @enderror
                            </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="first_names">First Names</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="first_names" 
                            aria-describedby="first_namesHelp" 
                            class="form-control @error('first_names') is-invalid @enderror"
                            value="{{old('first_names')}}">
                            <div class="invalid-feedback">
                                @error('first_names') {{$message}} @enderror
                            </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-5">
                        <div class="form-group">
                          <label for="surname">Surname</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="surname" 
                            aria-describedby="surnameHelp" 
                            class="form-control @error('surname') is-invalid @enderror"
                            value="{{old('surname')}}">
                            <div class="invalid-feedback">
                                @error('surname') {{$message}} @enderror
                            </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-7">
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="address" 
                            aria-describedby="addressHelp" 
                            class="form-control @error('address') is-invalid @enderror"
                            value="{{old('address')}}">
                            <div class="invalid-feedback">
                                @error('address') {{$message}} @enderror
                            </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="contact_no">Contact No</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="contact_no" 
                            aria-describedby="contact_noHelp" 
                            class="form-control @error('contact_no') is-invalid @enderror"
                            value="{{old('contact_no')}}">
                            <div class="invalid-feedback">
                                @error('contact_no') {{$message}} @enderror
                            </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-2">
                        <div class="form-group">
                          <label for="gender">Gender</label>
                          <select name="gender" class="form-control" aria-describedby="genderHelp" class="@error('gender') is-invalid @enderror">
                            @foreach($genders as $gender)
                              <option value="{{$gender}}">{{$gender}}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('gender')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="class">Class</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="class" 
                            aria-describedby="classHelp" 
                            class="form-control @error('class') is-invalid @enderror"
                            value="{{old('class')}}">
                            <div class="invalid-feedback">
                                @error('class') {{$message}} @enderror
                            </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="qualification">Qualification</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="qualification" 
                            aria-describedby="qualificationHelp" 
                            class="form-control @error('qualification') is-invalid @enderror"
                            value="{{old('qualification')}}">
                            <div class="invalid-feedback">
                                @error('qualification') {{$message}} @enderror
                            </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="date_of_appointment">Date of Appointment</label>
                          <input 
                            type="date" 
                            class="form-control" 
                            name="date_of_appointment" 
                            aria-describedby="date_of_appointmenteHelp" 
                            class="form-control @error('date_of_appointment') is-invalid @enderror"
                            value="{{old('date_of_appointment')}}">
                            <div class="invalid-feedback">
                                @error('date_of_appointment') {{$message}} @enderror
                            </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-2">
                        <div class="form-group">
                          <label for="service">Service</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="service" 
                            aria-describedby="serviceHelp"  
                            class="form-control @error('service') is-invalid @enderror"
                            value="{{old('service')}}">
                            <div class="invalid-feedback">
                                @error('service') {{$message}} @enderror
                            </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-7">
                        <div class="form-group">
                          <label for="prev_school_id">Previous School</label>
                          <select name="prev_school_id" class="form-control" aria-describedby="prev_school_idHelp" class="@error('prev_school_id') is-invalid @enderror">
                            @foreach($schools as $school)
                              <option value="{{$school->id}}">{{$school->description}}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('prev_school_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12 col-md-6 col-lg-5">
                        <div class="form-group">
                          <label for="teacher_in_charge">Teacher in Charge</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="teacher_in_charge" 
                            aria-describedby="teacher_in_chargeHelp"  
                            class="form-control @error('teacher_in_charge') is-invalid @enderror"
                            value="{{old('teacher_in_charge')}}">
                            <div class="invalid-feedback">
                                @error('teacher_in_charge') {{$message}} @enderror
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <button type="button" class="btn btn-light btn-sm my-1" onclick="window.location.href='{{route('teachers.index')}}'"><i class="far fa-arrow-alt-circle-left mr-2"></i>Cancel</button>
                        <span class="float-right">
                          <button type="reset" class="btn btn-light btn-sm my-1 mr-3"><i class="fas fa-broom mr-2"></i>Clear</button>
                          <button type="submit" class="btn btn-secondary btn-sm my-1 "><i class="far fa-save mr-2"></i>Save</button>
                        </span>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
.card-header-custom {
    font-size: 13pt;
    font-weight: bold;
    font-family: Arial, sans-serif;
    color: rgba(50,50,50, .9);
}
</style>
