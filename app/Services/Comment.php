<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;
    /*
    *依照文章id取出評論資料
    */
    public static function findComments($id) {
        $collection = DB::table('comments')
            ->where('articles_id','=', $id)             
            ->get();
        return $collection;
    }
}
