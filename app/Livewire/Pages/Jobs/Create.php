<?php

namespace App\Livewire\Pages\Jobs;

use App\Actions\JobListing\StoreJobListing;
use App\Livewire\Forms\JobListingForm;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public JobListingForm $form;

    public function store(StoreJobListing $storeJobListing)
    {
        $this->form->validate();

        $storeJobListing->execute(
            Auth::user(),
            $this->form->only([
                'title', 'description', 'location', 'experience',
                'salary', 'extra_info', 'company_name', 'company_logo', 'skills'
            ])
        );

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job Listing created successfully.');
    }

    public function render()
    {
        return view('livewire.pages.jobs.create', [
            'skills' => Skill::all(),
        ]);
    }
}
