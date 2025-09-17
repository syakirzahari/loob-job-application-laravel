<?php

namespace App\Livewire\RefStatuses;

use App\Livewire\Forms\RefStatusForm;
use App\Models\Ref\Status;
use Livewire\Component;

class Show extends Component
{
    public RefStatusForm $form;

    public function mount(Status $refStatus)
    {
        $this->form->setRefStatusModel($refStatus);
    }

    public function render()
    {
        return view('livewire.ref-status.show', ['refStatus' => $this->form->refStatusModel]);
    }
}
