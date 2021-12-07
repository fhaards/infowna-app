<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Request extends Model
{
    use HasFactory, Notifiable;


    protected $table = 'requests';
    protected $primaryKey = 'req_id';
    public    $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'req_id',
        'uuid',
        'name',
        'passport_id',
        'email',
        'gender',
        'phone',
        'nationality',
        'passport_img',
        'req_status',
        'address_indonesia',
    ];

    protected $hidden = [];
    protected $casts = [];
}
