<?php
namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Http\Resources\SliderResource;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return SliderResource::collection(Slider::all());
    }

    public function store(StoreSliderRequest $request)
    {
        $slider = Slider::create($request->validated());
        return new SliderResource($slider);
    }

    public function show(Slider $slider)
    {
        return new SliderResource($slider);
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $slider->update($request->validated());
        return new SliderResource($slider);
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return response()->json(null, 204);
    }
}
