<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('saint.css')

    <style>
        #head{
            font-weight:bold;
            padding-bottom: 20px;
        }
        #norma input{
            color:black;
        }

        #norma input:focus {
        background-color: white;
        border-color: #999999;
    }

    </style>
    

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('saint.sidebar')
      <!-- partial -->
     @include('saint.header')

     <div class="main-panel">
        <div class="content-wrapper">


        <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
              @if(session()->has('message'))
             <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                {{session()->get('message')}}
           
             </div>

          @endif

                <div class="card">
                  <div class="card-body">
                    <h4 id="head">Send email to {{$orders->email}}</h4>
                    <form action="{{url('send_customer_email', $orders->id )}}" class="forms-sample" id="norma" method="POST">
                        @csrf

                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label" >Email Greeting</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="greeting" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email Firstline</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="firstline" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Email Body</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  name="body" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Email Button name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  name="button" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Email Url</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="url" placeholder="">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Email Lastline</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  name="lastline" placeholder="">
                        </div>
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Remember me </label>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Send Email</button>
                    </form>
                  </div>
                </div>
              </div>




      
 
        </div>
    </div>
    <!-- plugins:js -->
    @include('saint.script')
    <!-- End custom js for this page -->
  </body>
</html>