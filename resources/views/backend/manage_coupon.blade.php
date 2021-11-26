@extends('backend.admin_master')
@section('container')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Coupon</h1>
            <a href="{{route('all.coupon')}}">
                <button type="button" class="btn btn-success">Back</button>
            </a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">


            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
            </div>
            @endif

              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('coupon.manage_coupon_process')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Coupon title</label>
                    <input type="title" name="title" class="form-control" id="title" value="{{$title}}" placeholder="Enter coupon title">
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                <label for="code">Coupon code</label>
                    <input type="code" name="code" class="form-control" id="code" value="{{$code}}" placeholder="Enter coupon code">
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="value">Coupon value</label>
                    <input type="value" name="value" class="form-control" id="value" value="{{$value}}" placeholder="Enter coupon value">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection