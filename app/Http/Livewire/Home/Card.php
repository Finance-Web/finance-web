<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Carbon\Carbon;

use App\Models\Event;
use App\Models\Employee;

class Card extends Component
{
    public $active_employees, $inactive_employees, $work_leaves_reports, $internship_status;

    public function mount()
    {
        $this->active_employees = Employee::where('status', 'Active')->count();
        $this->inactive_employees = Employee::where('status', 'Inactive')->count();
        $this->work_leaves_reports = Event::where('event_name', 'like', '%Cuti')->where('event_start', '<=', Carbon::today())->count();
        $this->internship_status = Employee::whereMonth('end_date', '=', date('m'))->count();
    }

    public function render()
    {
        return view('livewire.home.card');
    }
}
