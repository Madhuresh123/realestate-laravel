@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
            <div>
                <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
                <span class="h4 ms-3">{{$profileData->username}}</span>
            </div>
          <div class="card-body">
           
            <div class="d-flex align-items-center justify-content-between mb-2">
              <h6 class="card-title mb-0">About</h6>
              <div class="dropdown">
                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="git-branch" class="icon-sm me-2"></i> <span class="">Update</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View all</span></a>
                </div>
              </div>

           

            </div>
            <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Name</label>
              <p class="text-muted">{{$profileData->name}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone</label>
              <p class="text-muted">{{$profileData->phone}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{$profileData->email}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Adress</label>
              <p class="text-muted">{{$profileData->address}}</p>
            </div>
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="card">
            <div class="card-body">

                              <h6 class="card-title">Update Profile Data</h6>

                              <form method="POST" action="{{route('admin.profile.store')}}" class="forms-sample" enctype="multipart/form-data">
                                @csrf
                                
                                  <div class="mb-3">
                                      <label for="exampleInputUsername1" class="form-label">Username</label>
                                      <input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username"
                                      value="{{ $profileData->username}}">
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username"
                                    value="{{ $profileData->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username"
                                    value="{{ $profileData->email}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username"
                                    value="{{ $profileData->phone}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username"
                                    value="{{ $profileData->address}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Photo</label>
                                    <input type="file" name="photo" class="form-control" id="image" autocomplete="off" placeholder="Username"
                                    value="{{ $profileData->photo}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label"></label>
                                <div>
                                    <img id="showImage" class="wd-80 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
                                </div>
                            </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username"
                                    value="{{ $profileData->password}}">
                                </div>
                                
                               

                    
                                  <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                      <label class="form-check-label" for="exampleCheck1">
                                          Remember me
                                      </label>
                                  </div>
                                  <button type="submit" class="btn btn-primary me-2">Save changes</button>
                              </form>

            </div>
          </div>
      </div>
    </div>

        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            })
        </script>

@endsection