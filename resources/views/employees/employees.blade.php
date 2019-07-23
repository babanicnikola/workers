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
                <tr class="rw" data-target="#editModal" data-id="{{ $post->id }}">
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
        <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" name="modal_id" id="modal_id" hidden value=""/><br>
          <input type="text" class="border-bottom-success" name="name" id="name" value=""/>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-secondary btn-icon-split" data-dismiss="modal">
                <span class="icon text-white-50">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Close</span>
            </a>
            <a href="#" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-trash"></i>
                </span>
                <span class="text">Fire</span>
            </a>
            <a href="#" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
                </span>
                <span class="text">Save changes</span>
            </a>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
  //------------------------------------------
  $(".rw").dblclick(function(){
    var product_id = $(this).data('id');
    $.get("{{ url('/employees/edit') }}" +'/' + product_id, function (data) {
      $('.modal-header').html("Edit employee");
      $('#editModal').modal('show');
      $("#name").removeClass("border-bottom-warning");  
      $("#name").addClass("border-bottom-success");
      $('#modal_id').val(data.id);
      $('#name').val(data.name);
    });
  });

  $("#name").on("change paste keyup", function() {
    $("#name").removeClass("border-bottom-success"); 
    $("#name").addClass("border-bottom-warning"); 
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