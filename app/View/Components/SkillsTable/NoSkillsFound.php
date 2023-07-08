<?php

    namespace App\View\Components\SkillsTable;

    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class NoSkillsFound extends Component
    {
        public function render(): View
        {
            return view('components.skills-table.no-skills-found');
        }
    }
