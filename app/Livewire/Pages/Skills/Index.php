<?php

namespace App\Livewire\Pages\Skills;

use App\Livewire\Forms\SkillForm;
use App\Models\Skill;
use Livewire\Component;

class Index extends Component
{
    public SkillForm $form;

    public function store()
    {
        $this->form->validate();

        Skill::create($this->form->toArray());

        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.pages.skills.index', [
            'skills' => Skill::latest()->paginate()
        ]);
    }
}
