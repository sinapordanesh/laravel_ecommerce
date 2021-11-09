<x-admin-master>

    @section('content')

        <h1>User Profile: <strong>{{$user->name}}</strong></h1>

        <div class="row">
            <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-4">
                    <img class="img-profile rounded-circle" height="90px" width="90px" src="{{$user->avatar}}">

                </div>

                <div class="form-group">
                    <input class="form-control {{$errors->has('avatar') ? 'is-invalid' : ''}}" type="file" name="avatar">

                    @error('avatar')
                    <div class="alert-danger">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" value="{{$user->name}}">

                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}" readonly>

{{--                    @error('email')--}}
{{--                    <div class="alert alert-danger">{{$message}}</div>--}}
{{--                    @enderror--}}
                </div>


{{--                <div class="form-group">--}}
{{--                    <label for="password">Password</label>--}}
{{--                    <input type="password" class="form-control" id="password">--}}

{{--                    @error('password')--}}
{{--                    <div class="alert alert-danger">{{$message}}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="password-confirm">Confirm Password</label>--}}
{{--                    <input type="password" class="form-control" id="password-confirm">--}}

{{--                    @error('password_confirmation')--}}
{{--                    <div class="alert alert-danger">{{$message}}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>

        <br>

        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>
                                            @if($user->roles->contains($role))
                                                <span class="badge badge-success">Accessed</span>
                                            @else
                                                <span class="badge badge-danger">Not Accessed</span>
                                            @endif
                                        </td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            @if(!$user->roles->contains($role))
                                                <form method="post" action="{{route('user.role.attach', $user)}}">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="role" value="{{$role->id}}">
                                                    <button class="btn btn-primary">
                                                    Attach
                                                    </button>
                                                </form>
                                            @elseif($user->roles->contains($role))
                                                <form method="post" action="{{route('user.role.detach', $user)}}">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="role" value="{{$role->id}}">
                                                    <button class="btn btn-danger">
                                                        Detach
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
{{--                                        <td>--}}
{{--                                            <form method="post" action="{{route('user.role.detach', $user)}}">--}}
{{--                                                @method('PUT')--}}
{{--                                                @csrf--}}
{{--                                                <input type="hidden" name="role" value="{{$role->id}}">--}}
{{--                                                <button class="btn btn-danger"--}}
{{--                                                        @if(!$user->roles->contains($role))--}}
{{--                                                            disabled--}}
{{--                                                        @endif--}}
{{--                                                >--}}
{{--                                                    Detach--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </td>--}}
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
