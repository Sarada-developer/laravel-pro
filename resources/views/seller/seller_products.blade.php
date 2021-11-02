@extends('seller.seller_master')
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
                <h3 class="card-title"><a class="btn btn-block bg-gradient-info" href="{{route('seller.addProducts')}}">Add Product</a></h3>
                <!-- <button type="button" class="btn btn-block bg-gradient-info">Add Category</button> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.L. No.</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>SKU</th>
                    <th>Slug</th>
                    <th>Stock</th>
                    <!-- <th>Created At</th>
                    <th>Updated At</th> -->
                    <th>Buttons</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button type="button" class="btn btn-block bg-gradient-success">Success</button> <button type="button" class="btn btn-block bg-gradient-danger">Danger</button></td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.L. No.</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>SKU</th>
                    <th>Slug</th>
                    <th>Stock</th>
                    <!-- <th>Created At</th>
                    <th>Updated At</th> -->
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
