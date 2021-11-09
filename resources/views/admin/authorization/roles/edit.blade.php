<x-admin-master>

    @section('content')
        <h1>Edit Role <strong>{{$role->name}}</strong>
        </h1>

        <div class="row">
            <div class="col-sm-6">

                <form method="post" action="{{route('role.update', $role->id)}}">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$role->name}}">
                    </div>

                    <button class="btn btn-primary">Update</button>

                </form>
            </div>
        </div>

        <br>

        <div class="row">
           <div class="col-lg-12">
{{--               @if($permissions->isNotEmpty())--}}
               <div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Role Permissions</h6>
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

                                   @foreach($permissions as $permission)
                                       <tr>
                                           <td>
                                               @if($role->permissions->contains($permission))
                                                   <span class="badge badge-success">Accessed</span>
                                               @else
                                                   <span class="badge badge-danger">Not Accessed</span>
                                               @endif
                                           </td>
                                           <td>{{$permission->name}}</td>
                                           <td>
                                               @if(!$role->permissions->contains($permission))
                                               <form method="post" action="{{route('role.permission.attach', $role)}}">
                                                   @method('PUT')
                                                   @csrf
                                                   <input type="hidden" name="permission" value="{{$permission->id}}">
                                                   <button class="btn btn-primary">
                                                       Attach
                                                   </button>
                                               </form>
                                               @elseif($role->permissions->contains($permission))
                                                   <form method="post" action="{{route('role.permission.detach', $role)}}">
                                                       @method('PUT')
                                                       @csrf
                                                       <input type="hidden" name="permission" value="{{$permission->id}}">
                                                       <button class="btn btn-danger">
                                                           Detach
                                                       </button>
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
{{--               @endif--}}
           </div>
        </div>

    @endsection

</x-admin-master>
