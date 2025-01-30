<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\JobListing;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.jobs.index', [
            'jobs' => JobListing::paginate()
        ]);
    }
}
