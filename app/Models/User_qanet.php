<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_qanet extends Model
{
    protected $table = 'users_qanet';

    protected $fillable = [
        'usuid',
        'usunif',
        'usuclicod',
        'usucencod'
    ];
}
