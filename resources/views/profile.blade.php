@extends('layout') 
    @section('content')
        <div class="container-fluid"><!-- Container fluid BEGINNING -->
          <h1 class="h3 mb-2 text-gray-800"></h1><!-- Page Heading -->
          <p class="mb-4"></p>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Your profile management</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form action="">
                  <table>
                    <tr>
                      <th><label for="user">Name:</label></th>
                      <th><input class="profileInputs" name="user" type="text" value="{{ Auth::user()->name }}"></th>
                    </tr>
                    <tr>
                      <th><label for="email">Email:</label></th>
                      <th><input class="profileInputs" name="email" type="email" value="{{ Auth::user()->email }}"></th>
                    </tr>
                    <tr>
                      <th><label for="password">Password:</label></th>
                      <th><input class="profileInputs" name="password" type="password" readonly value="{{ Auth::user()->password }}"></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th>
                        <a href="#" class="btn btn-success btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                          </span>
                          <span class="text">Save Changes</span>
                        </a>
                      </th>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
          </div>
      </div><!-- Container fluid END -->
@endsection