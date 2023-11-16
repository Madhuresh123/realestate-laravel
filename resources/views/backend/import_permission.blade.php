@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <a href="{{ route('export') }}" class="btn btn-inverse-danger" >Download Excel file</a> <br><br>

    <div class="row profile-body">
        
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="card">
            <div class="card-body">
                              <h6 class="card-title">Import Permission</h6>

             <form method="POST" action="{{route('import')}}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                                  <div class="mb-3">
                                      <label for="exampleInputUsername1" class="form-label">Xlsx File Import</label>
                                      <input type="file" name="import_file" class="form-control" id="name" autocomplete="off">
                                      @error('name')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                                  <button type="submit" class="btn btn-inverse-warning">Upload</button>
                </form>
            </div>
          </div>
      </div>
    </div>

        </div>


@endsection