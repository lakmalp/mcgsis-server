@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <span class="card-header-custom">
                    <i class="fas fa-school mr-2"></i>
                    Search School
                  </span>
                </div>
                <div class="card-text px-2 py-2">
                  <form method="GET" action="{{route('schools.search')}}">
                    <div class="row">
                      <div class="col">
                        @csrf
                        <div class="form-group">
                          <label for="description">Name</label>
                          <input 
                            autofocus
                            type="text" 
                            class="form-control" 
                            name="description" 
                            aria-describedby="descriptionHelp" 
                            class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <button type="button" class="btn btn-light btn-sm my-1" onclick="window.location.href='{{route('schools.index')}}'"><i class="far fa-arrow-alt-circle-left mr-2"></i>Cancel</button>
                        <span class="float-right">
                          <button type="reset" class="btn btn-light btn-sm my-1 mr-3"><i class="fas fa-broom mr-2"></i>Clear</button>
                          <button type="submit" class="btn btn-secondary btn-sm my-1 "><i class="far fa-search mr-2"></i>Search</button>
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
