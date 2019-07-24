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
          <!--<input type="text" name="modal_id" id="modal_id" hidden value=""/><br>-->
          <form action="{{ URL::to('/employees/update/')}}" method="POST">
            @csrf
            @method('PUT')
            <label class="profileLabels" for="name">Name:</label>
              <input type="text" class="border-bottom-success" name="name" id="name" required/><br>
            <label class="profileLabels" for="position">Position:</label>
              <input type="text" class="border-bottom-success" name="position" id="position" required/><br>
            <label class="profileLabels" for="office">Office:</label>
              <input type="text" class="border-bottom-success" name="office" id="office" required/><br>
            <label class="profileLabels" for="age">Age:</label>
              <input type="number" class="border-bottom-success" name="age" id="age" required/><br>
            <label class="profileLabels" for="start_date">Start date:</label>
              <input type="date" class="border-bottom-success" name="start_date" id="start_date" required/><br>
            <label class="profileLabels" for="salary">Salary:</label>
              <input type="number" class="border-bottom-success" name="salary" id="salary" required/><br>
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
      </form>
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
      $("#position").removeClass("border-bottom-warning");  
      $("#position").addClass("border-bottom-success");
      $("#office").removeClass("border-bottom-warning");  
      $("#office").addClass("border-bottom-success");
      $("#age").removeClass("border-bottom-warning");  
      $("#age").addClass("border-bottom-success");
      $("#start_date").removeClass("border-bottom-warning");  
      $("#start_date").addClass("border-bottom-success");
      $("#salary").removeClass("border-bottom-warning");  
      $("#salary").addClass("border-bottom-success");

      //$('#modal_id').val(data.id);
      $('#name').val(data.name);
      $('#position').val(data.position);
      $('#office').val(data.office);
      $('#age').val(data.age);
      $('#start_date').val(data.start_date);
      $('#salary').val(data.salary);
    });
  });

  $("#name").on("change paste keyup", function() {
    $("#name").removeClass("border-bottom-success"); 
    $("#name").addClass("border-bottom-warning"); 
  });

  $("#position").on("change paste keyup", function() {
    $("#position").removeClass("border-bottom-success"); 
    $("#position").addClass("border-bottom-warning"); 
  });

  $("#office").on("change paste keyup", function() {
    $("#office").removeClass("border-bottom-success"); 
    $("#office").addClass("border-bottom-warning"); 
  });

  $("#age").on("change paste keyup", function() {
    $("#age").removeClass("border-bottom-success"); 
    $("#age").addClass("border-bottom-warning"); 
  });

  $("#start_date").on("change paste keyup", function() {
    $("#start_date").removeClass("border-bottom-success"); 
    $("#start_date").addClass("border-bottom-warning"); 
  });

  $("#salary").on("change paste keyup", function() {
    $("#salary").removeClass("border-bottom-success"); 
    $("#salary").addClass("border-bottom-warning"); 
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