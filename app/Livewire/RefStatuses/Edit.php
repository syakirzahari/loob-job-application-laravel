<?php

namespace App\Livewire\RefStatuses;

use App\Livewire\Forms\RefStatusForm;
use App\Models\Ref\Status;
use Livewire\Component;

class Edit extends Component
{
    public RefStatusForm $form;

    public function mount(Status $refStatus)
    {
        $this->form->setRefStatusModel($refStatus);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirectRoute('ref-statuses.index', navigate: true);
    }

    public function render()
    {
        $parents = Status::isParent()->select('name', 'id')->get();

        return view('livewire.ref-status.edit', compact('parents'));
    }
}
