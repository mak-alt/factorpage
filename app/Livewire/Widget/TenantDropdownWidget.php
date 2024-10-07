<?php

namespace App\Livewire\Widget;

use App\Models\Tenant;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TenantDropdownWidget extends Component
{

    public function render()
    {
        return view('livewire.widget.tenant-dropdown-widget');
    }
}
