<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\WholesaleInquiry;
use Illuminate\Http\Request;

class Dashborad extends Controller
{
  public function dashborad()
  {
      $WholesaleInquirys = WholesaleInquiry::with('product')->latest()->get();


    return view('AdminAssets.index.index', compact('WholesaleInquirys'));
  }

}
