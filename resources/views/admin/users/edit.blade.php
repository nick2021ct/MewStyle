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
                    <h3 class="card-title">Create user</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.user.edit',$user->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{ $user->name }}">
                        </div>
                        @error('name')
                            <span style="color: yellow"> {{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="phone" value="{{ $user->phone }}">
                        </div>
                        @error('phone')
                            <span style="color: yellow"> {{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="email" value="{{ $user->email }}">
                        </div>
                        @error('email')
                            <span style="color: yellow"> {{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="address" value="{{ $user->address }}">
                        </div>
                        @error('address')
                            <span style="color: yellow"> {{ $message }}</span>
                        @enderror
                        

                        <div class="form-group">
                            <label for="type">Role</label>
                            <select name="type" class="form-control" id="type">
                                <option value="admin" {{ $user->type === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user"{{ $user->type === 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('type')
                                <span style="color: yellow"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
