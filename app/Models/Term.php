<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Term extends Model
{
    use HasFactory;
    protected $table        = 'wf_terms';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;

    public function childs() {
        return $this->hasMany(self::class, 'parent')->get();
    }
    public function Image()
    {
        if(empty($this->image) && !empty($this->post_ID) && Post::find($this->post_ID)){
            return Post::find($this->post_ID)->Image();
        }
        // return upload_url($this->image);
    }
    public function ParentList()
    {
        $list = [];
        if(!empty($this->parent) && Term::find($this->parent)){
            foreach(Term::find($this->parent)->ParentList() as $parent){
                $list[] = $parent;
            }
            $list[] = Term::find($this->parent);
        }
        return $list;
    }
    public function url() {
        if(!empty($this->post_ID) && Post::find($this->post_ID)){
            return Post::find($this->post_ID)->url();
        }
        return null;
    }

    public function count() {
        return $this->hasMany(TermRelationship::class,'term_ID')->count();
    }
}