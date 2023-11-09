@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <div class="row profile-body">

      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="card">
            <div class="card-body">
                              <h6 class="card-title">Add Property</h6>

             <form method="POST" action="{{route('property.addtype.store')}}" class="forms-sample">
                    @csrf
                                  <div class="mb-3">
                                      <label for="exampleInputUsername1" class="form-label">Type Name</label>
                                      <input type="text" name="typename" class="form-control" id="typename" autocomplete="off">
                                      @error('typename')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Type Icon</label>
                                    <input type="text" name="typeicon" class="form-control" id="typeicon" autocomplete="off" >
                                    @error('typeicon')
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