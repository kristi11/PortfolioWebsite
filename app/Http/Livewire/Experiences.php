<?php

    namespace App\Http\Livewire;

    use App\Models\Experience;
    use App\Models\Functions;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Livewire\Component;

    class Experiences extends Component
    {
        public Experience $experience;
        public bool $showExperienceModal = false;
        public $showConfirmDeleteExperience = false;

        public $deleteId = "";

        protected function rules(): array
        {
            return [
                "experience.position" => [
                    "required",
                    "max:255",
                    "string",
                    "regex:/^[a-zA-Z\s]+$/",
                ],
                "experience.company" => [
                    "required",
                    "max:255",
                    "string",
                    "regex:/^[a-zA-Z\s]+$/",
                ],
                "experience.link" => "nullable|url",
                "experience.location" => [
                    "required",
                    "max:255",
                    "string",
                    "in:" .
                    collect(Functions::COUNTRIES)
                        ->keys()
                        ->implode(","),
                ],
                "experience.type" => [
                    "required",
                    "max:255",
                    "string",
                    "in:" .
                    collect(Functions::EMPLOYMENT)
                        ->keys()
                        ->implode(","),
                ],
                "experience.description" => ["required","min:50","max:1000", "string"],
                "experience.month_start" => "required|numeric",
                "experience.month_end" =>
                    "nullable|numeric|required_with:experience.year_end",
                "experience.year_start" => "required|numeric",
                "experience.year_end" =>
                    "nullable|numeric|gt:experience.year_start|required_with:experience.month_end",
            ];
        }

        public function mount()
        {
            $this->experience = $this->makeBlankExperience();
        }

        public function makeBlankExperience(): Experience
        {
            return Experience::make([]);
        }

        public function edit(Experience $experience)
        {
            if ($this->experience->isNot($experience)) {
                $this->experience = $experience;
            }
            $this->showExperienceModal = true;
        }

        public function addExperience()
        {
            $this->experience = $this->makeBlankExperience();
            $this->showExperienceModal = true;
        }

        public function save()
        {
            $this->validate();
            $user = auth()->user();
            $this->experience->user_id = $user->id;
            $this->experience->save();
            $this->showExperienceModal = false;
            $this->dispatchBrowserEvent("notify", "Experience saved!");
        }

        public function deleteId($id)
        {
            $this->deleteId = $id;
            $this->showConfirmDeleteExperience = true;
        }

        public function delete()
        {
            $experience = Experience::find($this->deleteId);
            // Delete the Experience model instance
            $experience->delete();
            $this->showConfirmDeleteExperience = false;
            $this->dispatchBrowserEvent("notify", "Experience deleted!");
        }

        public function render(): Factory|View|Application
        {
            $experiences = Experience::where("user_id", auth()->id())
                ->orderByDesc("created_at")
                ->get();
            return view(
                "livewire.experiences",
                compact("experiences")
            );
        }
    }
