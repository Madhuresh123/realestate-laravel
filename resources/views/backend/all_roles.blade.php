@extends('admin.admin_dashboard')
@section('admin')

<div class="card">
    <div class="card-body">
      <h6 class="card-title">Data Table</h6>
      <td><a href="{{ route('add.roles') }}" class="btn btn-inverse-success" >Add Roles</a></td>
      <div class="table-responsive">
        <div id="dataTableExample_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
          <div class="row"><div class="col-sm-12 col-md-12">
          <div class="row"><div class="col-sm-12"><table id="dataTableExample" class="table dataTable no-footer" aria-describedby="dataTableExample_info">
          <thead>
            <tr>
              <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 195.163px;">Sr.</th>
              <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 195.163px;">Role Name</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 306.925px;">Action</th>

          </thead>

          <tbody>    
            @foreach($roles as $role)
          <tr class="odd">
            <td class="sorting_1">{{$role->id}}</td>
            <td class="sorting_1">{{$role->name}}</td>
              <td>
                @if(Auth::user()->can('edit.type'))
                <a href="{{route('edit.roles', $role->id )}}" class="btn btn-inverse-warning" >Edit</a>
                @endif
                @if(Auth::user()->can('delete.type'))
                <a href="{{route('delete.roles', $role->id )}}" class="btn btn-inverse-danger" >Delete</a>
                @endif

            </tr>
            @endforeach
        </tbody>
        </table></div></div><div class="row">
            <div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTableExample_info" role="status" aria-live="polite">Showing 1 to 10 of 22 entries</div></div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTableExample_paginate">
                    <ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTableExample_previous">
                        <a href="#" aria-controls="dataTableExample" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="dataTableExample" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTableExample" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTableExample" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                        <li class="paginate_button page-item next" id="dataTableExample_next"><a href="#" aria-controls="dataTableExample" data-dt-idx="4" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
      </div>
    </div>
  </div>
@endsection