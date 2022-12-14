@extends('admin.main')
@section('content')
<form action="{{ route('users.update',['user'=>$user->id]) }}" method="post" enctype="multipart/form-data" > 
        @method('PUT')
        @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="name" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" class="form-control" name="email"  disabled="" value="{{$user->email}}"> 
                    </div>
                    
                    <div class="form-group">
                        <label for="">Role</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="role_id" value="1" {{ $user->role_id == '1' ? "checked" : "" }}>Admin
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="role_id" value="2" {{ $user->role_id == '2' ? "checked" : "" }}>User
                        </label>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control password" name="password" id="password" placeholder="Enter password">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                
      </form>
@endsection