<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationTemplate;

class NotificationTemplateSeeder extends Seeder
{
    public function run(): void
    {
        NotificationTemplate::create([
            'title' => 'Appointment Confirmation',
            'type' => 'appointment',
            'content' => 'Hi {{name}}, your appointment on {{date}} at {{time}} has been confirmed.',
            'channel' => 'email',
            'active' => true,
        ]);

        NotificationTemplate::create([
            'title' => 'Birthday Greeting',
            'type' => 'greeting',
            'content' => 'Happy Birthday {{name}}! We have a special offer waiting for you!',
            'channel' => 'sms',
            'active' => true,
        ]);
    }
}
