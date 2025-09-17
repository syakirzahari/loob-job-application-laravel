<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $userModel;
    
    public $name = '';
    public $full_name = '';
    public $email = '';

    public function rules(): array
    {
        return [
			'name' => 'required|string',
			'full_name' => 'required|string',
			'email' => 'required|string',
        ];
    }

    public function setUserModel(User $userModel): void
    {
        $this->userModel = $userModel;
        
        $this->name = $this->userModel->name;
        $this->full_name = $this->userModel->full_name;
        $this->email = $this->userModel->email;
    }

    public function store(): void
    {
        $this->userModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->userModel->update($this->validate());

        $this->reset();
    }
}
