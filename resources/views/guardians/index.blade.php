@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10">
            <div class="row">
                <div class="col">
                    <a href="{{route('guardians.create')}}" class="btn btn-light btn-sm float-right my-1" role="button">
                        <i class="fas fa-plus-circle mr-2"></i>New
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <span class="card-header-custom"><i class="fas fa-male mr-2"></i> Parents / Guardians</span>
                        </div>
                        <div class="card-text">
                            <table class="table table-hover table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th style="text-align: center" scope="col"><i class="fas fa-tools"></i></th>
                                    <th style="text-align: center" scope="col">Father's Name</th>
                                    <th style="text-align: center" scope="col">Student Admission No.</th>
                                    <th style="text-align: center" scope="col">Is Old Boy</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guardians as $guardian)
                                    <tr>
                                        <?php
                                            $props = json_encode(array(
                                                "id" => $guardian->id,
                                                "f_initials" => $guardian->f_initials,
                                                "f_surname" => $guardian->f_surname,
                                                "m_initials" => $guardian->m_initials,
                                                "m_surname" => $guardian->m_surname,
                                                "g_initials" => $guardian->g_initials,
                                                "g_surname" => $guardian->g_surname,
                                                "admission_no" => $guardian->student()->exists() ? $guardian->student->admission_no : null
                                            ));
                                        ?>
                                        <td style="text-align: center" class="text-gray">
                                            <a href="{{route('guardians.edit', [$guardian->id])}}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                             | 
                                             <button class="btn btn-light px-1 mx-0" onclick="deleteGuardian({{ $props }});">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </td>
                                        <td>{{ $guardian->f_initials . " " .$guardian->f_surname}}</td>
                                        <td>{{ $guardian->student()->exists() ? $guardian->student->admission_no : "" }}</td>
                                        <td><input type="checkbox" {{ $guardian->is_old_boy==1 ? 'checked':'' }} disabled></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $guardians->links() }}
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
                <p>Are you sure you want to delete below parent record?</p>
                <div>
                    <ul>
                        <li id="lblFNameLi" style="display:block;">Father's Name: <span id="lblFName"></span></li>
                        <li id="lblMNameLi" style="display:block;">Mother's Name: <span id="lblMName"></span></li>
                        <li id="lblGNameLi" style="display:block;">Guardian's Name: <span id="lblGName"></span></li>
                        <li id="lblStudentLi" style="display:block;">Student Admission No.: <span id="lblStudent"></span></li>
                    </ul>
                </div>
            </div>
            <input type="hidden" id="route" value="{{route('guardians.index')}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="deleteGuardianSubmit();" class="btn btn-danger btn-sm">Yes</button>
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
    function deleteGuardian(props) {
        $('#lblFName').html("<b>'" + props.f_initials + " " + (props.f_surname===null ? "" : props.f_surname) + "'</b>");
        $('#lblMName').html("<b>'" + props.m_initials + " " + (props.m_surname===null ? "" : props.m_surname) + "'</b>");
        $('#lblGName').html("<b>'" + props.g_initials + " " + (props.g_surname===null ? "" : props.g_surname) + "'</b>");
        $('#lblStudent').html("<b>'" + props.admission_no + "'</b>?");
        props.f_initials == null ? $('#lblFNameLi').hide() : null;
        props.m_initials == null ? $('#lblMNameLi').hide() : null;
        props.g_initials == null ? $('#lblGNameLi').hide() : null;
        props.g_initials == null ? $('#lblStudentLi').hide() : null;

        $('#route').val("{{route('guardians.index')}}" + "/" + props.id)
        $('#dlgModal').modal('show');
    }

    function deleteGuardianSubmit() {
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