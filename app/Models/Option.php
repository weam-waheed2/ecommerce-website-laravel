<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table        = 'wf_options';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;

    public static function get($key){
        $Option = Option::where('option_key', $key)->first();
        if($Option){
            return $Option->option_value;
        }
        return '';
    }

    public static function set($key, $val){
        $Option = Option::where('option_key', $key)->first();
        if($Option){
            $Option->option_value = $val;
        }else{
            $Option                 = new Option();
            $Option->option_key     = $key;
            $Option->option_value   = $val;
        }
        $Option->save();
        return $Option;
    }


    public static function logo(){
        $logo = Option::get('logo');
        if(!empty($logo)){
            return asset('assets/uploads/' . $logo);
        }
        return Media::default();
    }
    public static function favicon(){
        $logo = Option::get('favicon');
        if(!empty($logo)){
            return asset('assets/uploads/' . $logo);
        }
        return Media::default();
    }

    public static function lang(){
        $logo = Option::get('logo');
        if(!empty($logo)){
            return asset('assets/uploads/' . $logo);
        }
        return Media::default();
    }
}
