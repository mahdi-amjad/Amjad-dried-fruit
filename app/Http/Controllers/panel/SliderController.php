<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\slidertwo;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function create()
    {
        return view('AdminAssets.Slider.createslider');
    }
    public function storeslider(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageform = time() . '.' . $request->image->extension();
            $request->image->move(public_path('AdminAssets.Slider-image'), $imageform);
            $dateform = $request->all();
            $dateform['image'] = $imageform;

            Slider::create($dateform);
            Alert::success('موفقیت', 'اسلایدر با موفقیت ثبت شد');
            return redirect('panel/slider/slider');
        }
    }

    public function slider()
    {
        $sliders = Slider::all();
        return view('AdminAssets.Slider.slider', compact('sliders'));
    }

    public function Delete($id)
    {
        $sliders = Slider::find($id);
        $pictrue = "AdminAssets.Slider-image/" . $sliders->image;
        if (File::exists($pictrue)) {
            File::delete($pictrue);
        }
        $sliders->delete();
        Alert::success('موفقیت', 'اسلایدر  با موفقیت حذف شد');
        return redirect('panel/slider/slider');
    }


    public function Createslider()
    {
        return view('AdminAssets.Slider.Slidertwo');
    }

    public function Slidertwo(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageform = time() . '.' . $request->image->extension();
            $request->image->move(public_path('AdminAssets.Slider-image'), $imageform);
            $dateform = $request->all();
            $dateform['image'] = $imageform;

            slidertwo::create($dateform);
            Alert::success('موفقیت', 'اسلایدر با موفقیت ثبت شد');
            return redirect('panel/slider/galleryslider');
        }
    }

    public function Galleryslider()
    {
        $sliders = slidertwo::all();
        return view('AdminAssets.Slider.Galleryslider', compact('sliders'));
    }

    public function Deletegallery($id)
    {
        $sliders = slidertwo::find($id);
        $pictrue = "AdminAssets.Slider-image/" . $sliders->image;
        if (File::exists($pictrue)) {
            File::delete($pictrue);
        }
        $sliders->delete();
        Alert::success('موفقیت', 'اسلایدر  با موفقیت حذف شد');
        return redirect('panel/slider/Galleryslider');
    }
}
