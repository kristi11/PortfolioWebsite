<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Illuminate\Http\RedirectResponse;


class SecureMailto extends Component
{
    public $email;

    public function redirectToMailto()
    {
        $encodedEmail = urlencode($this->email);
        $mailtoLink = "mailto:$encodedEmail";
        return redirect()->to($mailtoLink);
    }


    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.secure-mailto');
    }
}
