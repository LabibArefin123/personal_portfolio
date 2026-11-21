<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;

class AboutPageController extends Controller
{
    public function index()
    {
        $about = AboutPage::first();

        return view('backend.frontend_part.about_page.index', compact('about'));
    }

    public function show(AboutPage $about)
    {
        return view('backend.frontend_part.about_page.show', compact('about'));
    }
}
