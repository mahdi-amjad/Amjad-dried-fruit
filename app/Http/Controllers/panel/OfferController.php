<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class OfferController extends Controller
{
    public function offershow()
    {
        return view('AdminAssets.Offers.createoffer');
    }

    public function offercreate(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageform = time() . '.' . $request->image->extension();
            $request->image->move(public_path('AdminAssets.Offer-image'), $imageform);
            $dateform = $request->all();
            $dateform['image'] = $imageform;

            Offers::create($dateform);
            Alert::success('موفقیت', 'آفر تصویری با موفقیت ثبت شد');
            return redirect('panel/offer/offerlist');


        }
    }
    
    public function offerlist()
    {
        $offerlists = Offers::all();

        return view('AdminAssets.Offers.offerlist', compact('offerlists'));
    }

     public function Delete($id)
    {
        $offers = Offers::find($id);
        $pictrue = "AdminAssets.Offer-image/" . $offers->image;
        if (File::exists($pictrue)) {
            File::delete($pictrue);
        }
        $offers->delete();
        Alert::success('موفقیت', 'آفر تصویری با موفقیت حذف شد');
        return redirect('panel/offer/offerlist');
    }
}
