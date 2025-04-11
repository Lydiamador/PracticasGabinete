<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favoritos extends Model
{
    protected $table = 'favoritos';
    
    protected $fillable = [
        'id',
        'favartcod',
        'favusucod'];
}
