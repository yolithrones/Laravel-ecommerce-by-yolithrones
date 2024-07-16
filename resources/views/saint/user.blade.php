<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('saint.css')

    <style>
        .title_sz{
            text-align:center;
            font-size:25px;
            font-weight:bold;
            padding-bottom:40px;
        }


     
    </style>
    

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('saint.sidebar')
      <!-- partial -->
     @include('saint.header')
        <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <h1 class="title_sz">All Saints Clients</h1>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Users table</h4>
                    <p class="card-description"> View users <code>.table-dark</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> User ID </th>
                            <th> First name </th>
                            <th> Last name </th>
                            <th> Email </th>
                            <th> User Type</th>
                            <th> Phone Number</th>
                            <th> Country</th>
                            <th> Town</th>
                            <th> State</th>
                            <th> Post Code</th>
                            <th> Address</th>
                            <th> Apartment</th>
                            <th> Email Verified_at</th>
                            <th> Password</th>
                            <th> Two Factor Secret</th>
                            <th> Two Factor Recovery Codes</th>
                            <th> Two Factor Confirm_at</th>
                            <th> Remember Token</th>
                            <th> Current Team_id</th>
                            <th> Profile Photo path</th>
                            <th> Created At</th>
                            <th> Updated At</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                          <tr>
                            <td> {{$user->id}} </td>
                            <td> {{$user->name}} </td>
                            <td> {{$user->lastName}} </td>
                            <td> {{$user->email}} </td>
                            <td> {{$user->usertype}} </td>
                            <td> {{$user->phone}} </td>
                            <td> {{$user->country}} </td>
                            <td> {{$user->town}} </td>
                            <td> {{$user->state}} </td>
                            <td> {{$user->postCode}} </td>
                            <td> {{$user->address}} </td>
                            <td> {{$user->apartment}} </td>
                            <td> {{$user->email_verified_at}} </td>
                            <td> {{$user->password}} </td>
                            <td> {{$user->two_factor_secret}} </td>
                            <td> {{$user->two_factor_recovery_codes}} </td>
                            <td> {{$user->two_factor_confirm_at}} </td>
                            <td> {{$user->remeber_token}} </td>
                            <td> {{$user->current_team_id}} </td>
                            <td> {{$user->profile_photo_path}} </td>
                            <td> {{$user->created_at}} </td>
                            <td> {{$user->updated_at}} </td>
                          </tr>

                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
         <div>
    <div>        
     
    <!-- plugins:js -->
    @include('saint.script')
    <!-- End custom js for this page -->
    
  </body>
</html>