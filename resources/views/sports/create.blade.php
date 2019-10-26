@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <div class="card">
                <div class="card-header">
                  <span class="card-header-custom">
                    <i class="fas fa-running mr-2"></i>
                    Create Sport
                  </span>
                </div>
                <div class="card-text px-2 py-2">
                  <form method="POST" action="{{route('sports.store')}}">
                    @csrf
                    <div class="row">
                      <div class="col-12 col-md-4">
                        <div class="form-group">
                          <label for="sport_id">Sport ID</label>
                          <input 
                            autofocus
                            type="text" 
                            class="form-control" 
                            name="sport_id" 
                            aria-describedby="sport_idHelp" 
                            class="form-control @error('sport_id') is-invalid @enderror"
                            value="{{old('sport_id')}}">
                          <div class="invalid-feedback">
                              @error('sport_id') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="form-group">
                          <label for="description">Description</label>
                          <input 
                            autofocus
                            type="text" 
                            class="form-control" 
                            name="description" 
                            aria-describedby="descriptionHelp" 
                            class="form-control @error('description') is-invalid @enderror"
                            value="{{old('description')}}">
                          <div class="invalid-feedback">
                              @error('description') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="form-group">
                          <label for="teacher_incharge_id">Teacher in Charge</label>
                          <select name="teacher_incharge_id" class="form-control" aria-describedby="teacher_incharge_idHelp" class="@error('teacher_incharge_id') is-invalid @enderror">
                            <option value=""></option>
                            @foreach($teachers as $teacher)
                              <option value="{{$teacher->id}}">{{"[" . $teacher->teacher_id . "] " . $teacher->first_names . ", " . $teacher->surname}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="form-group">
                          <label for="master_coach">Master Coach</label>
                          <input 
                            autofocus
                            type="text" 
                            class="form-control" 
                            name="master_coach" 
                            aria-describedby="master_coachHelp" 
                            class="form-control @error('master_coach') is-invalid @enderror"
                            value="{{old('master_coach')}}">
                          <div class="invalid-feedback">
                              @error('master_coach') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="form-group">
                          <label for="sub_coach">Sub Coach</label>
                          <input 
                            autofocus
                            type="text" 
                            class="form-control" 
                            name="sub_coach" 
                            aria-describedby="sub_coachHelp" 
                            class="form-control @error('sub_coach') is-invalid @enderror"
                            value="{{old('sub_coach')}}">
                          <div class="invalid-feedback">
                              @error('sub_coach') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="form-group">
                          <label for="physio">Physiotherapist</label>
                          <input 
                            autofocus
                            type="text" 
                            class="form-control" 
                            name="physio" 
                            aria-describedby="physioHelp" 
                            class="form-control @error('physio') is-invalid @enderror"
                            value="{{old('physio')}}">
                          <div class="invalid-feedback">
                              @error('physio') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="master_coach_wage">Master Coach Wage</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Rs.</span>
                            </div>
                            <input 
                                autofocus
                                type="number" 
                                class="form-control" 
                                name="master_coach_wage" 
                                aria-describedby="master_coach_wageHelp" 
                                class="form-control @error('master_coach_wage') is-invalid @enderror"
                                value="{{old('master_coach_wage')}}">
                              <div class="invalid-feedback">
                                  @error('master_coach_wage') {{$message}} @enderror
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="sub_coach_wage">Sub Coach Wage</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Rs.</span>
                            </div>
                            <input 
                                autofocus
                                type="number" 
                                class="form-control" 
                                name="sub_coach_wage" 
                                aria-describedby="sub_coach_wageHelp" 
                                class="form-control @error('sub_coach_wage') is-invalid @enderror"
                                value="{{old('sub_coach_wage')}}">
                              <div class="invalid-feedback">
                                  @error('sub_coach_wage') {{$message}} @enderror
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="annual_allocated_budget">Annual Budgetary Alloc.</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Rs.</span>
                            </div>
                            <input 
                                autofocus
                                type="number" 
                                class="form-control" 
                                name="annual_allocated_budget" 
                                aria-describedby="annual_allocated_budgetHelp" 
                                class="form-control @error('annual_allocated_budget') is-invalid @enderror"
                                value="{{old('annual_allocated_budget')}}">
                              <div class="invalid-feedback">
                                  @error('annual_allocated_budget') {{$message}} @enderror
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <button type="button" class="btn btn-light btn-sm my-1" onclick="window.location.href='{{route('sports.index')}}'"><i class="far fa-arrow-alt-circle-left mr-2"></i>Cancel</button>
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
