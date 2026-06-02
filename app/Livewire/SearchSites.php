<?php

namespace App\Livewire;

use App\Models\Site;
use Livewire\Component;

class SearchSites extends Component
{
    public string $search = '';

    public function render()
    {
        return view('livewire.search-sites', [
            'sites' => Site::where('name', 'like', '%' . $this->search . '%')->get()
        ]);
    }
}