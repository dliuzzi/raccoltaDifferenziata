<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageContentController extends Controller
{
    public function raccoltaDifferenziata()
    {
        return view('pages.raccolta-differenziata');
    }

    public function ingombranti()
    {
        return view('pages.ingombranti');
    }

    public function portaAPorta()
    {
        return view('pages.porta-a-porta');
    }
}