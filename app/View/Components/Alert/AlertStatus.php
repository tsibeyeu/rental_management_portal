<?php

namespace App\View\Components\Alert;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AlertStatus extends Component
{
    public $alert;
    /**
     * Create a new component instance.
     */
    public function __construct($alert)
    {
        $this->alert=$alert;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert.alert-status');
    }
}
