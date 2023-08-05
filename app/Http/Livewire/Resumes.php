<?php

namespace App\Http\Livewire;

use App\Models\Resume;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * @property $user_id
 */
class Resumes extends Component
{
    use WithFileUploads;

    public $resume;
    public $resumeLink;
    public $showConfirmDeleteResume;
    public $deleteId;

    protected function rules(): array
    {
        return [
            "resume" => "required|mimes:pdf", // Adjust the validation rules as needed
        ];
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function mount(): void
    {
        $this->user_id = auth()->user()->user_id;
        $this->resume = auth()->user()->resume;
    }

    public function save(): void
    {
        if (!Auth::check()) {
            abort(403);
        }
        $this->validate([
            "resume" => "required|mimes:pdf|max:2048",
        ]);

        $user = auth()->user();
        $filename = $this->resume->store("/", "resumes");
        $user->resume()->create([
            "resume" => $filename,
            "resumeLink" => Storage::disk("resumes")->url($filename),
        ]);
        $this->dispatchBrowserEvent("notify", "Resume saved!");
    }

    public function deleteId($id): void
    {
        if (!Auth::check()) {
            abort(403);
        }
        $this->deleteId = $id;
        $this->showConfirmDeleteResume = true;
    }

    public function delete(): void
    {
        if (!Auth::check()) {
            abort(403);
        }
        $resume = Resume::find($this->deleteId);
        if ($resume->resume) {
            $resumePath = $resume->resume;
            // Delete the pdf file from storage
            Storage::disk("resumes")->delete($resumePath);
        }
        // Delete the Timeline model instance
        $resume->delete();
        $this->showConfirmDeleteResume = false;
        $this->dispatchBrowserEvent("notify", "Resume deleted!");
    }

    public function download($resumeId, $newFilename): BinaryFileResponse
    {
        $resume = Resume::findOrFail($resumeId);
        return response()->download(
            storage_path("app/resumes/") . $resume->resume,
            $newFilename
        );
    }

    public function render(): Factory|View|Application
    {
        $resumes = Resume::where("user_id", auth()->id())->get();
        return view("livewire.resumes", compact("resumes"));
    }
}
