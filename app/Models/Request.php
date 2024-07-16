<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $table        = 'wf_requests';
    protected $primaryKey   = 'ID';
    public $timestamps      = true;
}
