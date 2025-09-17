<?php

namespace App\Livewire\Applications;

use App\Livewire\Forms\ApplicationForm;
use App\Models\Application\Application;
use Livewire\Component;

class Show extends Component
{
    public ApplicationForm $form;

    public function mount(Application $application)
    {
        $this->form->setApplicationModel($application);
    }

    public function render()
    {
        $logs = $this->form->applicationModel->statusLog()->orderBy('created_at', 'DESC')->get();

        return view('livewire.application.show', ['application' => $this->form->applicationModel, 'logs' => $logs]);
    }
}
