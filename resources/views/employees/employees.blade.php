@extends('layout') 
    @section('content')
    <!-- Container fluid BEGINING -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"></h1>
        <p class="mb-4"></p>

        <!-- DataTable -->
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
                      <?php $off = DB::select('select name from offices where id = '.$post->office_id)?>
                      {{ $off[0]->name }} 
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
      <!-- Container Fluid END--> 
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
            <input type="text" class="profileInputs" name="name" id="name" required/><br>

            <label class="profileLabels" for="position">Position:</label>
            <input type="text" class="profileInputs" name="position" id="position" placeholder="Optional"/><br>

            <label class="profileLabels" for="office_id">Office:</label>
            <select class="selectStyle" required name="office_id" id="selectOfficeId">
                <?php $offi = DB::select('select * from offices where user_id = '.Auth::user()->id) ?>
              @foreach ($offi as $of)
                  <option value='{{ $of->id }}'> {{ $of->name }}</option>
              @endforeach
            </select><br>

            <label class="profileLabels" for="age">Age:</label>
            <input type="number" class="profileInputs" name="age" id="age" required placeholder="Optional"/><br>

            <label class="profileLabels" for="start_date">Start date:</label>
            <input type="date" class="profileInputs" name="start_date" id="start_date" required/><br>

            <label class="profileLabels" for="salary">Salary:</label>
            <input type="number" class="profileInputs" name="salary" id="salary" required/><br>
            
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
//Edit modal activation and data
  $(".rw").dblclick(function(){
    var emp_id = $(this).data('id');
    $.get("{{ url('/employees/edit') }}" +'/' + emp_id, function (data) {
      $('.modal-header').html("Edit employee");
      $('#editModal').modal('show');

      $("#modal_del_btn").attr("data-confirm", "Are you sure?");
      $("#modal_del_btn").attr("data-method", "delete");
      $("#modal_del_btn").attr("href", "/employees/delete/"+emp_id);
//Modal data fields
      $('#modal_id').val(data.id);
      $('#name').val(data.name);
      $('#position').val(data.position);
      $('#selectOfficeId').val(data.office_id);
      $('#age').val(data.age);
      $('#start_date').val(data.start_date);
      $('#salary').val(data.salary);
    });
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