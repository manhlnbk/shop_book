@extends('admin.main')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tiêu Đề</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                </div>

            </div>
            <label for="">Ảnh Sản Phẩm</label>
            <div class="form-group">
                <img id="output" width="180" height="200" src="" />
                <p><label for="ufile" style="cursor:pointer">Choose file</label></p>
                <p><input type="file" name="thumb" id="ufile" onchange="loadFile(event)" /></p>
            </div>

            <div class="form-group">
                <label for="menu">Sắp Xếp</label>
                <input type="number" name="sort_by" value="1" class="form-control" >
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Slider</button>
        </div>
    </form>
    <script>
        var loadFile = function (event) {
            image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection