<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    use HasFactory;

    protected $table        = 'wf_postmeta';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;

    public static function getMeta($post_ID, $meta_key){
        $PostMeta = PostMeta::where('post_ID', $post_ID)->where('meta_key', $meta_key)->get()->first();
        return $PostMeta ? $PostMeta->meta_value : null;
    }
}