<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }

    public function create()
    {
        return view('admin.slider.add', [
           'title' => 'Thêm SLider mới'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
        ]);
        $items = $request->all();
        if (!empty($request->thumb)) 
        {
            $avatar_name = time() . '-' . $request->input('name') . $request->file('thumb')->getClientOriginalName();
            $request->file('thumb')->move(public_path('images\slides'), $avatar_name);
            //$request->file('thumb')->storeAs('public/images/slides', $avatar_name);
            $items['thumb'] = $avatar_name;
        }
         
        $items['name'] = $request->name;
        $items['sort_by'] = $request->sort_by;
        $items['active'] = $request->active;
        Slider::create($items);

        return redirect('admin/sliders/list')->with('success', 'Thêm thành công');
    }

    public function index()
    {
        return view('admin.slider.list', [
            'title' => 'Danh Sách Slider Mới Nhất',
            'sliders' => $this->slider->get()
        ]);
    }

    public function show($id)
    {
        return view('admin.slider.edit', [
            'title' => 'Chỉnh Sửa Slider',
            'slider' => Slider::find($id)
        ]);
    }

    public function update(Request $request,$id)
    {
        dd($request->file('thumb')->getClientOriginalName());

        $this->validate($request, [
            'name' => 'required',
        ]);
        $slider = Slider::find($id);
        if (!empty($request->thumb)) 
        {
            $avatar_name = time() . '-' . $request->input('name') . $request->file('thumb')->getClientOriginalName();
            $request->file('thumb')->move(public_path('images\slides'), $avatar_name);
            //$request->file('thumb')->storeAs('public/images/slides', $avatar_name);
            $slider->thumb = $avatar_name;
        }
         
        $slider->name = $request->name;
        $slider->sort_by = $request->sort_by;
        $slider->active = $request->active;
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'sửa thành công');
    }

    public function destroy(Request $request)
    {
        $result = $this->slider->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Slider'
            ]);
        }
        return response()->json([ 'error' => true ]);
    }
}