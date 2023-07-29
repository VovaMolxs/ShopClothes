<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Reviews;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }


    public function addComment(Request $request, $id) {
        $commentInfo = $request->all();
        $user_id = (int) $request->user_id;

        //Проверка на отзыв от пользователя, если нету то добавляем отзыв на товар
        $this->service->addComments($commentInfo, $user_id, $id);

        return back();
        /*echo json_encode($commentInfo);*/

    }
}
