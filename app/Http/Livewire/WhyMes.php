<?php

namespace App\Http\Livewire;

use App\Models\WhyMe;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

/**
 * @method static where(string $string, int|string|null $id)
 */
class WhyMes extends Component
{
    public WhyMe $whyMe;
    public bool $showWhyMeModal = false;
    public $showConfirmDeleteWhyMe = false;

    public $deleteId = "";

    protected function rules(): array
    {
        return [
            "whyMe.description" => ["required","min:50","max:1000", "string"],
        ];
    }

    public function mount(): void
    {
        $this->whyMe = $this->makeBlankWhyMe();
    }

    public function makeBlankWhyMe(): WhyMe
    {
        return WhyMe::make([]);
    }

    public function edit(WhyMe $whyMe): void
    {
        if ($this->whyMe->isNot($whyMe)) {
            $this->whyMe = $whyMe;
        }
        $this->showWhyMeModal = true;
    }

    public function addWhyMe(): void
    {
        $this->whyMe = $this->makeBlankWhyMe();
        $this->showWhyMeModal = true;
    }

    public function save(): void
    {
        $this->validate();
        $user = auth()->user();
        $this->whyMe->user_id = $user->id;
        $this->whyMe->save();
        $this->showWhyMeModal = false;
//        $this->whyMe = $this->makeBlankWhyMe();
        $this->dispatchBrowserEvent("notify", "Why me saved!");
    }

    public function delete(): void
    {
        WhyMe::find($this->deleteId)->delete();
        $this->showConfirmDeleteWhyMe = false;
        $this->whyMe = $this->makeBlankWhyMe();
        $this->dispatchBrowserEvent("notify", "Why me deleted!");
    }

    public function deleteId($id): void
    {
        $this->deleteId = $id;
        $this->showConfirmDeleteWhyMe = true;
    }

    public function render(): Factory|View|Application
    {
        $whyMes = WhyMe::where("user_id", auth()->id())
            ->get();
        return view('livewire.why-mes', compact("whyMes"));
    }
}
