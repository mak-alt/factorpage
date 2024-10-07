<?php

namespace App\Livewire\Customizer\Partials;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Collection;

class MenuItem extends Component
{
    public $items = [];
    public $currentTemplate;


    public function mount($items, $currentTemplate)
    {
        $this->items = [];
        if(count($items) > 0) {
            foreach($items as $item){
                $this->items[] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'link' => $item->link,
                    'target' => $item->target
                ];
            }
        } else {
            $this->items[] = ['id' => uniqid(), 'name' => '', 'link' => '', 'target' => ''];
        }

        $this->currentTemplate = $currentTemplate;

        $this->dispatch('menuDataUpdated', $this->items);
    }

    public function addItem()
    {
        $this->items[] = ['id' => uniqid(), 'name' => '', 'link' => '', 'target' => ''];
        $this->dispatch('menuDataUpdated', $this->items);
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items); // Reindex the array
        $this->dispatch('menuDataUpdated', $this->items);
    }

    
    public function updatedItems($value, $key)
    {
        $this->dispatch('menuDataUpdated', $this->items);
    }

    public function render()
    {
        return view('livewire.customizer.partials.menu-item')->with([
            'items' => $this->items
        ]);
    }
}
