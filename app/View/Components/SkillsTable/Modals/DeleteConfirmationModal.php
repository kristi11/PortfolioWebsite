<?php

    namespace App\View\Components\SkillsTable\Modals;

    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class DeleteConfirmationModal extends Component
    {
        public function render(): View
        {
            return view('components.skills-table.modals.delete-confirmation-modal');
        }
    }
