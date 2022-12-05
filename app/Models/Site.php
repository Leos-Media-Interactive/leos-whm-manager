<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain',
        'is_suspended',
        'start_date',
        'disk_limit',
        'disk_used',
        'ip'
    ];
}
