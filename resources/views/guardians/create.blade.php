@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                  <span class="card-header-custom">
                    <i class="fas fa-male mr-2"></i>
                    New Parent / Guardian
                  </span>
                </div>
                <div class="card-text px-2 py-2">
                  <form method="POST" action="{{route('guardians.store')}}">
                    @csrf
                    
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="student_id">Student</label>
                          <select name="student_id" class="form-control" aria-describedby="student_idHelp" class="@error('student_id') is-invalid @enderror">
                            <option value=""></option>
                            @foreach($students as $student)
                              <option value="{{$student->id}}">{{$student->admission_no . " - " . $student->first_names . " " . $student->surname}}</option>
                            @endforeach
                          </select>
                          <div class="invalid-feedback">
                              @error('student_id') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="f_initials">Father's Initials</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="f_initials" 
                            aria-describedby="f_initialsHelp" 
                            class="form-control @error('f_initials') is-invalid @enderror"
                            value="{{old('f_initials')}}">
                          <div class="invalid-feedback">
                              @error('f_initials') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="f_surname">Father's Surname</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="f_surname" 
                            aria-describedby="f_surnameHelp"  
                            class="form-control @error('f_surname') is-invalid @enderror"
                            value="{{old('f_surname')}}">
                          <div class="invalid-feedback">
                              @error('f_surname') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="f_contact_no">Father's Contact No</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="f_contact_no" 
                            aria-describedby="f_contact_noHelp"  
                            class="form-control @error('f_contact_no') is-invalid @enderror"
                            value="{{old('f_contact_no')}}">
                          <div class="invalid-feedback">
                              @error('f_contact_no') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="f_occupation">Father's Occupation</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="f_occupation" 
                            aria-describedby="f_occupationHelp" 
                            class="form-control @error('f_occupation') is-invalid @enderror"
                            value="{{old('f_occupation')}}">
                          <div class="invalid-feedback">
                              @error('f_occupation') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="f_work_place">Father's Workplace</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="f_work_place" 
                            aria-describedby="f_work_placeHelp" 
                            class="form-control @error('f_work_place') is-invalid @enderror"
                            value="{{old('f_work_place')}}">
                          <div class="invalid-feedback">
                              @error('f_work_place') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="m_initials">Mother's Initials</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="m_initials" 
                            aria-describedby="m_initialsHelp" 
                            class="form-control @error('m_initials') is-invalid @enderror"
                            value="{{old('m_initials')}}">
                          <div class="invalid-feedback">
                              @error('m_initials') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="m_surname">Mother's Surname</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="m_surname" 
                            aria-describedby="m_surnameHelp" 
                            class="form-control @error('m_surname') is-invalid @enderror"
                            value="{{old('m_surname')}}">
                          <div class="invalid-feedback">
                              @error('m_surname') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="m_contact_no">Mother's Contact No</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="m_contact_no" 
                            aria-describedby="m_contact_noHelp" 
                            class="form-control @error('m_contact_no') is-invalid @enderror"
                            value="{{old('m_contact_no')}}">
                          <div class="invalid-feedback">
                              @error('m_contact_no') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="m_occupation">Mother's Occupation</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="m_occupation" 
                            aria-describedby="m_occupationHelp" 
                            class="form-control @error('m_occupation') is-invalid @enderror"
                            value="{{old('m_occupation')}}">
                          <div class="invalid-feedback">
                              @error('m_occupation') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="m_work_place">Mother's Workplace</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="m_work_place" 
                            aria-describedby="m_work_placeHelp" 
                            class="form-control @error('m_work_place') is-invalid @enderror"
                            value="{{old('m_work_place')}}">
                          <div class="invalid-feedback">
                              @error('m_work_place') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="g_initials">Guardian's Initials</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="g_initials" 
                            aria-describedby="g_initialsHelp" 
                            class="form-control @error('g_initials') is-invalid @enderror"
                            value="{{old('g_initials')}}">
                          <div class="invalid-feedback">
                              @error('g_initials') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="g_surname">Guardian's Surname</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="g_surname" 
                            aria-describedby="g_surnameHelp" 
                            class="form-control @error('g_surname') is-invalid @enderror"
                            value="{{old('g_surname')}}">
                          <div class="invalid-feedback">
                              @error('g_surname') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="g_contact_no">Guardian's Contact No</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="g_contact_no" 
                            aria-describedby="g_contact_noHelp" 
                            class="form-control @error('g_contact_no') is-invalid @enderror"
                            value="{{old('g_contact_no')}}">
                          <div class="invalid-feedback">
                              @error('g_contact_no') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="total_donations">Total Donations</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Rs.</span>
                            </div>
                            <input 
                                autofocus
                                type="number" 
                                class="form-control" 
                                name="total_donations" 
                                aria-describedby="total_donationsHelp" 
                                class="form-control @error('total_donations') is-invalid @enderror"
                                value="{{old('total_donations')}}">
                              <div class="invalid-feedback">
                                  @error('total_donations') {{$message}} @enderror
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-5">
                        <label for="is_old_boy" class="ml-0 pl-0">Is Old Boy</label><br />
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" name="is_old_boy" id="is_old_boy">
                          </label>
                        </div>
                        @error('is_old_boy')
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
