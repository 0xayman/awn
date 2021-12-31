<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationCard extends Component
{

    public $notification;

    public function render()
    {
        return view('livewire.notification-card');
    }
}
