<?php

namespace App\Livewire\RefJobPositions;

use App\Models\Ref\Position;
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
        $refJobPositions = Position::where('name', 'like', '%' . $this->search . '%')
                                    ->paginate($this->perPage);

        return view('livewire.ref-job-position.index', compact('refJobPositions'));
    }

    public function delete(Position $refJobPosition)
    {
        $refJobPosition->delete();

        return $this->redirectRoute('ref-job-positions.index', navigate: true);
    }
}
