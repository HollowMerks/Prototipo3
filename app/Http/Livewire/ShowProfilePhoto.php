<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowProfilePhoto extends Component
{
    public $photoUrl = null;

    public $isOpen = false;

    protected $listeners = ['showPhoto'];

    public function showPhoto($url)
    {
        $this->photoUrl = $url;
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->photoUrl = null;
    }

    public function render()
    {
        return view('livewire.show-profile-photo');
    }
}
