<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SkillForm extends Form
{
    #[Validate('required|min:3')]
    public $name = '';
}
