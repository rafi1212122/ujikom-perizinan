<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class CreatePermit extends Component
{
    public $room_query;

    public function render()
    {
        return view('livewire.create-permit', [
            'distinct_room' => Student::select('room')->distinct()->get(),
            'students' => $this->room_query?Student::where("room", $this->room_query)->get():[]
        ]);
    }
}
