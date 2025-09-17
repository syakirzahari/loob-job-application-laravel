<?php

namespace App\Livewire\Applications;

use App\Livewire\Forms\ApplicationForm;
use App\Models\Application\Application;
use App\Models\Ref\Status;
use Livewire\Component;

class Edit extends Component
{
    public ApplicationForm $form;

    public function mount(Application $application)
    {
        $this->form->setApplicationModel($application);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirectRoute('applications.index', navigate: true);
    }

    public function render()
    {
        $statuses = Status::isApplicationStatus()->select('name', 'id')->get();

        return view('livewire.application.edit', compact('statuses'));
    }
}
