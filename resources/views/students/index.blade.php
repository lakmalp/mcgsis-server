@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10">
            <div class="row">
                <div class="col">
                    <a href="{{route('students.create')}}" class="btn btn-light btn-sm float-right my-1" role="button">
                        <i class="fas fa-plus-circle mr-2"></i>New
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <span class="card-header-custom"><i class="fas fa-user-graduate mr-2"></i> Students</span>
                        </div>
                        <div class="card-text">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-sm">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center" scope="col"><i class="fas fa-tools"></i></th>
                                        <th style="text-align: center" scope="col">Admission No.</th>
                                        <th style="text-align: center" scope="col">Full Name</th>
                                        <th style="text-align: center" scope="col">Class</th>
                                        <th style="text-align: center" scope="col">Disability</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        <tr>
                                            <td style="text-align: center" class="text-gray"><a href="{{route('students.edit', [$student->id])}}"><i class="far fa-edit"></i></a> | <button class="btn btn-light px-1 mx-0" onclick="deleteStudent({{$student->id}}, '{{$student->first_names . ', ' . $student->surname}}');"><i class="far fa-trash-alt"></i></button></td>
                                            <td>{{ $student->admission_no }}</td>
                                            <td>{{ $student->first_names . " " .$student->surname}}</td>
                                            <td>{{ $student->grade_class}}</td>
                                            <td>{{ $student->disability()->exists()?$student->disability->description:''}}</td>
                                            <td></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="dlgModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Record deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <span id="lblStudentName"></span></p>
            </div>
            <input type="hidden" id="route" value="{{route('students.index')}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="deleteStudentSubmit();" class="btn btn-danger btn-sm">Yes</button>
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
.text-gray {
    color: rgba(50,50,50, .5);
}
</style>

@push('script')
<script type="text/javascript">
    function deleteStudent(id, description) {
        $('#lblStudentName').html("<b>'" + description + "'</b>?");
        $('#route').val("{{route('students.index')}}" + "/" + id)
        $('#dlgModal').modal('show');
    }

    function deleteStudentSubmit() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: $('#route').val(),
            type: 'DELETE',
            success: function(result) {
                $('#dlgModal').modal('hide');
                window.location.reload(true); 
            },
            error: function(xhr) {
            console.log(xhr.responseText); // this line will save you tons of hours while debugging
            // do something here because of error
        }
        });
    }
</script>
@endpush