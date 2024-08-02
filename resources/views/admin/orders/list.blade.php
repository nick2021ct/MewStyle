@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order list</h1>
          </div>
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('admin.product.add') }}" class="btn btn-success">Create</a>
            </ol>
          </div> --}}
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
                    <th>user_id</th>
                    <th>user_fullname</th>
                    <th>user_email</th>
                    <th>user_phone</th>
                    <th>user_address</th>
                    <th>status</th>
                    <th>total_money</th>
                    <th>total_quantity</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    @foreach ($orders as $order)
                    <tr> 
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->user_fullname }}</td>
                    <td>{{ $order->user_email }}</td>
                    <td>{{ $order->user_phone }}</td>
                    <td>{{ $order->user_address }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->total_money }}</td>
                    <td>{{ $order->total_quantity }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.order.detail',$order->id) }}" class="btn btn-info">detail</a>
                        {{-- <a href="{{ route('admin.order.edit',$order->id) }}" class="btn btn-warning">edit</a> --}}
                        <a href="{{ route('admin.order.delete',$order->id) }}" class="btn btn-danger">delete</a>
                        
                    </td>
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
