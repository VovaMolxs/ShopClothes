<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request) {

        $commentInfo = $request->all();
        Reviews::create($commentInfo);
        echo json_encode($commentInfo);

    }
}
