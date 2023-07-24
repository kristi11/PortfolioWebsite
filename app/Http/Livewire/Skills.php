<?php

namespace App\Http\Livewire;

use App\Models\Functions;
use App\Models\Skill;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @property mixed $skills
 * @property mixed $skillsQuery
 */
class Skills extends Component
{
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $showFilters = false;
    public $selectPage = false;
    public $selectAll = false;
    public $sortDirection = "asc";
    public $sortField = "name";
    public Skill $editing;
    public $selected = [];
    public $name = "";
    public $years;
    public $advancedFilters = [
        "search" => "",
        "skillName" => "",
        "years" => null,
        "date-min" => null,
        "date-max" => null,
    ];

    protected $queryString = ["sortField", "sortDirection"];

    use WithPagination;

    //    Validation rules
    public function rules(): array
    {
        return [
            "editing.name" => [
                "sometimes",
                "required",
                "in:" .
                collect(Functions::getValidValues())
                    ->keys()
                    ->implode(","),
                Rule::unique("skills", "name")
                    ->where("user_id", Auth::user()->id)
                    ->ignore($this->editing["id"]),
            ],
            "editing.category" => [
                "required",
                "in:" .
                collect(Functions::CATEGORY)
                    ->keys()
                    ->implode(","),
            ],
            "editing.years" =>
                "required|numeric|between:" .
                Functions::MIN_YEARS_OF_EXPERIENCE .
                "," .
                Functions::MAX_YEARS_OF_EXPERIENCE,
        ];
    }

    public function callTimeline(): void
    {
        $this->emit("callTimeline");
    }

    //        select all checkboxes
    public function selectAll(): void
    {
        $this->selectAll = true;
    }

    //      uncheck all selected checkboxes when unchecking one checkbox
    public function updatedSelected(): void
    {
        $this->selectAll = false;
        $this->selectPage = false;
    }

    //    Get the id's of all the selected checkboxes
    public function updatedSelectPage($value): void
    {
        if (!Auth::check()) {
            abort(403);
        }
        $this->selected = $value
            ? $this->skills->pluck("id")->map(fn($id) => (string)$id)
            : [];
    }

    public function noneSelected(): bool
    {
        // check the number of selected elements and return true if zero, false otherwise
        return count($this->selected) === 0;
    }

    //    Delete selected checkboxes
    public function deleteSelected(): void
    {
        if (!Auth::check()) {
            abort(403);
        }
        (clone $this->skillsQuery)
            ->unless(
                $this->selectAll,
                fn($query) => $query->whereKey($this->selected)
            )
            ->delete();

        $this->showDeleteModal = false;
        $this->dispatchBrowserEvent("notify", "Deleted!");
    }

    //    Sort by ascending or descending
    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection =
                $this->sortDirection === "asc" ? "desc" : "asc";
        } else {
            $this->sortDirection = "asc";
        }
        $this->sortField = $field;
    }

    //    Message to be displayed if user selects a skill name that's already present. Skill should be unique
    public function messages(): array
    {
        return [
            "editing.name.unique" =>
                "The skill you are trying to add already exist in your list",
        ];
    }

    //    Blank modal is created
    public function makeBlankSkill()
    {
        if (!Auth::check()) {
            abort(403);
        }
        return Skill::make([]);
    }

    //    Create function
    public function create(): void
    {
        if ($this->editing->getKey()) {
            $this->editing = $this->makeBlankSkill();
        }
        $this->showEditModal = true;
    }

    //    Edit function
    public function edit(Skill $skill): void
    {
        if ($this->editing->isNot($skill)) {
            $this->editing = $skill;
        }
        $this->showEditModal = true;
    }

    public function save(): void
    {
        if (!Auth::check()) {
            abort(403);
        }
        $this->validate();
        $user = auth()->user();
        // Check if the skill being updated already exists in the pivot table
        $existingSkill = $user->skill()->where('skill_id', $this->editing->id)->exists();
        if ($existingSkill) {
            // Detach the old skill from the user
            $user->skill()->detach($this->editing->id);
        }
        // Update the skill model with new data
        $this->editing->user_id = $user->id;
        $this->editing->save();
        // Attach the updated or new skill to the user using the pivot table
        $user->skill()->attach($this->editing->id);
        $this->showEditModal = false;
        $this->dispatchBrowserEvent("notify", "Skill saved!");
    }

    //    Reset advanced filter to empty
    public function resetFilters(): void
    {
        $this->reset("advancedFilters");
    }

    #[NoReturn]
    public function mount(): void
    {
        $this->editing = $this->makeBlankSkill();
    }

    //    Reset to page 1 of the pagination when searching for a skill to avoid errors
    public function updatedAdvancedFilters(): void
    {
        $this->resetPage();
    }

    //    Using computed property so the results can be called once then cashed, so we don't make a bunch of queries on the same request
    public function getSkillsQueryProperty()
    {
        return Skill::query()
            ->where("user_id", Auth::user()->id)
            ->when(
                $this->advancedFilters["skillName"],
                fn($query, $skillName) => $query->where("name", $skillName)
            )
            ->when(
                $this->advancedFilters["years"],
                fn($query, $years) => $query->where("years", $years)
            )
            ->when(
                $this->advancedFilters["date-min"],
                fn($query, $dateMin) => $query->where(
                    "created_at",
                    ">=",
                    $dateMin
                )
            )
            ->when(
                $this->advancedFilters["date-max"],
                fn($query, $dateMax) => $query->where(
                    "created_at",
                    "<=",
                    $dateMax
                )
            )
            ->when(
                $this->advancedFilters["search"],
                fn($query, $search) => $query->where(
                    "name",
                    "like",
                    "%" . $search . "%"
                )
            )
            ->orderBy($this->sortField, $this->sortDirection);
    }

    public function getSkillsProperty()
    {
        return $this->skillsQuery->paginate(5);
    }

    public function render(): Factory|View|Application
    {
        if ($this->selectAll) {
            $this->selected = $this->skills
                ->pluck("id")
                ->map(fn($id) => (string)$id);
        }
        return view("livewire.skills", [
            "skills" => $this->skills,
            "noneSelected" => $this->noneSelected(),
        ]);
    }
}
