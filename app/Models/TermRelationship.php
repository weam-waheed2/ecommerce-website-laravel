<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermRelationship extends Model
{
    use HasFactory;

    protected $table        = 'wf_term_relationships';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;

}
