<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeNotification;

class TypeNotificationSeeder extends Seeder
{
    public function run()
    {
        $types = [
            [
                'name' => 'Низкая важность',
                'path_icon' => 'fas fa-bell'
            ],
            [
                'name' => 'Обычное уведомление',
                'path_icon' => 'fas fa-envelope'
            ],
            [
                'name' => 'Средняя важность',
                'path_icon' => 'fas fa-exclamation-circle'
            ],
            [
                'name' => 'Высокая важность',
                'path_icon' => 'fas fa-exclamation-triangle'
            ],
            [
                'name' => 'Критическое уведомление',
                'path_icon' => 'fas fa-skull-crossbones'
            ]
        ];

        foreach ($types as $type) {
            TypeNotification::create($type);
        }
    }
}
