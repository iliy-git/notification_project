<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeNotification extends Model
{
    use HasFactory;

    protected $table = 'type_notifications';

    protected $fillable = [
        'name',
        'path_icon'
    ];

    public function notifications()
    {
        return $this->hasMany(Notification::class, 's_type_notification');
    }
}
