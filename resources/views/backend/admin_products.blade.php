@extends('backend.admin_master')
@section('product_select','active')
@section('container')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Table</h1> 
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
                <h3 class="card-title"><a class="btn btn-block bg-gradient-info" href="{{route('admin.addProducts')}}">Add Product</a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.L. No.</th>
                    <th>Product</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Buttons</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $pro)
                  <tr>
                    <td>{{$pro->id}}</td>
                    <td>{{$pro->product_name}}</td>
                    <td>{{$pro->slug}}</td>
                    <td>{{$pro->price}}</td>
                    <td>{{$pro->desc}}</td>
                    <td>@if($pro->image!='')
                      <img width="100px" src="{{asset('storage/media/'.$pro->image)}}"/>
                    @endif</td>
                    <td>
                    @if($pro->status==0)
                      <a href="{{url('admin/products/status/1')}}/{{$pro->id}}"><button
                      class="btn btn-warning">Deactive</button>&nbsp;
                      @elseif($pro->status==1)
                      <a href="{{url('admin/products/status/0')}}/{{$pro->id}}"><button
                      class="btn btn-info">Active</button>&nbsp;
                    @endif
                      <a href="" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>&nbsp
                      <a href="{{route('admin.editProduct',$pro->id)}}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>&nbsp
                    <a href="{{route('admin.deleteProduct',$pro->id)}}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></a></td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.L. No.</th>
                    <th>Product</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Buttons</th>
                  </tr>
                  </tfoot>
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
