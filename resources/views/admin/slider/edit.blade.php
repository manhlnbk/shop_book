@extends('admin.main')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tiêu Đề</label>
                        <input type="text" name="name" value="{{ $slider->name }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Avatar</label>
                <div class="col-md-10">
                    <img id="output" width="180" height="200" src="{{ asset( App\Helpers\Constants\ImgPath::URL_IMAGE_SLIDES . $slider->thumb) }}" />
                    <p><label for="ufile" style="cursor:pointer">Choose file</label></p>
                    <p><input type="file" name="avatar" id="ufile" onchange="loadFile(event)" /></p>
                </div>
        </div>


            <div class="form-group">
                <label for="menu">Sắp Xếp</label>
                <input type="number" name="sort_by" value="{{ $slider->sort_by }}" class="form-control" >
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $slider->active == 1 ? 'checked' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $slider->active == 0 ? 'checked' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Slider</button>
        </div>
        @csrf
    </form>
@endsection

