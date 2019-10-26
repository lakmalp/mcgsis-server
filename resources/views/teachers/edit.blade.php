@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10">
            <div class="card">
                <div class="card-header">
                  <span class="card-header-custom">
                    <i class="fas fa-chalkboard-teacher mr-2"></i>
                    Edit Teacher
                  </span>
                </div>
                <div class="card-text px-2 py-2">
                  <form method="POST" action="{{route('teachers.update', [$teacher->id])}}">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                          <div class="form-group">
                            <label for="teacher_id">Teacher ID</label>
                            <input 
                              autofocus
                              type="text" 
                              class="form-control" 
                              name="teacher_id" 
                              aria-describedby="teacher_idHelp" 
                              class="@error('teacher_id') is-invalid @enderror"
                              value="{{$teacher->teacher_id}}">
                          </div>
                          @error('teacher_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                          <div class="form-group">
                            <label for="first_names">First Names</label>
                            <input 
                              type="text" 
                              class="form-control" 
                              name="first_names" 
                              aria-describedby="first_namesHelp" 
                              class="@error('first_names') is-invalid @enderror"
                              value="{{$teacher->first_names}}">
                          </div>
                          @error('first_names')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                          <div class="form-group">
                            <label for="surname">Surname</label>
                            <input 
                              type="text" 
                              class="form-control" 
                              name="surname" 
                              aria-describedby="surnameHelp" 
                              class="@error('surname') is-invalid @enderror"
                              value="{{$teacher->surname}}">
                          </div>
                          @error('surname')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-12 col-md-6 col-lg-7">
                          <div class="form-group">
                            <label for="address">Address</label>
                            <input 
                              type="text" 
                              class="form-control" 
                              name="address" 
                              aria-describedby="addressHelp" 
                              class="@error('address') is-invalid @enderror"
                              value="{{$teacher->address}}">
                          </div>
                          @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                          <div class="form-group">
                            <label for="contact_no">Contact No</label>
                            <input 
                              type="text" 
                              class="form-control" 
                              name="contact_no" 
                              aria-describedby="contact_noHelp" 
                              class="@error('contact_no') is-invalid @enderror"
                              value="{{$teacher->contact_no}}">
                          </div>
                          @error('contact_no')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-2">
                          <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" aria-describedby="genderHelp" class="@error('gender') is-invalid @enderror">
                              @foreach($genders as $gender)
                                <option value="{{$gender}}" {{$teacher->gender==$gender?'selected':''}}>{{$gender}}</option>
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
                              class="@error('class') is-invalid @enderror"
                              value="{{$teacher->class}}">
                          </div>
                          @error('class')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                          <div class="form-group">
                            <label for="qualification">Qualification</label>
                            <input 
                              type="text" 
                              class="form-control" 
                              name="qualification" 
                              aria-describedby="qualificationHelp" 
                              class="@error('qualification') is-invalid @enderror"
                              value="{{$teacher->qualification}}">
                          </div>
                          @error('qualification')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                          <div class="form-group">
                            <label for="date_of_appointment">Date of Appointment</label>
                            <input 
                              type="date" 
                              class="form-control" 
                              name="date_of_appointment" 
                              aria-describedby="date_of_appointmenteHelp" 
                              class="@error('date_of_appointment') is-invalid @enderror"
                              value="{{$teacher->date_of_appointment}}">
                          </div>
                          @error('date_of_appointment')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-2">
                          <div class="form-group">
                            <label for="service">Service</label>
                            <input 
                              type="text" 
                              class="form-control" 
                              name="service" 
                              aria-describedby="serviceHelp" 
                              class="@error('service') is-invalid @enderror"
                              value="{{$teacher->service}}">
                          </div>
                          @error('service')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-12 col-md-6 col-lg-7">
                          <div class="form-group">
                            <label for="prev_school_id">Previous School</label>
                            <select name="prev_school_id" class="form-control" aria-describedby="prev_school_idHelp" class="@error('prev_school_id') is-invalid @enderror">
                              @foreach($schools as $school)
                                <option value="{{$school->id}}" {{$teacher->prev_school_id==$school->id?'selected':''}}>{{$school->description}}</option>
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
                              class="@error('teacher_in_charge') is-invalid @enderror"
                              value="{{$teacher->teacher_in_charge}}">
                          </div>
                          @error('teacher_in_charge')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
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
