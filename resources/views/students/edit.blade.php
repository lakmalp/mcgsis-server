@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                  <span class="card-header-custom">
                    <i class="fas fa-user-graduate mr-2"></i>
                    Edit Student
                  </span>
                </div>
                <div class="card-text px-2 py-2">
                  <form method="POST" action="{{route('students.update', [$student->id])}}" enctype="multipart/form-data">
                    @method('PUT')
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
                            placeholder="Enter Admission No" 
                            class="@error('admission_no') is-invalid @enderror"
                            value="{{$student->admission_no}}">
                        </div>
                        @error('admission_no')
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
                            placeholder="Enter Student First Names" 
                            class="@error('first_names') is-invalid @enderror"
                            value="{{$student->first_names}}">
                        </div>
                        @error('first_names')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-6 col-sm-6 col-md-12 col-lg-4">
                        <div class="form-group">
                          <label for="surname">Surname</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="surname" 
                            aria-describedby="surnameHelp" 
                            placeholder="Enter Surname" 
                            class="@error('surname') is-invalid @enderror"
                            value="{{$student->surname}}">
                        </div>
                        @error('surname')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-lg-8">
                        <div class="row">
                          <div class="col-12 col-lg-6">
                            <div class="form-group">
                              <label for="dob">DOB</label>
                              <input 
                                type="date" 
                                class="form-control" 
                                name="dob" 
                                aria-describedby="dobeHelp" 
                                placeholder="Enter DOB" 
                                class="@error('dob') is-invalid @enderror"
                                value="{{$student->dob}}">
                            </div>
                            @error('dob')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-12 col-lg-6">
                            <div class="form-group">
                              <label for="date_of_admission">Date of Admission</label>
                              <input 
                                type="date" 
                                class="form-control" 
                                name="date_of_admission" 
                                aria-describedby="date_of_admissionHelp" 
                                class="@error('date_of_admission') is-invalid @enderror"
                                value="{{$student->date_of_admission}}">
                            </div>
                            @error('date_of_admission')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="house_id">House</label>
                              <select name="house_id" class="form-control" aria-describedby="house_idHelp" class="@error('house_id') is-invalid @enderror">
                                @foreach($houses as $house)
                                  <option value="{{$house->id}}" {{$student->house_id==$house->id?'selected':''}}>{{$house->description}}</option>
                                @endforeach
                              </select>
                            </div>
                            @error('house_id')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="grade_class">Grade and Class</label>
                              <input 
                                type="text" 
                                class="form-control" 
                                name="grade_class" 
                                aria-describedby="grade_classHelp" 
                                class="@error('grade_class') is-invalid @enderror"
                                value="{{$student->grade_class}}">
                            </div>
                            @error('grade_class')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="add_1">Address Line 1</label>
                              <input 
                                type="text" 
                                class="form-control" 
                                name="add_1" 
                                aria-describedby="add_1Help" 
                                class="@error('add_1') is-invalid @enderror"
                                value="{{$student->add_1}}">
                            </div>
                            @error('add_1')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="add_2">Address Line 2</label>
                              <input 
                                type="text" 
                                class="form-control" 
                                name="add_2" 
                                aria-describedby="add_2Help" 
                                class="@error('add_2') is-invalid @enderror"
                                value="{{$student->add_2}}">
                            </div>
                            @error('add_2')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="city">City</label>
                              <input 
                                type="text" 
                                class="form-control" 
                                name="city" 
                                aria-describedby="cityHelp" 
                                class="@error('city') is-invalid @enderror"
                                value="{{$student->city}}">
                            </div>
                            @error('city')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="gnd">GND</label>
                              <input 
                                type="text" 
                                class="form-control" 
                                name="gnd" 
                                aria-describedby="gndHelp" 
                                class="@error('gnd') is-invalid @enderror"
                                value="{{$student->gnd}}">
                            </div>
                            @error('gnd')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-4">
                            <div class="form-group">
                              <label for="sport_1_id">Sport 1</label>
                              <select name="sport_1_id" class="form-control" aria-describedby="sport_1_idHelp" class="@error('sport_1_id') is-invalid @enderror">
                                @foreach($sports as $sport)
                                  <option value="{{$sport->id}}" {{$student->sport_1_id==$sport->id?'selected':''}}>{{$sport->description}}</option>
                                @endforeach
                              </select>
                            </div>
                            @error('sport_1_id')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-4">
                            <div class="form-group">
                              <label for="sport_2_id">Sport 2</label>
                              <select name="sport_2_id" class="form-control" aria-describedby="sport_2_idHelp" class="@error('sport_2_id') is-invalid @enderror">
                                @foreach($sports as $sport)
                                  <option value="{{$sport->id}}" {{$student->sport_2_id==$sport->id?'selected':''}}>{{$sport->description}}</option>
                                @endforeach
                              </select>
                            </div>
                            @error('sport_2_id')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-4">
                            <div class="form-group">
                              <label for="sport_3_id">Sport 3</label>
                              <select name="sport_3_id" class="form-control" aria-describedby="sport_3_idHelp" class="@error('sport_3_id') is-invalid @enderror">
                                @foreach($sports as $sport)
                                  <option value="{{$sport->id}}" {{$student->sport_3_id==$sport->id?'selected':''}}>{{$sport->description}}</option>
                                @endforeach
                              </select>
                            </div>
                            @error('sport_3_id')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="has_special_need">Has Special Need</label>
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <input name="has_special_need" type="checkbox" value="1" aria-label="Checkbox for following text input" {{$student->has_special_need==1?'checked':''}}>
                                    </div>
                                  </div>
                                  <select name="disability_id" class="form-control" aria-describedby="disability_idHelp" class="@error('disability_id') is-invalid @enderror">
                                    <option value="" {{$student->disability_id == null?'selected':''}}></option>
                                    @foreach($disabilities as $disability)
                                      <option value="{{$disability->id}}" {{$student->disability_id==$disability->id?'selected':''}}>{{$disability->description}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            @error('disability_id')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="is_scholar">Scholarship Amount</label>
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <input name="is_scholar" type="checkbox" value="1" aria-label="Checkbox for following text input" {{$student->is_scholar==1?'checked':''}}>
                                    </div>
                                  </div>
                                  <input 
                                    name="schol_amount" 
                                    type="number" 
                                    class="form-control" 
                                    aria-label="Text input with checkbox" 
                                    class="@error('schol_amount') is-invalid @enderror"
                                    value="{{$student->schol_amount}}">
                                </div>
                            </div>
                            @error('schol_amount')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4 px-0">
                        <div class="col-12">
                          <label for="avatar">Profile Picture</label><br>
                          @if ($student->avatar)
                            <div class="card">
                              <div style="height:190px; width:200px;overflow:hidden;">
                                <img class="card-img-top" src="{{ asset($student->avatar) }}" alt="Card image cap">
                              </div>
                              <div class="card-body">
                                <input 
                                  type="file" 
                                  class="btn py-1 pl-1" 
                                  id="avatar" 
                                  name="avatar" 
                                  aria-describedby="avatarHelp" 
                                  class="@error('avatar') is-invalid @enderror">
                              </div>
                            </div>
                          @else
                            <input 
                              type="file" 
                              class="btn py-1 pl-1" 
                              id="avatar" 
                              name="avatar" 
                              aria-describedby="avatarHelp" 
                              class="@error('avatar') is-invalid @enderror">
                          @endif
                        </div>
                        @if (Auth::user()->usertype == "principal")
                          <div class="col-12 pt-3">
                            <div class="form-group">
                              <label for="remarks">Remarks</label>
                              <textarea
                                rows="4"
                                name="remarks"
                                aria-describedby="remarksHelp"
                                class="form-control @error('remarks') is-invalid @enderror">{{$errors->has('remarks') ? old('remarks') : $student->remarks}}</textarea>
                              <div class="invalid-feedback">
                                  @error('remarks') {{$message}} @enderror
                              </div>
                            </div>
                          </div>
                        @endif
                      </div>
                      <div class="col-12">
                        <div class="row">
                          <div class="col-6">
                            <div class="px-2 pt-2 pb-1" style="border: 1px solid rgba(150, 150, 150, 0.2);border-radius: 5px;">
                              <div class="form-group">
                                <label for="sel1">Passed G.C.E. O/L Examination with 9As</label>
                                <div class="form-check-inline float-right pt-0" id="ol_mahindian" style="display: none;">
                                  <label class="form-check-label" style="color: #F57C00">
                                    <input type="checkbox" class="form-check-input" name="ol_mahindian" value="1" {{$student->ol_mahindian==1 ? "checked" : ""}}>Mahindian
                                  </label>
                                </div>
                                <select name="olevel_nine_a" class="form-control" id="olevel_nine_a">
                                  <option value="0" {{$student->olevel_nine_a=="0" ? "selected" : ""}}>No</option>
                                  <option value="1" {{$student->olevel_nine_a=="1" ? "selected" : ""}}>Yes</option>
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
                                    <input type="checkbox" class="form-check-input" name="schol_mahindian" value="1" {{$student->schol_mahindian==1 ? "checked" : ""}}>Mahindian
                                  </label>
                                </div>
                                <select name="grade_5_passed" class="form-control" id="grade_5_passed">
                                  <option value="0" {{$student->grade_5_passed=="0" ? "selected" : ""}}>No</option>
                                  <option value="1" {{$student->grade_5_passed=="1" ? "selected" : ""}}>Yes</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        {{-- <button type="button" class="btn btn-light btn-sm my-1" onclick="window.location.href='{{route('students.index')}}'"><i class="far fa-arrow-alt-circle-left mr-2"></i>Cancel</button> --}}
                        <span class="float-right">
                          {{-- <button type="reset" class="btn btn-light btn-sm my-1 mr-3"><i class="fas fa-broom mr-2"></i>Clear</button> --}}
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
    if ($('#olevel_nine_a').val() == "1") {
      $("#ol_mahindian").show();
    }
    if ($('#grade_5_passed').val() == "1") {
      $("#schol_mahindian").show();
    }
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