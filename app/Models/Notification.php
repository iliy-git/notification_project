<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        's_type_notification',
        'title',
        'message'
    ];

    public function type()
    {
        return $this->belongsTo(TypeNotification::class, 's_type_notification');
    }

    public function memberNotifications()
    {
        return $this->hasMany(MemberNotification::class, 's_notification');
    }
}
