<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{

    protected $listeners = [
        "echo:notificationsChannel,.Illuminate\Notifications\Events\BroadcastNotificationCreated"  => '$refresh',
        "notifications-read" => '$refresh'
    ];

    public function logout()
    {
        auth()->logout();
        $this->redirect('/');
    }

    public function markNotificationsAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        $this->emit('notifications-read');
    }

    public function goToLoginPage()
    {
        $this->redirect('/login');
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
