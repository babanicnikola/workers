@extends('layout') 
    @section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"></h1>
                <p class="mb-4"></p>
      
                <!--  -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add new employee</h6>
                  </div>
                  <div class="card-body">
                      <form action="{{ URL::to('/employees/store')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <label class="profileLabels" for="name">Name:</label>
                            <input class="profileInputs" name="name" type="text" required><br>
                            <label class="profileLabels" for="position">Position:</label>
                            <input class="profileInputs" name="position" type="text" required><br>
                            <label class="profileLabels" for="office">Office:</label>
                            <input class="profileInputs" name="office" type="text" required><br>
                            <label class="profileLabels" for="age">Age:</label>
                            <input class="profileInputs" name="age" type="number" required><br>
                            <label class="profileLabels" for="start_date">Start date:</label>
                            <input class="profileInputs" name="start_date" type="date" required><br>
                            <label class="profileLabels" for="salary">Salary:</label>
                            <input class="profileInputs" name="salary" type="number" required><br>
                            <button class="profileSubmit" type="submit">Create</button>
                      </form>
                  </div>
                </div>
      
          </div>
          <!-- /.container-fluid --> 
              <!-- Bootstrap core JavaScript-->

@endsection
                
  