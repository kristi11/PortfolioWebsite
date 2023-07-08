<?php

    namespace App\View\Components;

    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class WorkExperienceForm extends Component
    {
        public function render(): View
        {
            return view('components.work-experience-form');
        }
    }
