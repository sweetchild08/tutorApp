<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class SidebarItem2 extends Component
{
    public $label;
    public $href;
    public $routeName;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label,$href,$routeName='')
    {
        $this->label=$label;
        $this->href=$href;
        $this->routeName=$routeName==''?$label:$routeName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
        <li class="@if(strpos(Route::currentRouteName(),$routeName)!==-1) active @endif">
            <a href="{{$href}}">{{$label}}</a>
        </li>
        blade;
    }
}
