@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col">
                    <a href="{{route('sports.create')}}" class="btn btn-light btn-sm float-right my-1" role="button">
                        <i class="fas fa-plus-circle mr-2"></i>New
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <span class="card-header-custom"><i class="fas fa-running mr-2"></i> Sports</span>
                        </div>
                        <div class="card-text">
                            <table class="table table-hover table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th style="text-align: center" scope="col"><i class="fas fa-tools"></i></th>
                                    <th style="text-align: center" scope="col">Sport ID</th>
                                    <th style="text-align: center" scope="col">Description</th>
                                    <th style="text-align: center" scope="col">Teacher in Charge</th>
                                    <th style="text-align: center" scope="col">Master Coach</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sports as $sport)
                                    <tr>
                                        <td style="text-align: center" class="text-gray"><a href="{{route('sports.edit', [$sport->id])}}"><i class="far fa-edit"></i></a> | <button class="btn btn-light px-1 mx-0" onclick="deleteSport({{$sport->id}}, '{{$sport->description}}');"><i class="far fa-trash-alt"></i></button></td>
                                        <td>{{ $sport->sport_id }}</td>
                                        <td>{{ $sport->description }}</td>
                                        <td>{{ $sport->teacherInCharge()->exists()?$sport->teacherInCharge->first_names . " " . $sport->teacherInCharge->surname:''}}</td>
                                        <td>{{ $sport->master_coach }}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $sports->links() }}
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
                <p>Are you sure you want to delete <span id="lblSportName"></span></p>
            </div>
            <input type="hidden" id="route" value="{{route('sports.index')}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="deleteSportSubmit();" class="btn btn-danger btn-sm">Yes</button>
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
    function deleteSport(id, description) {
        $('#lblSportName').html("<b>'" + description + "'</b>?");
        $('#route').val("{{route('sports.index')}}" + "/" + id)
        $('#dlgModal').modal('show');
    }

    function deleteSportSubmit() {
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