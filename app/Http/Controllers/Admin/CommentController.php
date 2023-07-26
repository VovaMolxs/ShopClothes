<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request, $id) {
        $commentInfo = $request->all();
        $user_id = (int) $request->user_id;

        if (Reviews::all()->get($id) == null) {
            Reviews::create($commentInfo);
            return back();
        } elseif ($user_id !== Reviews::all()->get($id)->user_id) {
            Reviews::create($commentInfo);
            return back();
        }

        return back();
        /*echo json_encode($commentInfo);*/

    }
}
