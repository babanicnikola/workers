@extends('layout') 
    @section('content')
    <div class="container-fluid"><!-- Container Fluid BEGINING -->
        <h1 class="h3 mb-2 text-gray-800"></h1><!-- Page Heading -->
        <p class="mb-4"></p>

        <!-- DataTable -->
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
                    @foreach ($results as $post)
                    <tr class="rw" data-target="#editModal" data-id="{{ $post->id }}">
                      <td > 
                        {{ $post->name }} 
                      </td>
                      <td> 
                        {{ $post->city }} 
                      </td>
                      <td> 
                        {{ $post->street }} 
                      </td>
                    </tr>  
                    @endforeach 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div><!-- Container fluid END--> 

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
          <form action="{{ URL::to('/offices/update/')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="id" id="modal_id" readonly hidden value=""/>
            <label class="profileLabels" for="name">Name:</label>
            
            <input type="text" class="profileInputs" name="name" id="name" required/><br>
            <label class="profileLabels" for="position">City:</label>
            
            <input type="text" class="profileInputs" name="city" id="city" placeholder="Optional"/><br>
            <label class="profileLabels" for="office">Street:</label>
            
            <input type="text" class="profileInputs" name="street" id="street" placeholder="Optional"/><br>
            
            <div class="modal-footer"><!-- MODAL FOOTER COMMANDS -->
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
                  <span class="text">Delete</span>
              </a>
              <a href="#" class="btn btn-success btn-icon-split" onclick="$(this).closest('form').submit()">
                  <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                  </span>
                  <span class="text">Save changes</span>
              </a>
            </div><!-- MODAL FOOTER END -->
          </form>
        </div>
      </div>
    </div>
  </div><!-- EDIT MODAL END -->

<script type="text/javascript">
//Edit modal activation and data
  $(".rw").dblclick(function(){
    var emp_id = $(this).data('id');
    $.get("{{ url('/offices/edit') }}" +'/' + emp_id, function (data) {
      $('.modal-header').html("Edit office");
      $('#editModal').modal('show');

      $("#modal_del_btn").attr("data-confirm", "Are you sure?");
      $("#modal_del_btn").attr("data-method", "delete");
      $("#modal_del_btn").attr("href", "/offices/delete/"+emp_id);

//Modal data fields
      $('#modal_id').val(data.id);
      $('#name').val(data.name);
      $('#city').val(data.city);
      $('#street').val(data.street);
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