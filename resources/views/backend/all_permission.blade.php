@extends('admin.admin_dashboard')
@section('admin')

  <div class="page-content">

    <a href="{{ route('add.permission') }}" class="btn btn-inverse-success" >Add Permission</a>&nbsp; &nbsp; &nbsp;
    <a href="{{ route('import.permission') }}" class="btn btn-inverse-warning" >Import</a>&nbsp; &nbsp; &nbsp;
    <a href="{{ route('add.permission') }}" class="btn btn-inverse-danger" >Export</a><br><br>

    <nav class="page-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
      </ol>
    </nav>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Data Table</h6>
            <div class="table-responsive">
              <div class="row">
                <div class="col-sm-12">
                  <table id="dataTableExample" class="table dataTable" aria-describedby="dataTableExample_info">
                <thead>
                  <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 195.163px;">Sr no.</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 306.925px;">Permission</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 146.275px;">Group Name</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 61.35px;">Action</th>
                </thead>

                @foreach($permissions as $permission)
                <tr class="odd">
                  <td class="sorting_1">{{$permission->id}}</td>
                  <td class="sorting_1">{{$permission->name}}</td>
                    <td class="sorting_1">{{$permission->group_name}}</td>
                    <td>
                      @if(Auth::user()->can('edit.type'))
                      <a href="{{route('edit.permission', $permission->id )}}" class="btn btn-inverse-warning" >Edit</a>
                      @endif
      
                      @if(Auth::user()->can('delete.type'))
                      <a href="{{route('delete.permission', $permission->id )}}" class="btn btn-inverse-danger" id="delete" >Delete</a>
                      @endif
      
                  </tr>
                  @endforeach

                  </table>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection