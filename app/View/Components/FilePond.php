<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilePond extends Component
{
    /**
     * Create a new component instance.
     */
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name = 'image',
        public bool|int $multiple = false,
        public bool|int $validate = true,
        public bool|int $preview = true,
        public bool|int $required = false,
        public bool|int $disabled = false,
        public int $previewMax = 200,
        public array|string $accept = ['image/png', 'image/jpeg', 'image/webp', 'image/avif'],
        public string $size = '2MB',
        public int $number = 10,
        public string $label = '',
        public string $sizeHuman = '',
        public array|string $acceptHuman = []
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.file-pond');
    }
}
