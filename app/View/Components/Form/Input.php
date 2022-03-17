<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $name;
    public $type;
    public $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label,$name,$type="text",$placeholder=null)
    {
        $this->label=$label;
        $this->name=$name;
        $this->type=$type;
        $this->placeholder=$placeholder??$label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">{{$label}}</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="{{$type}}" id="{{$name}}" name="{{$name}}" placeholder="{{$placeholder}}" class="form-control">
                <small id="error-{{$name}}" class="p-l-10 text-danger" style="display:none"></small>
            </div>
        </div>
        blade;
    }
}
