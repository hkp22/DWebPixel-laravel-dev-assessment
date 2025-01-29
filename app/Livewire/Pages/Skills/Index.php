<?php

namespace App\Livewire\Pages\Skills;

use App\Livewire\Forms\SkillForm;
use App\Models\Skill;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Index extends Component
{
    use WithPagination;

    public SkillForm $form;

    #[On('skill-deleted')]
    #[On('skill-created')]
    public function refreshList()
    {
        $this->resetPage();
    }

    public function store()
    {
        $this->form->validate();
        Skill::create($this->form->toArray());
        $this->form->reset();
        $this->dispatch('skill-created');
    }

    public function render()
    {
        return view('livewire.pages.skills.index', [
            'skills' => Skill::latest()->paginate(10)
        ]);
    }
}
