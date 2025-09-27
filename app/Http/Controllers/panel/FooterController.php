<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class FooterController extends Controller
{
      public function index() {
        $footer = Footer::first(); // فقط یه رکورد داریم
        return view('AdminAssets.Footer.footershow', compact('footer'));
    }
     public function updateshow(Request $request, $id) {
         $footer = Footer::findOrFail($id);
      return view('AdminAssets.Footer.footerupdate',compact('footer'));
    }

    public function update(Request $request, $id) {
        $footer = Footer::findOrFail($id);

        $footer->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'instagram' => $request->instagram,
            'telegram' => $request->telegram,
            'whatsapp' => $request->whatsapp,
            'copyright' => $request->copyright,
        ]);

          Alert::success('موفقیت', 'پا صفحه با موفقیت ویرایش شد');
            return redirect('panel/footer/footershow');
}
}