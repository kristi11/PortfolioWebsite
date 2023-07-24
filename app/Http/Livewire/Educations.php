<?php

namespace App\Http\Livewire;

use App\Models\Education;
use App\Models\Functions;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

//    use App\Models\Functionality;

class Educations extends Component
{
    public Education $education;
    public $showEditEducation = false;
    public $showConfirmDeleteEducation = false;
    public $deleteId = "";

    protected function rules(): array
    {
        return [
            "education.school" => [
                "required",
                "max:255",
                "string",
                "regex:/^[a-zA-Z\s]+$/",
            ],
            "education.link" => "required|url",
            "education.country" => [
                "required",
                "max:255",
                "string",
                "in:" .
                collect(Functions::COUNTRIES)
                    ->keys()
                    ->implode(","),
            ],
            "education.degree" => [
                "required",
                "max:255",
                "string",
                Rule::in(Functions::DEGREES),
            ],
            "education.field" => [
                "required",
                "max:255",
                "string",
                "regex:/^[a-zA-Z\s]+$/",
            ],
            "education.month_started" => "required|numeric",
            "education.month_ended" =>
                "nullable|numeric|required_with:education.year_ended",
            "education.year_started" => "required|numeric",
            "education.year_ended" =>
                "nullable|numeric|gt:education.year_started|required_with:education.month_ended",
        ];
    }

    public function edit(Education $education): void
    {
        if ($this->education->isNot($education)) {
            $this->education = $education;
        }
        $this->showEditEducation = true;
    }

    public function mount(): void
    {
        $this->education = $this->makeBlankEducation();
    }

    public function makeBlankEducation(): Education
    {
        if (!Auth::check()) {
            abort(403);
        }
        return Education::make([]);
    }

    public function addEducation(): void
    {
        $this->validate();
        $this->education = $this->makeBlankEducation();
    }

    public function save(): void
    {
        if (!Auth::check()) {
            abort(403);
        }
        $this->validate();
        $user = auth()->user();
        $this->education->user_id = $user->id;
        $this->education->save();
        $this->showEditEducation = false;
        $this->dispatchBrowserEvent("notify", "Education saved!");
    }

    public function deleteId($id): void
    {
        if (!Auth::check()) {
            abort(403);
        }
        $this->deleteId = $id;
        $this->showConfirmDeleteEducation = true;
    }

    public function delete(): void
    {
        if (!Auth::check()) {
            abort(403);
        }
        Education::find($this->deleteId)->delete();
        $this->showConfirmDeleteEducation = false;
        $this->education = $this->makeBlankEducation();
        $this->dispatchBrowserEvent("notify", "Education deleted!");
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $educations = Education::where("user_id", auth()->id())->get();
        return view("livewire.educations", compact("educations"));
    }
}
