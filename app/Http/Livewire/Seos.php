<?php

namespace App\Http\Livewire;

use App\Models\SEO;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Seos extends Component
{
    public SEO $seo;

    public $showSEOModal = false;
    public $showConfirmDeleteSEO = false;
    public $deleteId = "";

    protected function rules(): array
    {
        return [
            "seo.title" => [
                "nullable",
                "max:60",
                "string",
            ],
            "seo.description" => ["nullable", "max:160", "string"],
        ];
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function mount(): void
    {
        $this->seo = $this->makeBlankSEO();
    }

    public function makeBlankSEO()
    {
        if (!Auth::check()) {
            abort(403);
        }
        return SEO::make([]);
    }

    public function save(): void
    {
        if (!Auth::check()) {
            abort(403);
        }
        $this->validate();
        $user = auth()->user();
        $this->seo->user_id = $user->id;
        $this->seo->save();
        $this->showSEOModal = false;
        $this->dispatchBrowserEvent("notify", "SEO saved!");
    }

    public function addSEO(): void
    {
        $this->seo = $this->makeBlankSEO();
        $this->showSEOModal = true;
    }

    public function edit(SEO $seo): void
    {
        if ($this->seo->isNot($seo)) {
            $this->seo = $seo;
        }
        $this->showSEOModal = true;
    }

    public function deleteId($id): void
    {
        if (!Auth::check()) {
            abort(403);
        }
        $this->deleteId = $id;
        $this->showConfirmDeleteSEO = true;
    }

    public function delete(): void
    {
        if (!Auth::check()) {
            abort(403);
        }
        $workExperience = SEO::find($this->deleteId);
        // Delete the Experience model instance
        $workExperience->delete();
        $this->showConfirmDeleteSEO = false;
        $this->dispatchBrowserEvent("notify", "SEO deleted!");
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $seos = SEO::where("user_id", auth()->id())
            ->get();
        return view('livewire.seos', compact("seos"));
    }


}
