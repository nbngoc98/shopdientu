<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Slider;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteModelTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminSliderController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index() {
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }
    public function add() {
        return view('admin.slider.add');
    }
    public function store(SliderAddRequest $request) {
        try {

            $file = $request->image_path;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
            $file->move('storage/slider/' . auth()->id(), $fileNameHash);
            $filePath = "/storage/slider/".auth()->id()."/$fileNameHash";
            $dataInsert= [
                'name'=> $request->name,
                'description'=>$request->description,
                'percent_sale'=>$request->percent_sale,
                'image_path'=> $filePath,
                'image_name'=> $filePath,
            ];
            // dd($dataInsert);
            // $product là data của dữ liệu mới thêm vào
            $this->slider->create($dataInsert);
            return redirect()->route('slider.index');

        }catch (\Exception $exception){
            Log::error('Message: '.$exception->getMessage().'Line:'.$exception->getLine());
        }
    }
    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    public function update(Request $request, $id)
    {
        try {
            if ($request->hasFile('image_path')) {
                $file = $request->image_path;
                $fileNameOrigin = $file->getClientOriginalName();
                $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
                $file->move('storage/slider/' . auth()->id(), $fileNameHash);
                $filePath = "/storage/slider/".auth()->id()."/$fileNameHash";
                $dataUpdate= [
                    'name'=> $request->name,
                    'description'=>$request->description,
                    'percent_sale'=>$request->percent_sale,
                    'image_path'=> $filePath,
                    'image_name'=> $filePath,
                ];
            }
            $dataUpdate= [
                'name'=> $request->name,
                'description'=>$request->description,
                'percent_sale'=>$request->percent_sale,
            ];

            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }

    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->slider);

    }
}
