<?php

namespace App\Livewire\Applications;

use App\Models\Application\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 10;

    public $sortField = 'reference_no';
    public $sortByColumn = 'created_at';

    public $sortDirection = 'ASC';

   public function setSortFunctionality($columnName){
        if ($this->sortByColumn == $columnName) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortByColumn = $columnName;
        $this->sortDirection = 'ASC';
    }

    public function render(): View
    {
        $applications = Application::searchApplication($this->search)
                                    ->orderBy($this->sortField, $this->sortDirection ? 'ASC' : 'DESC')
                                    ->paginate($this->perPage);

        return view('livewire.application.index', compact('applications'));
    }

    public function delete(Application $application)
    {
        $application->delete();

        return $this->redirectRoute('applications.index', navigate: true);
    }
}
