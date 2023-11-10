@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <div class="row profile-body">

      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="card">
            <div class="card-body">
                              <h6 class="card-title">Add Permission</h6>

             <form method="POST" action="{{route('store.permission')}}" class="forms-sample">
                    @csrf
                                  <div class="mb-3">
                                      <label for="exampleInputUsername1" class="form-label">Permission Name</label>
                                      <input type="text" name="name" class="form-control" id="name" autocomplete="off">
                                      @error('name')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Group Name</label>
                                    <select name="group_name" class="form-select">
                                        <option selected="" disabled="" >Select Group</option>
                                        <option value="type" >Property Types</option>
                                        <option value="state" >State</option>
                                        <option value="amenities" >Amenities</option>
                                        <option value="property" >Property</option>
                                        <option value="history" >Package History</option>
                                        <option value="message" >Package Message</option>
                                        <option value="testimonials" >Testimonials</option>
                                        <option value="agent" >Manage Agent</option>
                                        <option value="category" >Blog Category</option>
                                        <option value="comment" >Blog Comment</option>
                                        <option value="smtp" >SMTP settings</option>
                                        <option value="site" >Site settings</option>
                                        <option value="role" >Role & Permission</option>
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