<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class JobListingForm extends Form
{
    #[Validate('required|min:3|max:255')]
    public $title = '';

    #[Validate('required|min:3')]
    public $description = '';

    #[Validate('required|min:3|max:255')]
    public $location = '';

    #[Validate('required|min:3|max:255')]
    public $experience = '';

    #[Validate('required|min:3|max:255')]
    public $salary = '';

    #[Validate('required|min:3|max:255')]
    public $extra_info = '';

    #[Validate('required|min:3|max:255')]
    public $company_name = '';

    #[Validate('required|image|max:2048')]
    public $logo = '';

    #[Validate('required|exists:skills,id')]
    public $skills = [];
}
