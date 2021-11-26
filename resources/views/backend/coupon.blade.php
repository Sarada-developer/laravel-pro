@extends('backend.admin_master')
@section('container')
{{session('message')}}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupon Table</h1> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><a class="btn btn-block bg-gradient-info" href="{{route('admin.addCoupon')}}">Add Coupon</a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.L. No.</th>
                    <th>Title</th>
                    <th>Code</th>
                    <th>Value</th>
                    <th>Buttons</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $cou)
                  <tr>
                    <td>{{$cou->id}}</td>
                    <td>{{$cou->title}}</td>
                    <td>{{$cou->code}}</td>
                    <td>{{$cou->value}}</td>
                    <td> <a href="{{route('admin.editCoupon',$cou->id)}}" class="btn btn-success"><i class="far fa-edit"></i></a>
                    <a href="{{route('admin.deleteCoupon',$cou->id)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
