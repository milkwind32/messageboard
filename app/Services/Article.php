<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;
    /*
    *依照文章id取出文章.使用者.標題資料
    */
    public static function findAllData($id) {
        $collection = DB::table('articles AS a')
            ->select('*', 'a.created_at AS articles_created_at', 'a.updated_at AS articles_updated_at', 'a.id AS articles_id')
            ->leftjoin('users AS u', 'u.account', '=', 'a.user_account')
            ->leftjoin('title_types AS tt', 'tt.id', '=', 'a.title_type_id')  
            ->where('a.id', '=', $id)             
            ->first();
        return $collection;
    }
    
    /*
    **依鍵入搜尋內容取出文章.標題資料
    */
    public static function searchArticles($search) {   
        $pagination = DB::table('articles AS a')
            ->select('*', 'a.id AS articles_id')
            ->leftjoin('title_types AS tt', 'tt.id', '=', 'a.title_type_id')
            ->where('topic', 'LIKE', "%$search%") 
            ->orwhere('content', 'LIKE', "%$search%")       
            ->orderBy('articles_id', 'DESC')
            ->paginate(7);
        return $pagination;
    }
}
