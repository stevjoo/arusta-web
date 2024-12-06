<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\File;

class ClientComponent extends Component
{
   
    public $images;

    public function __construct()
    {

        $this->images = File::allFiles(public_path('asset/ClientLogos'));

        // Map the files to full URLs
        $this->images = collect($this->images)->map(function ($image) {
            return asset('asset/ClientLogos/' . $image->getFilename());
        });
    }

    public function render()
    {
        return view('components.client-component');
    }
}
