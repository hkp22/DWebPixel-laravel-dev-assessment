<?php

namespace App\Http\Resources;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobListingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, JobListing::class>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'location' => $this->location,
            'experience' => $this->experience,
            'salary' => $this->salary,
            'extra' => $this->extra,
            'company_name' => $this->company_name,
            'company_logo' => $this->companyLogoPath(),
            'skills' => $this->skills->map(fn ($skill) => [
                'id' => $skill->id,
                'name' => $skill->name,
            ]),
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
