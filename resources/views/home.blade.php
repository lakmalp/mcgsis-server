@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <div class="card dropshadow top-liner rounded">
                                <div class="card-header my-0 py-1"><i class="fas fa-user-graduate mr-2"></i>Student</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="section-topic">Registered:</span>
                                        </div>
                                        <div class="col">
                                            <span class="section-text mr-3">{{$stats['student_cnt']}}</span><a href="{{route('students.index')}}"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col">
                                            <span class="section-topic">Disabled:</span>
                                        </div>
                                        <div class="col">
                                            <span class="section-text mr-3">{{$stats['student_disabled_cnt']}}</span><a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card dropshadow top-liner rounded">
                                <div class="card-header my-0 py-1 "><i class="fas fa-chalkboard-teacher mr-2"></i>Teacher</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="section-topic">Registered:</span>
                                        </div>
                                        <div class="col">
                                            <span class="section-text mr-3">{{$stats['teacher_cnt']}}</span><a href="{{route('teachers.index')}}"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
.section-text {
    font-size: 10pt;
}
.section-topic {
    font-size: 10pt;
    font-weight: bold;
}
.top-liner {
    border-top: 2px solid #F9A825 !important;
}
.card-header {
    border: 0;
    font-family: Nunito, sans-serif;
    font-size: 12pt;
    font-weight: bold;
    color: #444;
}
.bg-gray {
    background-color: #eee !important;
}
.dropshadow {
    height: auto;
    -webkit-box-shadow: -15px 13px 20px 3px rgba(0,0,0,0.91);
    -moz-box-shadow: -15px 13px 20px 3px rgba(0,0,0,0.91);
    box-shadow: 0px 0px 15px 2px rgba(0,0,0,0.2);
}
.rounded {
    border-radius: 0px !important;
}
</style>