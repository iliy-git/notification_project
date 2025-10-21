<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\TypeNotification;
use App\Models\Notification;
use App\Models\MemberNotification;
use App\Models\MemberThematicAnswer;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $user = Auth::user();

        $typeNotification = TypeNotification::where('name', 'Низкая важность')->get()->first();

        $iconMap = [
            'fas fa-bell' => '🔔',
            'fas fa-envelope' => '✉️',
            'fas fa-exclamation-circle' => '⚠️',
            'fas fa-exclamation-triangle' => '🚨',
            'fas fa-skull-crossbones' => '☠️'
        ];

        $emojiIcon = $iconMap[$typeNotification->path_icon ?? 'fas fa-envelope'];

        $notification = Notification::create([
            's_type_notification' => $typeNotification->id,
            'title' => 'Уведомление о мероприятии',
            'message' => "Здравствуйте, {$user->name}! Вы участвуете в мероприятие"
        ]);

        $memberThematicAnswer = MemberThematicAnswer::create([
            'user_name' => $user->name,
            'event_name' => 'Олимпиада',
        ]);

        MemberNotification::create([
            's_user' => $user->id,
            's_notification' => $notification->id,
            'is_sent' => true,
            'sent_at' => now()
        ]);

        $emailContent = "
                <h1>Здравствуйте, {$memberThematicAnswer->user_name}!</h1>
                <div>{$emojiIcon}</div>
                <p>Вы успешно зарегистрированы на мероприятие: {$memberThematicAnswer->event_name}</p>
                <p><a href='" . url('/dashboard') . "'>Перейти в дашборд</a></p>
                <p>Когда ваши документы будут расмотрены мы вас оповестим</p>
            ";

        Mail::html($emailContent, function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Уведомление о мероприятии');
        });

        return back();

    }
}
