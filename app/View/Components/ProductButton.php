<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $url;
    public $text;
    public $variant;

    public function __construct($url, $text, $variant="default")
    {
        $this->url = $url;
        $this->text = $text;
        $this->variant = $variant;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-button');
    }
}
