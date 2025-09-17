<?php

namespace App\Livewire\RefJobPositions;

use App\Livewire\Forms\RefJobPositionForm;
use App\Models\Ref\Position;
use Livewire\Component;

class Create extends Component
{
    public RefJobPositionForm $form;

    public function mount(Position $refJobPosition)
    {
        $this->form->setRefJobPositionModel($refJobPosition);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('ref-job-positions.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.ref-job-position.create');
    }
}
