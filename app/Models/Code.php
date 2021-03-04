<?php

namespace App\Models;

use App\Models\Scopes\DatesScopes;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use DatesScopes;

    public $timestamps = false;

    protected $table = 'codes';
    protected $fillable = [
        'name', 'description', 'code'
    ];
}
