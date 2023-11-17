@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <div class="row profile-body">

      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="card">
            <div class="card-body">
                              <h6 class="card-title">Edit Admin</h6>

             <form method="POST" action="{{route('update.admin', $admin->id )}}" class="forms-sample">
                    @csrf

                                   <div class="mb-3">

                                      <label for="exampleInputUsername1" class="form-label">Username</label>
                                      <input type="text" name="username" class="form-control" value={{ $admin->username }} id="name" autocomplete="off">
                                      @error('username')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                
                                  </div>

                                  <div class="mb-3">
                                      <label for="exampleInputUsername1" class="form-label">Name</label>
                                      <input type="text" name="name" class="form-control" value={{ $admin->name }} id="name" autocomplete="off">
                                      @error('name')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                
                                  </div>

                                  <div class="mb-3">

                                      <label for="exampleInputUsername1" class="form-label">Email</label>
                                      <input type="email" name="email" class="form-control" value={{ $admin->email }} id="name" autocomplete="off">
                                      @error('name')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                
                                  </div>

                                  <div class="mb-3">
                                      <label for="exampleInputUsername1" class="form-label">Phone no.</label>
                                      <input type="text" name="phone" class="form-control" value={{ $admin->phone }} id="name" autocomplete="off">
                                      @error('phone')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>

                                  
                                  <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" value={{ $admin->phone }} id="name" autocomplete="off">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                  <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Role Name</label>
                                    <select name="roles" class="form-select">
                                        <option selected="" disabled="" >Select Role</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->name}}" {{ $admin->hasRole($role->name) ? 'selected' : ''}} >{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                  <button type="submit" class="btn btn-primary me-2">Save changes</button>
                </form>
            </div>
          </div>
      </div>
    </div>

        </div>


@endsection