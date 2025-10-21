<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberNotification extends Model
{
    use HasFactory;

    protected $table = 'member_notifications';

    protected $fillable = [
        's_user',
        's_notification',
        'is_sent',
        'sent_at'
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'is_sent' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 's_user');
    }

    public function notification()
    {
        return $this->belongsTo(Notification::class, 's_notification');
    }
}
