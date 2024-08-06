@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>order list</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
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
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($orderDetails as $orderDetail)
            
                    <td>{{ $orderDetail->id }}</td>
                    <td><img src="{{ asset($orderDetail->product->main_image) }}" alt="" width="100px"></td>
                    <td>{{ $orderDetail->product->name }}</td>
                    <td>{{ $orderDetail->quantity }}</td>
                    <td>{{ number_format($orderDetail->price,3) }}đ</td>
                    <td>
                      <a href="{{ route('admin.order-detail.edit',$orderDetail->id) }}" class="btn btn-warning">edit</a>
                      <a href="{{ route('admin.order-detail.delete',$orderDetail->id) }}" class="btn btn-danger">delete</a></td>
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
