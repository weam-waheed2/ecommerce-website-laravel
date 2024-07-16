<?php

namespace App\Models;

use App\Models\Term;
use App\Models\User;
use App\Models\TermRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table        = 'wf_posts';
    protected $primaryKey   = 'ID';
    public $timestamps      = true;
    protected $fillable     = ['post_status', 'is_reviewed'];

    public function ParentList()
    {
        $list = [];
        if(!empty($this->post_parent)){
            //$list[] = Post::find($this->post_parent)->ParentList();
            if(!empty(Post::find($this->post_parent)->ParentList())){
                foreach(Post::find($this->post_parent)->ParentList() as $parent){
                    $list[] = $parent;
                }
            }
            $list[] = Post::find($this->post_parent);
        }
        return $list;
    }
    public function Children()
    {
        if(Post::where('post_parent', $this->ID)->where('post_status', 'publish')->count() > 0){
            $this->children         = Post::where('post_parent', $this->ID)->where('post_status', 'publish')->select('ID', 'post_title')->get();
            foreach($this->children as $child){
                $child->children    =  $child->Children();
                $child->post_categories    =  [];
                $child->tour_categories    =  [];
            }
            return $this->children;
        }
        return null;
    }

    public function CategoryList()
    {
        $list = [];
        if($this->PrimaryCategory()){
            if(!empty($this->PrimaryCategory()->parent)){
                foreach($this->PrimaryCategory()->ParentList() as $parent){
                    $list[] = $parent;
                }
            }
            $list[] = $this->PrimaryCategory();
        }
        return $list;
    }

    public function PrimaryCategory(){
        if(Term::find($this->meta('primary_category'))){
            return Term::find($this->meta('primary_category'));
        }else{
            $check = Term::whereIn('ID', $this->hasMany(TermRelationship::class, 'post_ID')->pluck('term_ID'))->where('taxonomy', $this->post_type . '_category');
            if($check->count() > 0){
                return $check->first();
            }
        }
        return null;
    }
    public function Categories()
    {
        return Term::whereIn('ID', $this->hasMany(TermRelationship::class, 'post_ID')->pluck('term_ID'))->get();
    }
    public function Author()
    {
        return User::find(1);
    }

    public function url()
    {
        if($this->isHome()){
            return url('/');
        }
        return url('/') . '/' . $this->post_slug;
    }

    public function image()
    {
        return asset('assets/uploads/'.$this->post_image);
    }

    public function isHome()
    {
        $homeID = Option::get('homepage');
        if($this->ID == $homeID){
            return true;
        }
        return false;
    }

    public function meta($key)
    {
        $meta = PostMeta::getMeta($this->ID, $key);
        return $meta ? $meta : null;
    }

    public function seo(){
        $seoData                    = PostMeta::getMeta($this->ID, 'seo');
        if($seoData){
            $seoData = json_decode($seoData, 1);
        }
        $seo                        = [];
        $seo['keyword']             = isset($seoData['keyword']) && !empty($seoData['keyword']) ? $seoData['keyword'] : $this->post_title;
        $seo['image']               = $this->image();
        $seo['title']               = isset($seoData['title']) && !empty($seoData['title']) ? $seoData['title'] : $this->post_title;
        $seo['description']         = isset($seoData['description']) && !empty($seoData['description']) ? $seoData['description'] : $this->post_title;
        $seo['keywords']            = isset($seoData['meta_keywords']) && !empty($seoData['meta_keywords']) ? $seoData['meta_keywords'] : $this->post_title;
        $seo['canonical']           = !empty($seoData['canonical']) ? $seoData['canonical'] : $this->url();

        $seo['twitter:description'] = !empty($seoData['twitter_description']) ? $seoData['twitter_description'] : $seo['description'];
        $seo['twitter:title']       = !empty($seoData['twitter_title']) ? $seoData['twitter_title'] : $seo['title'];

        $seo['twitter:description'] = !empty($seoData['twitter_description']) ? $seoData['twitter_description'] : $seo['description'];
        $seo['twitter:title']       = !empty($seoData['twitter_title']) ? $seoData['twitter_title'] : $seo['title'];

        return $seo;
    }
    public function parent() {
        return $this->belongsTo(self::class, 'post_parent')->first();
    }

    public function breadcrumb(){
        $list = array();
        if($this->post_type == 'page'){
            if(!empty($this->post_parent)){

                $list[] = ['url' => Post::find($this->post_parent)->url(), 'name' => Post::find($this->post_parent)->post_title];
            }
        }

        if($this->post_type == 'post'){
            if(!empty($this->post_parent)){
                $list[] = ['url' => Post::find($this->post_parent)->url(), 'name' => Post::find($this->post_parent)->post_title];
            }
        }
        $list[] = ['url' => '', 'name' => $this->post_title];
    }
}