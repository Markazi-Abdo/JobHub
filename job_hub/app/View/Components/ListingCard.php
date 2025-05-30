<?php

namespace App\View\Components;

use App\Models\Listing;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListingCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Listing $listing)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.listing-card');
    }
}
