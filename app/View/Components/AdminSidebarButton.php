<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminSidebarButton extends Component
{
    public string $url;
    public string $icon;
    public string $text;

    /**
     * Create a new component instance.
     */
    public function __construct($url, $icon, $text)
    {
        $this->url = $url;
        $this->icon = $icon;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-sidebar-button');
    }
}
