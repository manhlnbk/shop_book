@extends('admin.main')
@Section('content')
<form action="" method="post">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Nhập tên">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Nhập tên">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Nhập tên">
        </div>

        <div class="form-group">
            <label for="">Password Confirmation</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Nhập tên">
        </div>

        <div class="form-group">
            <label for="">Role</label><br>
            <input type="radio" class="radio-inline" name="Role" value="1">Admin&emsp;
            <input type="radio" class="radio-inline" name="Role" value="2">User&emsp;
        </div>
        
    </div>
        <div class="col-1">
            <button type="submit" class="btn btn-primary btn-block">Create</button>
        </div>
</form>
@endSection