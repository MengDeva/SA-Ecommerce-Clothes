<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $min_value = 0;
    public $max_value = 1000;
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item added to Cart');
        return redirect()->route('shop.cart');
    }
    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $product = Product::where('slug', $this->slug)->first();
        $rproduct = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $nproducts = Product::latest()->take(4)->get();
        return view('livewire.details-component', ['product' => $product, 'categories' => $categories, 'rproducts' => $rproduct, 'nproducts' => $nproducts]);
    }
}
