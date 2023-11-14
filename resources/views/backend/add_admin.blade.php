@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <div class="row profile-body">

      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="card">
            <div class="card-body">
                              <h6 class="card-title">Add Admin</h6>

             <form method="POST" action="{{route('store.admin')}}" class="forms-sample">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Admin Username</label>
                        <input type="text" name="username" class="form-control" id="name" autocomplete="off">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                                  <div class="mb-3">
                                      <label for="exampleInputUsername1" class="form-label">Admin Name</label>
                                      <input type="text" name="name" class="form-control" id="name" autocomplete="off">
                                      @error('name')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Admin Email</label>
                                    <input type="text" name="email" class="form-control" id="name" autocomplete="off">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Admin Phone</label>
                                    <input type="text" name="phone" class="form-control" id="name" autocomplete="off">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Admin Address</label>
                                    <input type="text" name="address" class="form-control" id="name" autocomplete="off">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Admin Password</label>
                                    <input type="text" name="password" class="form-control" id="name" autocomplete="off">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                  <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Role Name</label>
        
                                    <select name="roles" class="form-select">
                                        <option selected="" disabled="" >Select Role</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->name}}" >{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                
                                    @error('group_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                  <button type="submit" class="btn btn-primary me-2">Save changes</button>
                </form>
            </div>
          </div>
      </div>
    </div>

        </div>


@endsection