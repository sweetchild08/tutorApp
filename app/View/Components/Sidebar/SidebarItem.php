<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class SidebarItem extends Component
{
    public $label;
    public $href;
    public $iconClass;
    public $hasDropdown;
    public $routeName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( 
        $label,
        $href,
        $iconClass,
        $hasDropdown=false,
        $routeName='')
    {
        $this->label=$label;
        $this->href=$href;
        $this->iconClass=$iconClass;
        $this->hasDropdown=$hasDropdown;
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
                <li class="@if(strpos(Route::currentRouteName(),$routeName)!==-1) active @endif  @if($hasDropdown) has-sub @endif">
                    <a href="{{$href}}" class="@if($hasDropdown) js-arrow @endif" >
                    <i class="{{$iconClass}}"></i>{{$label}}</a>
                    @if($hasDropdown)
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            {{$slot}}
                        </ul>
                    @endif
                </li>
            blade;
    }
}
