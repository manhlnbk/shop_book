@extends('admin.main')
@Section('content')
<form action="" method="post" enctype="multipart/form-data" > 
      @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="name" id="name"  value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" class="form-control" name="email"  disabled="" value="{{$user->email}}"> 
                    </div>
                    
                    <div class="form-group">
                          <label for="">Avatar</label>
                          <div class="col-md-10">
                              <img id="output" width="180" height="200" src="{{ asset('images/' .$user->avatar) }}" />
                              <p><label for="ufile" style="cursor:pointer">Choose file</label></p>
                              <p><input type="file" name="avatar" id="ufile" onchange="loadFile(event)" /></p>
                          </div>
                  </div>
                      <div class="form-group">
                          <label for="">Password</label>
                          <input type="password" class="form-control password" name="password" id="password" placeholder="Enter password">
                      </div>
                      <div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                
      </form>
    <script>
        var loadFile = function (event) {
            image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endSection

