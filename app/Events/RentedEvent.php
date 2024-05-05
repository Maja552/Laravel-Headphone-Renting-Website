<?php

namespace App\Events;

use App\Models\Rent;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class RentedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $rent;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Rent $rent)
    {
        $this->rent = $rent;
    }
}
