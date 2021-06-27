<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProgressBarScript extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $slug = null,
        public $rating = null,
        public $event = null,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.progress-bar-script');
    }
}
