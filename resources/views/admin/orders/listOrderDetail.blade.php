@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Detail list</h1>
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
                    <th>order_id</th>
                    <th>product_id </th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    @foreach ($order_details as $order_detail)
                    <tr> 
                    <td>{{ $order_detail->id }}</td>
                    <td>{{ $order_detail->order_id }}</td>
                    <td>{{ $order_detail->product_id }}</td>
                    <td>{{ $order_detail->quantity }}</td>
                    <td>{{ $order_detail->price }}</td>
                    <td>{{ $order_detail->created_at }}</td>
                    <td>{{ $order_detail->updated_at }}</td>
                    <td>
                        {{-- <a href="{{ route('admin.order_detail.detail',$order_detail->id) }}" class="btn btn-info">detail</a> --}}
                        {{-- <a href="{{ route('admin.order_detail.edit',$order_detail->id) }}" class="btn btn-warning">edit</a> --}}
                        <a href="{{ route('admin.order_detail.delete',$order_detail->id) }}" class="btn btn-danger">delete</a>
                        
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
