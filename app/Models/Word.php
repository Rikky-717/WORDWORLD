<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'word',
        'meaning',
        'other',
        'learned',
    ];

    public function scopeSearch($query, $search)
    {
    if($search !== null){
        $search_split = mb_convert_kana($search, 's'); // 全角スペースを半角
        $search_split2 = preg_split('/[\s]+/', $search_split); //空白で区切る
        foreach($search_split2 as $value){
            $query->where('word', 'like', '%' .$value. '%'); 
        }
    }
    return $query;
    }
}
