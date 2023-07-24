<?php

namespace App\Http\Livewire;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PublicProfile extends Component
{
    public $user;

    public function mount(): void
    {
        $this->user = User::firstOrFail();
    }

    public function download($resumeId, $newFilename): BinaryFileResponse
    {
        $resume = Resume::findOrFail($resumeId);
        return response()->download(
            storage_path("app/resumes/") . $resume->resume,
            $newFilename
        );
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.public-profile', [
            'resume' => $this->user->resume,
            'services' => $this->user->services,
        ]);
    }
}
