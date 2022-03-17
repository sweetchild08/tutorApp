<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlertMessage extends Component
{
    public $name;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name='message', $type='success')
    {
        $this->name=$name;
        $this->type=$type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
        @if (session($name))
            <div class="message alert alert-{{$type}}">
                {{ session($name) }}
            </div>
        @endif  
        blade;
    }
}
