<?php

namespace App\Actions\JobListing;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class StoreJobListing
{
    public function execute(User $user, array $data): JobListing
    {
        $data['logo'] = $this->storeLogo($data['logo'] ?? null);

        $jobListing = $user->jobListings()->create($data);

        if (!empty($data['skills'])) {
            $jobListing->skills()->attach($data['skills']);
        }

        return $jobListing;
    }

    private function storeLogo($logo)
    {
        if (isset($logo) && $logo instanceof UploadedFile) {
            return $logo->store('logos', 'public');
        }

        return null;
    }
}
