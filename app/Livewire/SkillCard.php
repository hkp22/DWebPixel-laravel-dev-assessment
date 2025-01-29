<?php

namespace App\Livewire;

use App\Livewire\Forms\SkillForm;
use App\Models\Skill;
use Livewire\Component;

class SkillCard extends Component
{
    public Skill $skill;
    public SkillForm $form;
    public $editing = false;

    public function mount(Skill $skill)
    {
        $this->skill = $skill;
    }

    public function edit()
    {
        $this->form->fill($this->skill->toArray());
        $this->editing = true;
    }

    public function cancelEdit()
    {
        $this->editing = false;
    }

    public function update()
    {
        $this->form->validate();
        $this->skill->update($this->form->toArray());
        $this->editing = false;
        $this->dispatch('skill-updated', skillId: $this->skill->id);
    }

    public function delete()
    {
        $this->skill->delete();
        $this->dispatch('skill-deleted', skillId: $this->skill->id);
    }

    public function render()
    {
        return view('livewire.skill-card');
    }
}
