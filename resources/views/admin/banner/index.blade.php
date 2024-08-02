@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banner list</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('admin.banner.add') }}" class="btn btn-success">Create</a>
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
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Product Image</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Price</th>
                    <th>Sale price</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    @foreach ($banners as $banner)
                    <tr> 
                    <td>{{ $banner->id }}</td>
                    <td><img width="200px" src="{{ asset($banner->image) }}" alt=""></td>
                    <td><img width="200px" src="{{ asset($banner->product_image) }}" alt=""></td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ $banner->content }}</td>
                    <td>{{ $banner->price }}</td>
                    <td>{{ $banner->sale_price }}</td>
                    <td>{{ $banner->description }}</td>
                    <td><a href="{{ route('admin.banner.edit',$banner->id) }}" class="btn btn-warning">edit</a>
                      <a href="{{ route('admin.banner.delete',$banner->id) }}" class="btn btn-danger">delete</a></td>
                  </tr>
                    @endforeach
                    
                 
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
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
@endsection
