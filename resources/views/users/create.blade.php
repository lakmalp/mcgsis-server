@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <span class="card-header-custom">
                    <i class="fas fa-user mr-2"></i>
                    Create User
                  </span>
                </div>
                <div class="card-text px-2 py-2">
                  <form method="POST" action="{{route('users.store')}}">
                    @csrf
                    <div class="row">
                      <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input 
                            autofocus
                            type="email" 
                            class="form-control" 
                            name="email" 
                            aria-describedby="emailHelp" 
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{old('email')}}">
                          <div class="invalid-feedback">
                              @error('email') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="name">Full Name</label>
                          <input 
                            type="text" 
                            class="form-control" 
                            name="name" 
                            aria-describedby="nameHelp" 
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{old('name')}}">
                          <div class="invalid-feedback">
                              @error('name') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input 
                            type="password" 
                            class="form-control" 
                            name="password" 
                            aria-describedby="passwordHelp" 
                            autocomplete="new-password"
                            class="form-control @error('password') is-invalid @enderror"
                            value="{{old('password')}}">
                          <div class="invalid-feedback">
                              @error('password') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="password_confirmation">Re-type Password</label>
                          <input 
                            type="password" 
                            class="form-control" 
                            name="password_confirmation" 
                            aria-describedby="password_confirmationHelp" 
                            autocomplete="new-password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            value="{{old('password_confirmation')}}">
                          <div class="invalid-feedback">
                              @error('password_confirmation') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="usertype">User Type</label>
                          <select name="usertype" class="form-control @error('usertype') is-invalid @enderror" required>
                            <option value="principal" {{old('usertype')?'selected':''}}>Principal</option>
                            <option value="user" {{old('usertype')?'selected':''}}>User</option>
                          </select>
                          <div class="invalid-feedback">
                              @error('usertype') {{$message}} @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <button type="button" class="btn btn-light btn-sm my-1" onclick="window.location.href='{{route('users.index')}}'"><i class="far fa-arrow-alt-circle-left mr-2"></i>Cancel</button>
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
