@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <span class="card-header-custom">
                    <i class="fas fa-home mr-2"></i>
                    Create House
                  </span>
                </div>
                <div class="card-text px-2 py-2">
                  <form method="POST" action="{{route('houses.store')}}">
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
                            placeholder="Enter House Name" 
                            class="form-control @error('description') is-invalid @enderror"
                            value="{{old('description')}}">
                            <div class="invalid-feedback">
                                @error('description') {{$message}} @enderror
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <button type="button" class="btn btn-light btn-sm my-1" onclick="window.location.href='{{route('houses.index')}}'"><i class="far fa-arrow-alt-circle-left mr-2"></i>Cancel</button>
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
