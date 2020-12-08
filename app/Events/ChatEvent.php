<?php

namespace App\Events;

use App\User;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->user = $message;
        //dd($this->user);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new PrivateChannel('channel-name');
        return new PrivateChannel('user.'.$this->user->id);
    }
    public function broadcastWith()
    {
        return [
            'user' => [
                'receiver_id'=>$this->user->id,
                'sender_id'=>Auth::id(),
                'name' => User::findOrFail($this->user->id)->name,
                'avatar' => 'http://lorempixel.com/50/50',
                'message' => $this->user->message,
                'created_at' => Carbon::now(),
            ]
        ];
    }
}
