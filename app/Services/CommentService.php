<?php

namespace App\Services;

use App\Models\Products;
use App\Models\Reviews;

class CommentService
{
   public function addComments($comment, $user_id, $id) {
       //если отзывов нету
       if ((Reviews::all()->get($id) == null) || ($user_id !== Reviews::all()->get($id)->user_id)) {

           $count_reviews = Products::all()->find($id)->count_reviews + 1;

           $product_rating = (Products::all()->find($id)->rating + $comment['mark']) / $count_reviews;


           Products::where('id', $id)
               ->update(['count_reviews' => $count_reviews,
                         'rating' => $product_rating
                   ]);
           Reviews::create($comment);

           return back();
       }
}
}
