<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditModal extends Component
{
    /**
     * Create a new component instance.
     */

    public $entity;

    public function __construct($entity)
    {
        $this->entity=$entity;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-modal');
    }
}
