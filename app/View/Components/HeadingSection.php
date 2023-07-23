<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;

class HeadingSection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu = FilamentNavigation::get('main-menu');
        return view('components.heading-section', compact('menu'));
    }
}
