<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductFilter extends Component
{
    public $selectedCategory = null;
    public $categories;
    public $products;

    public function mount()
    {
        $this->categories = Category::all();
        $this->products = Product::all();
    }

    public function filterByCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->products = Product::where('category_id', $categoryId)->get();
    }

    public function render()
    {
        return view('livewire.product-filter');
    }
}