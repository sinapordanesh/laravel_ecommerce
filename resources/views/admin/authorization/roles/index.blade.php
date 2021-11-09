<x-admin-master>

    @section('content')

        <h1>Roles</h1>
{{--        <div class="row">--}}
{{--            @if(session()->has('role-deleted'))--}}
{{--                <div class="alert alert-danger">--}}
{{--                    {{session('role-deleted')}}--}}
{{--                </div>--}}
{{--            @endif--}}

{{--        </div>--}}
        <div class="row">
            <div class="col-sm-3">
                <form method
                      ="post" action="{{route('role.store')}}" >
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                        </label>
                        <div>
                            @error('name')
                                <span><strong  >{{$message}}</strong></span>
                            @enderror
                        </div>
{{--                        <div class="invalid-feedback">--}}
{{--                            @error('name')--}}
{{--                            {{$message}}--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Create
                    </button>
                </form>
            </div>

            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All Roles</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td><a href="{{route('role.edit', $role->id)}}">{{$role->name}}</a></td>
                                        <td>{{$role->slug}}</td>
                                        <td>{{$role->created_at->diffForHumans()}}</td>
                                        <td>
                                            <form method="post" action="{{route('role.destroy', $role->id)}}">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endsection

</x-admin-master>
