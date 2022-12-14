@extends('admin.main')

@section('content')
    @if (count($sliders) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Tiêu Đề</th>
                    <th>Ảnh</th>
                    <th>Trang Thái</th>
                    <th>Cập Nhật</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sliders as $key => $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>{{ $slider->name }}</td>
                        <td>
                            <a href="{{ $slider->thumb }}" target="_blank">
                                <img src="{{ asset( App\Helpers\Constants\ImgPath::URL_IMAGE_SLIDES . $slider->thumb) }}" height="40px">
                            </a>
                        </td>
                        <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                        <td>{{ $slider->updated_at }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('slider.edit', ['id'=>$slider->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $slider->id }}, '/admin/sliders/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach   
            </tbody>
        </table>

        {!! $sliders->links() !!}
    @else
        <div style="text-align: center">
            <h3>Chưa có dữ liệu</h3>
        </div>
    @endif
@endsection


