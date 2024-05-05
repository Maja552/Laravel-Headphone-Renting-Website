<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdownmenu extends Component
{
    public string $content;
    public string $trigger;
    /**
     * Create a new component instance.
     */
    public function __construct($content, $trigger)
    {
        $this->content = $content;
        $this->trigger = $trigger;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdownmenu');
    }
}
