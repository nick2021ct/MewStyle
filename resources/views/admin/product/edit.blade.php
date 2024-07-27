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
                <h3 class="card-title">Update product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.product.edit',$product->id) }}" enctype="multipart/form-data">
                @csrf
                
                <div class="card-body">
                  
                        @foreach ($product->images as $proImage)
                            <img width="300px" src="{{ asset($proImage->image) }}" alt="">
                        @endforeach
                  <div class="form-group">
                    <label for="images">Images</label>
                    <input  type="file" name="images[]" class="form-control" id="images" placeholder="images" multiple>
                  </div>
                  @error('images')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror
                 
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input  type="text" name="name" class="form-control" id="name" value="{{ $product->name }}">
                  </div>
                  @error('name')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror

                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" id="description">{{ old('description', $product->description) }}</textarea>
                  </div>
                  @error('description')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input  type="text" name="price" class="form-control" id="price" value="{{ $product->price }}">
                  </div>
                  @error('price')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror
                  <div class="form-group">
                    <label for="sale_price">Sale Price</label>
                    <input  type="text" name="sale_price" class="form-control" id="sale_price" value="{{ $product->sale_price }}">
                  </div>
                  @error('sale_price')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror
                  <div class="form-group">
                    <label for="sale_price">Category</label>
                    <select name="category_id" class="form-control" id="category_id">
                      @foreach ($category as $cate)
                      <option value="{{ $cate->id }}" {{ $cate->id == $product->category_id ? 'selected' : '' }}>
                        {{ $cate->name }}
                    </option>                      
                    @endforeach
                    </select>
                  </div>
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

