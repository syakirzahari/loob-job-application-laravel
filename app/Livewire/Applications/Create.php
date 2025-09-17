<?php

namespace App\Livewire\Applications;

use App\Livewire\Forms\ApplicationForm;
use App\Models\Application\Application;
use Livewire\Component;

class Create extends Component
{
    public ApplicationForm $form;

    public function mount(Application $application)
    {
        $this->form->setApplicationModel($application);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('applications.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.application.create');
    }
}
