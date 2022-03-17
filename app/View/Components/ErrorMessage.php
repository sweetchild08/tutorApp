<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ErrorMessage extends Component
{
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name=$name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
            @error($name) <small id="error-{{$name}}" class="p-l-10 text-danger">{{$message}}</small> @enderror
        blade;
    }
}
