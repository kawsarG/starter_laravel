@extends('layouts.backend.app')
@push('css')
eiwjfiewjfn
@endpush
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                </i>
            </div>

            {{isset($role)? 'Edit ':'Create ' }}Roles

        </div>
        <div class="page-title-actions">
            <a href="{{route('app.roles.index')}}" title="Example Tooltip" data-placement="bottom"
                class="btn-shadow mr-3 btn btn-danger">
                <i class="fa fa-arrow-circle-left"></i><span>
                    Back to list

                </span>
            </a>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <form method="POST" action="{{isset($role)? route('app.roles.update',$role->id):route('app.roles.store')}}">
                @csrf
                @isset($role)
                @method("PUT")
                @endisset
                <div class="card-body">
                    <h5 class="card-title">Mange Roles
                    </h5>
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <div class="form-group">
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{$role->name ?? old('name') }}" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <strong>
                            <h3 class="mb-3">Manage permissions for Role</h3>
                        </strong>
                        @error('permissions')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="x">
                            <label class="custom-control-label" for="x">Select All</label>
                        </div>
                    </div>
                    @forelse($modules->chunk(2) as $key=>$chunks)

                    <div class="form-row">
                        @foreach($chunks as $key=>$module)
                        <div class="col">
                            <h5>Module:{{$module->name}}</h5>
                            @foreach($module->permissions as $key=>$permission)
                            <div class="mb-3 ml-4">
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input"
                                        id="permission-{{$permission->id}}" value="{{$permission->id}}"
                                        name="permissions[]" @isset($role) @foreach($role->permissions as $rp)
                                    {{$permission->id === $rp->id ? 'checked':''}}
                                    @endforeach
                                    @endisset>

                                    <label for="permission-{{$permission->id}}"
                                        class="custom-control-label">{{$permission->name}}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    @empty
                    <div class="form-row">
                        <div class="col text-center">
                            <strong>
                                No Module found:(
                            </strong>
                        </div>
                    </div>
                    @endforelse

                    <button class="btn btn-primary" type="submit">
                        @isset($role)
                        <i class="fas fa-plus-circle"> Update</i>
                        @else
                        <i class="fas fa-plus-circle"> Create</i>
                        @endisset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
$('#x').click(function(e) {
    if (this.checked) {
        $(':checkbox').each(function() {
            this.checked = true;
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;
        });

    }
});
</script>
@endpush