<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $educationList = Education::query()
            ->statusActive()
//            ->where('status', 1)
            ->select('education_date', 'university_name', 'university_branch', 'description')
            ->orderBy('order', 'ASC')
            ->get();

        $experienceList= Experience::query()
            ->where('status', 1)
            ->select('task_name', 'company_name', 'description', 'date')
            ->orderBy('order', 'ASC')
            ->get();

        return view('pages.index', compact('educationList', 'experienceList'));
    }

    public function resume()
    {
        return view('pages.resume');
    }

    public function portfolio()
    {
        return view('pages.portfolio');
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function contact()
    {
        return view('pages.contact');
    }

}
