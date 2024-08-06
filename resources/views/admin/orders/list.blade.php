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
                    <th>User Fullname</th>
                    <th>User Email</th>
                    <th>User Address</th>
                    <th>User Phone</th>
                    <th>Payment method</th>
                    <th>Note</th>
                    <th>Total money</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach ($orders as $order)
            
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_fullname }}</td>
                    <td>{{ $order->user_email }}</td>
                    <td>{{ $order->user_address }}</td>
                    <td>{{ $order->user_phone }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <th>{{ $order->note }}</th>
                    <td>{{ number_format($order->total_money,3) }}đ</td>
                    <td>{{ $order->status }}</td>

                    <td style="width: 215px">
                      <a href="{{ route('admin.order-detail.list',$order->id) }}" class="btn btn-primary">Detail</a>
                      <a href="{{ route('admin.order.edit',$order->id) }}" class="btn btn-warning">edit</a>
                      <a href="{{ route('admin.order.delete',$order->id) }}" class="btn btn-danger">delete</a></td>
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
