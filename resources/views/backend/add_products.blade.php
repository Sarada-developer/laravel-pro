@extends('backend.admin_master')
@section('container')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
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
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('admin.insertProduct')}}" enctype="multipart/form-data">
              @csrf 
                <div class="card-body">
                  <div class="form-group col-md-6">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" class="form-control" required  placeholder="Enter Product Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Product Category</label>
                   <select class="form-control select2" name="category" style="width: 100%;" >
                    <option value="" selected="selected">--- Select Category---</option>
                    @foreach(App\Models\Category::orderBy('category_name','asc')->get() as $cate)
                    <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" required  placeholder="Enter Product Slug">
                  </div>
                <!-- <div class="input-group hdtuto control-group lst increment col-md-6" >
                  <input type="file" name="pro_img[]" class="myfrm form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                  </div>
                </div>
                <div class="clone hide">
                  <div class="hdtuto control-group lst input-group col-md-6" style="margin-top:10px">
                    <input type="file" name="pro_img[]" class="myfrm form-control">
                    <div class="input-group-btn"> 
                      <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                  </div>
                </div> -->
                <br>
                <div class="form-group col-md-6">
                    <label for="brand">Product Brand</label>
                    <input type="text" name="brand" class="form-control" required  placeholder="Enter Product Brand">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="model">Product Model</label>
                    <input type="text" name="model" class="form-control" required  placeholder="Enter Product Model">
                  </div>
                <div class="form-group col-md-6">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" class="form-control" required  placeholder="Enter Product Price">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="short_desc">Short Description</label>
                    <textarea name="short_desc" class="form-control" required  placeholder="Enter Short Description"></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="desc">Product Description</label>
                    <textarea name="desc" class="form-control" required  placeholder="Enter Product Description"></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="keywords">Product Keywords</label>
                    <input type="text" name="keywords" class="form-control" required  placeholder="Enter Product Keywords">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="technical_specification">Technical Specification</label>
                    <input type="text" name="technical_specification" class="form-control" required  placeholder="Enter Product Technical Specification">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="uses">Uses</label>
                    <textarea name="uses" class="form-control" required  placeholder="Enter Product Uses"></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="warranty">warranty</label>
                    <input type="text" name="warranty" class="form-control" required  placeholder="Enter Product Warranty">
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