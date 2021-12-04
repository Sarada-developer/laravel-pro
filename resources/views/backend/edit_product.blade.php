@extends('backend.admin_master')
@section('container')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
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

              <form method="POST" action="{{route('product.manage_product_process',$product->id)}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="product_name">Product</label>
                    <input type="text" value="{{$product->product_name}}" name="product_name" class="form-control">
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Category</label>
                   <select class="form-control select2" name="category" style="width: 100%;" >
                    <option value="" selected="selected">--- Select Category---</option>
                    <!-- @foreach(App\Models\Category::orderBy('category_name','asc')->get() as $cate)
                    <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                    @endforeach -->

                    @foreach(App\Models\Category::orderBy('category_name','asc')->get() as $category)
                <option value="{{$category->id}}" {{$category->id == $product->category ? 'selected' : ''}}>{{$category->category_name}}</option>
                    @endforeach
                    
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{$product->slug}}">
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" value="{{$product->image}}">
                  </div>
                  <div class="form-group">
                    <label for="brand">Product Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{$product->brand}}">
                  </div>
                  <div class="form-group">
                    <label for="model">Product Model</label>
                    <input type="text" name="model" class="form-control" value="{{$product->model}}">
                  </div>
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" class="form-control" value="{{$product->price}}">
                  </div>
                  <div class="form-group">
                    <label for="short_desc">Short Description</label>
                    <textarea name="short_desc" class="form-control">{{$product->short_desc}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="desc">Product Description</label>
                    <textarea name="desc" class="form-control">{{$product->desc}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="keywords">Product Keywords</label>
                    <input type="text" name="keywords" class="form-control"value="{{$product->keywords}}">
                  </div>
                  <div class="form-group">
                    <label for="technical_specification">Technical Specification</label>
                    <input type="text" name="technical_specification" class="form-control" value="{{$product->technical_specification}}">
                  </div>
                  <div class="form-group">
                    <label for="uses">Uses</label>
                    <textarea name="uses" class="form-control">{{$product->uses}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="warranty">warranty</label>
                    <input type="text" name="warranty" class="form-control"value="{{$product->warranty}}">
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
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
       
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection