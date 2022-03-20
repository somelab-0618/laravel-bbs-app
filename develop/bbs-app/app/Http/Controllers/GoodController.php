<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Good;

class GoodController extends Controller
{
    public function store(Request $request)
    {
        Good::create([
        'post_id' => $request->id,
        'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $good = Good::where('post_id', $id)->where('user_id', Auth::id())->first();
        $good->delete();

        return redirect()->back();
    }
}
