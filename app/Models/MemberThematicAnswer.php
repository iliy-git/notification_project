<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberThematicAnswer extends Model
{
    use HasFactory;

    protected $table = 'member_thematic_answers';

    protected $fillable = [
        'user_name',
        'event_name'
    ];
}
