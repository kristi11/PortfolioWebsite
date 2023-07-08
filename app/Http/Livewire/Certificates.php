<?php

    namespace App\Http\Livewire;

    use App\Models\Certificate;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Livewire\Component;

    class Certificates extends Component
    {
        public Certificate $certificate;
        public $showCertificateModal = false;
        public $showConfirmDeleteCertificate = false;
        public $deleteId = "";

        protected function rules(): array
        {
            return [
                "certificate.name" => [
                    "required",
                    "max:255",
                    "string",
                    "regex:/^[a-zA-Z\s]+$/",
                ],
                "certificate.organization" => [
                    "required",
                    "max:255",
                    "string",
                    "regex:/^[a-zA-Z\s]+$/",
                ],
                "certificate.credentialID" => "nullable|string",
                "certificate.credentialURL" => "nullable|url",
                "certificate.description" => ["required","min:50", "max:1000", "string"],
                "certificate.month_started" => "required|numeric",
                "certificate.month_ended" =>
                    "nullable|numeric|required_with:certificate.year_ended",
                "certificate.year_started" => "required|numeric",
                "certificate.year_ended" =>
                    "nullable|numeric|gt:certificate.year_started|required_with:certificate.month_ended",
            ];
        }

        public function mount()
        {
            $this->certificate = $this->makeBlankCertificate();
        }

        public function makeBlankCertificate()
        {
            return Certificate::make([]);
        }

        public function save()
        {
            $this->validate();
            $user = auth()->user();
            $this->certificate->user_id = $user->id;
            $this->certificate->save();
            $this->showCertificateModal = false;
            $this->dispatchBrowserEvent("notify", "Certificate saved!");
        }

        public function addCertificate()
        {
            $this->certificate = $this->makeBlankCertificate();
            $this->showCertificateModal = true;
        }

        public function edit(Certificate $certificate)
        {
            if ($this->certificate->isNot($certificate)) {
                $this->certificate = $certificate;
            }
            $this->showCertificateModal = true;
        }

        public function deleteId($id)
        {
            $this->deleteId = $id;
            $this->showConfirmDeleteCertificate = true;
        }

        public function delete()
        {
            $workExperience = Certificate::find($this->deleteId);
            // Delete the Experience model instance
            $workExperience->delete();
            $this->showConfirmDeleteCertificate = false;
            $this->dispatchBrowserEvent("notify", "Certificate deleted!");
        }

        public function render(): Factory|View|Application
        {
            $certificates = Certificate::where("user_id", auth()->id())
                ->orderByDesc("created_at")
                ->get();
            return view(
                "livewire.certificates",
                compact("certificates")
            );
        }
    }
