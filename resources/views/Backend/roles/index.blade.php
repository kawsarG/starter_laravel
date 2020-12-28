@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Analytics Dashboard

            </div>
        </div>
        <div class="page-title-actions">
            <a href="{{route('app.roles.create')}}" title="Example Tooltip" data-placement="bottom"
                class="btn-shadow mr-3 btn btn-dark">
                <i class="fa fa-star"></i><span> Create Roles</span>
            </a>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">

            <div class="table-responsive">
                <table id="example" class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Permission</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $key=>$role)
                        <tr>
                            <td class="text-center text-muted">{{$key+1}}</td>
                            <td class="text-center">
                                {{$role->name}}
                            </td>
                            <td class="text-center">
                                @if($role->permissions->count()>0)
                                <div class="badge badge-info">{{$role->permissions->count()}}</div>
                                @else
                                <div class="badge badge-warning">No Permission found:(</div>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{route('app.roles.edit',$role->id)}}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                @if($role->deleteable == true)
                                <button type="button" class="btn btn-danger" onclick="deleteData({{$role->id}})">
                                    <i class="fas fa-trash-alt"> </i> Delete
                                </button>
                                <form id='delete-form-{{$role->id}}' style="display: none;"
                                    action="{{route('app.roles.destroy',$role->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src=" https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
</script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
</script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
@endpush