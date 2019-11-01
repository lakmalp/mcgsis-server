@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10">
            <div class="card">
                <div class="card-header">
                  <span class="card-header-custom">
                    <i class="fas fa-user-graduate mr-2"></i>
                    New Student
                  </span>
                </div>
                <div class="card-text px-2 py-2">
                  <form method="POST" action="{{route('students.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="admission_no">Admission No</label>
                          <input 
                            autofocus
                            type="text" 
                            class="form-control" 
                            name="admission_no" 
                            aria-describedby="admission_noHelp" 
                            class="form-control @error('admission_no') is-invalid @enderror"
                            value="{{old('admission_no')}}">
                          <div class="invalid-feedback">
                              @error('admission_no') {{$message}} @enderror
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
                      <div class="col-6 col-sm-6 col-md-12 col-lg-4">
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
                      <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="dob">DOB</label>
                          <input 
                            type="date" 
                            class="form-control" 
                            name="dob" 
                            aria-describedby="dobeHelp" 
                            class="form-control @error('dob') is-invalid @enderror"
                            value="{{old('dob')}}">
                          <div class="invalid-feedback">
                              @error('dob') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="date_of_admission">Date of Admission</label>
                          <input 
                            type="date" 
                            class="form-control" 
                            name="date_of_admission" 
                            aria-describedby="date_of_admissionHelp" 
                            class="form-control @error('date_of_admission') is-invalid @enderror"
                            value="{{old('date_of_admission')}}">
                          <div class="invalid-feedback">
                              @error('date_of_admission') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="house_id">House</label>
                          <select name="house_id" aria-describedby="house_idHelp" class="form-control @error('house_id') is-invalid @enderror">
                            @foreach($houses as $house)
                              <option value="{{$house->id}}">{{$house->description}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="grade_class">Grade and Class</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="grade_class" 
                            aria-describedby="grade_classHelp" 
                            class="form-control @error('grade_class') is-invalid @enderror"
                            value="{{old('grade_class')}}">
                          <div class="invalid-feedback">
                              @error('grade_class') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="form-group">
                          <label for="add_1">Address Line 1</label>
                          <input 
                            type="text" 
                            name="add_1" 
                            aria-describedby="add_1Help" 
                            class="form-control @error('add_1') is-invalid @enderror"
                            value="{{old('add_1')}}">
                          <div class="invalid-feedback">
                              @error('add_1') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="form-group">
                          <label for="add_2">Address Line 2</label>
                          <input 
                            type="text" 
                            name="add_2" 
                            aria-describedby="add_2Help" 
                            class="form-control @error('add_2') is-invalid @enderror"
                            value="{{old('add_2')}}">
                          <div class="invalid-feedback">
                              @error('add_2') {{$message}} @enderror
                          </div>
                        </div>
                        @error('add_2')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12 col-md-6 col-lg-6 col-xl-2">
                        <div class="form-group">
                          <label for="city">City</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="city" 
                            aria-describedby="cityHelp" 
                            class="form-control @error('city') is-invalid @enderror"
                            value="{{old('city')}}">
                          <div class="invalid-feedback">
                              @error('city') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6 col-xl-2">
                        <div class="form-group">
                          <label for="gnd">GND</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="gnd" 
                            aria-describedby="gndHelp" 
                            class="form-control @error('gnd') is-invalid @enderror"
                            value="{{old('gnd')}}">
                          <div class="invalid-feedback">
                              @error('gnd') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="sport_1_id">Sport 1</label>
                          <select name="sport_1_id" class="form-control" aria-describedby="sport_1_idHelp" class="@error('sport_1_id') is-invalid @enderror">
                            <option value=""></option>
                            @foreach($sports as $sport)
                              <option value="{{$sport->id}}">{{$sport->description}}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('sport_1_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="sport_2_id">Sport 2</label>
                          <select name="sport_2_id" class="form-control" aria-describedby="sport_2_idHelp" class="@error('sport_2_id') is-invalid @enderror">
                            <option value=""></option>
                            @foreach($sports as $sport)
                              <option value="{{$sport->id}}">{{$sport->description}}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('sport_2_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label for="sport_3_id">Sport 3</label>
                          <select name="sport_3_id" class="form-control" aria-describedby="sport_3_idHelp" class="@error('sport_3_id') is-invalid @enderror">
                            <option value=""></option>
                            @foreach($sports as $sport)
                              <option value="{{$sport->id}}">{{$sport->description}}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('sport_3_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label for="is_scholar">Scholarship Amount</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input name="is_scholar" type="checkbox" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                              <input 
                                name="schol_amount" 
                                type="number" 
                                aria-label="Text input with checkbox" 
                                class="form-control @error('schol_amount') is-invalid @enderror"
                                value="{{old('schol_amount')}}">
                              <div class="invalid-feedback">
                                  @error('schol_amount') {{$message}} @enderror
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" name="has_special_need" id="has_special_need">
                          <label class="form-check-label" for="has_special_need">
                            Has Special Need
                          </label>
                        </div>
                        @error('has_special_need')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label for="disability_id">Type of Disability</label>
                          <select name="disability_id" class="form-control" aria-describedby="disability_idHelp" class="@error('disability_id') is-invalid @enderror">
                            <option value=""></option>
                            @foreach($disabilities as $disability)
                              <option value="{{$disability->id}}">{{$disability->description}}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('disability_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="avatar">Image</label>
                          <input 
                            type="file" 
                            class="form-control py-1 pl-1" 
                            id="avatar" 
                            name="avatar" 
                            aria-describedby="avatarHelp" 
                            class="@error('avatar') is-invalid @enderror">
                        </div>
                        @error('avatar')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12 col-md-6 col-lg-6 col-xl-8">
                        <div class="form-group">
                          <label for="remarks">Remarks</label>
                          <textarea
                            rows="1"
                            name="remarks"
                            aria-describedby="remarksHelp"
                            class="form-control @error('remarks') is-invalid @enderror">{{old('remarks')}}</textarea>
                          <div class="invalid-feedback">
                              @error('remarks') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="row">
                          <div class="col-6">
                            <div class="px-2 pt-2 pb-1" style="border: 1px solid rgba(150, 150, 150, 0.2);border-radius: 5px;">
                              <div class="form-group">
                                <label for="sel1">Passed G.C.E. O/L Examination with 9As</label>
                                <div class="form-check-inline float-right pt-0" id="ol_mahindian" style="display: none;">
                                  <label class="form-check-label" style="color: #F57C00">
                                    <input type="checkbox" class="form-check-input" name="ol_mahindian" value="1" {{old('ol_mahindian')==1 ? "checked" : ""}}>Mahindian
                                  </label>
                                </div>
                                <select name="olevel_nine_a" class="form-control" id="olevel_nine_a">
                                  <option value="0" {{old('olevel_nine_a')=="0" ? "selected" : ""}}>No</option>
                                  <option value="1" {{old('olevel_nine_a')=="1" ? "selected" : ""}}>Yes</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="px-2 pt-2 pb-1" style="border: 1px solid rgba(150, 150, 150, 0.2);border-radius: 5px;">
                              <div class="form-group">
                                <label for="sel1">Passed Grade 5 Scholarship Examination</label>
                                <div class="form-check-inline float-right pt-0" id="schol_mahindian" style="display: none;">
                                  <label class="form-check-label" style="color: #F57C00">
                                    <input type="checkbox" class="form-check-input" name="schol_mahindian" value="1" {{old('schol_mahindian')==1 ? "checked" : ""}}>Mahindian
                                  </label>
                                </div>
                                <select name="grade_5_passed" class="form-control" id="grade_5_passed">
                                  <option value="0" {{old('grade_5_passed')=="0" ? "selected" : ""}}>No</option>
                                  <option value="1" {{old('grade_5_passed')=="1" ? "selected" : ""}}>Yes</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col">
                        <button type="button" class="btn btn-light btn-sm my-1" onclick="window.location.href='{{route('students.index')}}'"><i class="far fa-arrow-alt-circle-left mr-2"></i>Cancel</button>
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

@push('script')
<script>
  $( document ).ready(function() {
    $('#olevel_nine_a').on('change', function() {
      if( this.value == "1") {
        $("#ol_mahindian").show();
      }
      else {
        $("#ol_mahindian").hide();
      }
    });
    $('#grade_5_passed').on('change', function() {
      if( this.value == "1") {
        $("#schol_mahindian").show();
      }
      else {
        $("#schol_mahindian").hide();
      }
    });
  });
</script>
@endpush