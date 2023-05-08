<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ShopItem;

class ShopItemController extends Controller
{
    public function index() {
        return view('welcome', ['shopitems' => ShopItem::where('status', 0)->get()]);
    }

    public function saveItem(Request $request) {
        Log::info($request);

        $item = new ShopItem();
        $item->name = $request->shopItem;
        $item->status = 0;
        $item->save();

        return redirect('/');
    }

    public function markItem($id) {

        $item = ShopItem::find($id);
        $item->status = 1;
        $item->save();

        return redirect('/');
    }
}
