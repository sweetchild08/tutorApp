<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $isForm;
    public $formMethod;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$isForm=false,$formMethod='post')
    {
        $this->id=$id;
        $this->isForm=$isForm;
        $this->formMethod=$formMethod;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
