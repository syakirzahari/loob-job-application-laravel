<?php

namespace App\Livewire\RefJobPositions;

use App\Livewire\Forms\RefJobPositionForm;
use App\Models\Ref\Position;
use Livewire\Component;

class Show extends Component
{
    public RefJobPositionForm $form;

    public function mount(Position $refJobPosition)
    {
        $this->form->setRefJobPositionModel($refJobPosition);
    }

    public function render()
    {
        return view('livewire.ref-job-position.show', ['refJobPosition' => $this->form->refJobPositionModel]);
    }
}
