<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class Discountcontroller extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('AdminAssets.discounts.index', compact('discounts'));
    }

    public function create()
    {
        $products = Product::all();
        $categorys = category::all();

        return view('AdminAssets.discounts.create', compact('products', 'categorys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:percent,fixed',
            'value' => 'required|numeric|min:1',
        ]);

        Discount::create($request->all());

        return redirect()->route('discounts.index')->with('success', 'تخفیف با موفقیت ایجاد شد');
    }

    public function edit(string $id)
    {
        $products = Product::all();
        $categorys = category::all();
        $discount = Discount::findOrFail($id);

        return view('AdminAssets.discounts.edit', compact('products', 'categorys', 'discount'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:percent,fixed',
            'value' => 'required|numeric|min:1',
        ]);

        $discount = Discount::findOrFail($id); 
        $discount->update($request->all());   

        return redirect()->route('discounts.index')->with('success', 'تخفیف ویرایش شد');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('discounts.index')->with('success', 'تخفیف حذف شد');
    }
}
