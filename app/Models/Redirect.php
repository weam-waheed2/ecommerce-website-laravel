<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    use HasFactory;

    protected $table        = 'wf_redirects';
    protected $primaryKey   = 'ID';
    public $timestamps      = true;
}
