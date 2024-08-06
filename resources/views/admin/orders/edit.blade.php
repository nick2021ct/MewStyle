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
                <h3 class="card-title">Update order</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.order.edit',$order->id) }}" enctype="multipart/form-data">
                @csrf
                
                <div class="card-body">
               
                 
                  

                  <div class="form-group">
                    <label for="user_fullname">User Fullname</label>
                    <input  type="text" name="user_fullname" class="form-control" id="user_fullname" value="{{ $order->user_fullname }}">
                  </div>
                  @error('user_fullname')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror

                  <div class="form-group">
                    <label for="user_email">User Email</label>
                    <input  type="text" name="user_email" class="form-control" id="user_email" value="{{ $order->user_email }}">
                  </div>
                  @error('user_email')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror

                  <div class="form-group">
                    <label for="user_phone">User Phone</label>
                    <input  type="text" name="user_phone" class="form-control" id="user_phone" value="{{ $order->user_phone }}">
                  </div>
                  @error('user_phone')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror

                  <div class="form-group">
                    <label for="name">User Address</label>
                    <input  type="text" name="user_address" class="form-control" id="user_address" value="{{ $order->user_address }}">
                  </div>
                  @error('user_address')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror

                  <div class="form-group">
                    <label for="description">Note</label>
                    <textarea name="note" id="" cols="30" rows="10" class="form-control" id="note">{{ old('note', $order->note) }}</textarea>
                  </div>
                  @error('note')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror

                  <div class="form-group">
                    <label for="total_money">Total Money</label>
                    <input  type="text" name="total_money" class="form-control" id="total_money" value="{{ $order->total_money }}">
                  </div>
                  @error('total_money')
                      <span style="color: yellow"> {{ $message }}</span>
                  @enderror
                
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                      @foreach ($statuses as $value => $label)
                      <option value="{{ $value }}" {{ $order->status == $value ? 'selected' : '' }}>
                          {{ $label }}
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

