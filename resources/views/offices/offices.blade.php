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
            <h6 class="m-0 font-weight-bold text-primary">Offices</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Office name</th>
                    <th>City</th>
                    <th>Street</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Office name</th>
                    <th>City</th>
                    <th>Street</th>
                  </tr>
                </tfoot>
                <tbody>
                  
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- Page Content END--> 
  <!-- Edit Modal -->
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
          <form action="{{ URL::to('/employees/update/')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="id" id="modal_id" readonly hidden value=""/>
            <label class="profileLabels" for="name">Name:</label>
              <input type="text" class="profileInputs border-bottom-success" name="name" id="name" required/><br>
            <label class="profileLabels" for="position">Position:</label>
              <input type="text" class="profileInputs border-bottom-success" name="position" id="position" required/><br>
            <label class="profileLabels" for="office">Office:</label>
              <input type="text" class="profileInputs border-bottom-success" name="office" id="office" required/><br>
            <label class="profileLabels" for="age">Age:</label>
              <input type="number" class="profileInputs border-bottom-success" name="age" id="age" required/><br>
            <label class="profileLabels" for="start_date">Start date:</label>
              <input type="date" class="profileInputs border-bottom-success" name="start_date" id="start_date" required/><br>
            <label class="profileLabels" for="salary">Salary:</label>
              <input type="number" class="profileInputs border-bottom-success" name="salary" id="salary" required/><br>
            
            <!-- MODAL FOOTER START -->
            <div class="modal-footer">
              <a href="#" class="btn btn-secondary btn-icon-split" data-dismiss="modal">
                  <span class="icon text-white-50">
                    <i class="fas fa-arrow-right"></i>
                  </span>
                  <span class="text">Close</span>
              </a>
              <a href="#" class="btn btn-danger btn-icon-split" id="modal_del_btn">
                  <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                  </span>
                  <span class="text">Fire</span>
              </a>
              <a href="#" class="btn btn-success btn-icon-split" onclick="$(this).closest('form').submit()">
                  <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                  </span>
                  <span class="text">Save changes</span>
              </a>
            </div>
          <!-- MODAL FOOTER END -->
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- EDIT MODAL END -->
<script type="text/javascript">
  //------------------------------------------
  $(".rw").dblclick(function(){
    var emp_id = $(this).data('id');
    $.get("{{ url('/employees/edit') }}" +'/' + emp_id, function (data) {
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
      $("#modal_del_btn").attr("data-confirm", "Are you sure?");
      $("#modal_del_btn").attr("data-method", "delete");
      $("#modal_del_btn").attr("href", "/employees/delete/"+emp_id);

      $('#modal_id').val(data.id);
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