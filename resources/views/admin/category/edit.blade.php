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
                <h3 class="card-title">Create Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input  type="file" name="image" class="form-control" id="image" placeholder="image">
                  </div>
                  @error('image')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input  type="name" name="name" class="form-control" id="name" placeholder="name" value="{{ $categories->name }}">
                  </div>
                  @error('name')
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

