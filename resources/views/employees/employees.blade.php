@extends('layout') 
    @section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"></h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Employees</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($results as $post)
                <tr id="rw" data-target="#editModal" data-id="{{ $post->id }}">
                      <td > 
                        {{ $post->name }} 
                      </td>
                      <td> 
                          {{ $post->position }} 
                      </td>
                      <td> 
                        {{ $post->office }} 
                      </td>
                      <td> 
                          {{ $post->age }} 
                      </td>
                      <td> 
                          {{ $post->start_date }} 
                      </td>
                      <td> 
                          {{ $post->salary }} 
                      </td>
                  </tr>  
                  @endforeach                
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid --> 
      <!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Employee details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <input type="text" name="name" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
  
  $("table td").dblclick(function(){
    $("#editModal").modal();
  });

//attach an onclick event handler to the table rows 
$("#dataTable tbody tr").click(function(){
  $("tr").css('background-color', 'white');
  $("tr").css('color', '#858796');
	//change the color of the selected row
	$(this).css('background-color', '#3257CA');
	$(this).css('color', '#fff');
});
</script>
@endsection