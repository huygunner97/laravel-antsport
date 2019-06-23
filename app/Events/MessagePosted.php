<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessagePosted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    protected $message;
    protected $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message, User $user)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        /**
     *nếu các bạn lưu vào CSDL vào truyền từ biến message qua bên lấy chung ta có thể lấy
     * $this->message->room_id, nhưng ở đấy  giả sử room là 1
     *Tên room ở đây sẽ là chatroom.1
     */
        // return new PrivateChannel('chatroom.'. 1);
        return new PresenceChannel('chatroom.'. 1);
    }
}
