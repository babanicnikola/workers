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
                    <h6 class="m-0 font-weight-bold text-primary">Add new office</h6>
                  </div>
                  <div class="card-body">
                      <form action="{{ URL::to('/offices/store')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <label class="profileLabels" for="name">Name:</label>
                            <input class="profileInputs" name="name" type="text" required><br>
                            <label class="profileLabels" for="city">City:</label>
                            <input class="profileInputs" name="city" placeholder="Optional" type="text"><br>
                            <label class="profileLabels" for="street">Street:</label>
                            <input class="profileInputs" name="street" placeholder="Optional" type="text"><br>
                            <button class="profileSubmit" type="submit">Create</button>
                      </form>
                  </div>
                </div>
      
          </div>
          <!-- /.container-fluid --> 
              <!-- Bootstrap core JavaScript-->

@endsection
                
  