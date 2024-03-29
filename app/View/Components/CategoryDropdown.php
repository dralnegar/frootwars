<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;

class CategoryDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.category-dropdown', [
            'categories' => Category::getByName(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }
}
