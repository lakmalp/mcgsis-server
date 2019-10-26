@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col">
                    <span class="float-right">
                        <a href="{{route('schools.search')}}" class="btn btn-light btn-sm my-1" role="button">
                            <i class="fas fa-search mr-2"></i>Search
                        </a>
                        <a href="{{route('schools.create')}}" class="btn btn-light btn-sm my-1" role="button">
                            <i class="fas fa-plus-circle mr-2"></i>New
                        </a>
                    </span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <span class="card-header-custom"><i class="fas fa-school mr-2"></i> Schools</span>
                        </div>
                        <div class="card-text">
                            <table class="table table-hover table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th style="text-align: center" scope="col"><i class="fas fa-tools"></i></th>
                                    <th style="text-align: center" scope="col">ID</th>
                                    <th style="text-align: center" scope="col">Name</th>
                                    <th style="text-align: center" scope="col">Logo</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schools as $school)
                                    <tr>
                                        <td style="text-align: center" class="text-gray"><a href="{{route('schools.edit', [$school->id])}}"><i class="far fa-edit"></i></a> | <button class="btn btn-light px-1 mx-0" onclick="deleteSchool({{$school->id}}, '{{$school->description}}');"><i class="far fa-trash-alt"></i></button></td>
                                        <td>{{ $school->id }}</td>
                                        {{-- <td><a href="{{route('schools.show', [$school->id])}}">{{ $school->description }}</a></td> --}}
                                        <td>{{ $school->description }}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                <p>Are you sure you want to delete <span id="lblSchoolName"></span></p>
            </div>
            <input type="hidden" id="route" value="{{route('schools.index')}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="deleteSchoolSubmit();" class="btn btn-danger btn-sm">Yes</button>
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
    function deleteSchool(id, description) {
        $('#lblSchoolName').html("<b>'" + description + "'</b>?");
        $('#route').val("{{route('schools.index')}}" + "/" + id)
        $('#dlgModal').modal('show');
    }

    function deleteSchoolSubmit() {
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