@extends('admin.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.banner.add') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="card-body">
                  <div class="form-group">
                    <label for="images">Images</label>
                    <input  type="file" name="image" class="form-control" id="image" placeholder="image" multiple>
                  </div>
                  @error('image')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror

                  <div class="form-group">
                    <label for="images">Product Images</label>
                    <input  type="file" name="product_image" class="form-control" id="product_image" placeholder="product_image" multiple>
                  </div>
                  @error('product_image')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror
                  
                  <div class="form-group">
                    <label for="name">Title</label>
                    <input  type="text" name="title" class="form-control" id="title" placeholder="title">
                  </div>
                  @error('title')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror
                  <div class="form-group">
                    <label for="content">Content</label>
                    <input  type="text" name="content" class="form-control" id="content" placeholder="content">
                  </div>
                  @error('content')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input  type="text" name="price" class="form-control" id="price" placeholder="price">
                  </div>
                  @error('title')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror
                  <div class="form-group">
                    <label for="price">Sale Price</label>
                    <input  type="text" name="sale_price" class="form-control" id="price" placeholder="sale_price">
                  </div>
                  @error('sale_price')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror

                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" id="description" placeholder="description"></textarea>
                  </div>
                  @error('description')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           

          
           

          <!--/.col (left) -->
          <!-- right column -->
          
       
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

