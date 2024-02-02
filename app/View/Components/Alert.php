<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Session;
class Alert extends Component
{

   
    /**
     * Create a new component instance.
     */
    public $type;
    
    public function __construct($type='')
    {
      $this->type = $type;
    
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
       
        return view('components.alert');
    }
}
