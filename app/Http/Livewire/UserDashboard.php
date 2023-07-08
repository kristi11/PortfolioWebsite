<?php

namespace App\Http\Livewire;

use App\Models\Resume;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UserDashboard extends Component
{
    public function download($resumeId, $newFilename): BinaryFileResponse
    {
        $resume = Resume::findOrFail($resumeId);
        return response()->download(
            storage_path("app/resumes/") . $resume->resume,
            $newFilename
        );
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('livewire.user-dashboard', [
            'user' => Auth::user(),
            'resumes' => Auth::user()->resume,
            'projects' => Auth::user()->project,
            'services' => Auth::user()->services,
            'educations' => Auth::user()->education,
            'experiences' => Auth::user()->experience,
            'certificates' => Auth::user()->certificate,
            'skills' => Auth::user()->skill,
        ]);
    }
}
