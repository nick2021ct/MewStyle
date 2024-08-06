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
                <h3 class="card-title">Update Order detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.order-detail.edit',$orderDetail->id) }}" enctype="multipart/form-data">
                @csrf
                
                <div class="card-body">

                  <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input  type="text" name="quantity" class="form-control" id="quantity" value="{{ $orderDetail->quantity }}">
                  </div>
                  @error('quantity')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror

                  <div class="form-group">
                    <label for="user_email">Price</label>
                    <input  type="text" name="price" class="form-control" id="price" value="{{ $orderDetail->price }}">
                  </div>
                  @error('price')
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

