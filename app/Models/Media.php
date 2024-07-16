<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table        = 'wf_media';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
    protected $appends      = ['url'];

    public function GetUrlAttribute(){
        return $this->url();
    }


    public function url(){
        return url('assets/uploads/' . $this->name);
    }
    public function Thumbnail(){
        return url('admin/media/thumbnail/' . $this->name);
    }

    public static function default(){
        return 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
    }

    public static function AltFromName($name){
        if(Media::where('name', $name)->first()){
            return Media::where('name', $name)->first()->alt;
        }
        return null;
    }
}
