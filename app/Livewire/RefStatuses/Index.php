<?php

namespace App\Livewire\RefStatuses;

use App\Models\Ref\Status;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';

    public $perPage = 10;

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
        $refStatuses = Status::where('name', 'like', '%' . $this->search . '%')                                    
                            ->paginate($this->perPage);

        return view('livewire.ref-status.index', compact('refStatuses'));
    }

    public function delete(Status $refStatus)
    {
        $refStatus->delete();

        return $this->redirectRoute('ref-statuses.index', navigate: true);
    }
}
