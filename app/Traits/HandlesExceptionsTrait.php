<?php

namespace App\Traits;

use Exception;
use Livewire\Livewire;

trait HandlesExceptionsTrait
{
    protected function handleException($message)
    {
        $this->dispatch('notification:default', ['message' => $message]);
    }
}