<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $image;
    public $text;
    public $precio;

    public function __construct($image, $text, $precio)
    {
        $this->image = $image;
        $this->text = $text;
        $this->precio = $precio;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
