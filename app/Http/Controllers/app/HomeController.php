<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Job;
use App\Models\Opinion;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $sliders = Slider::all();
        $about_us = Setting::where('subject', 'about_us')->get();
        $call_us = Setting::where('subject', 'call_us')->get();
        $services = Service::all();
        $categories = Category::all();
        $jobs = Job::all();
        $opinions = Opinion::all();
        $blogs = Blog::all();
        $maps = Setting::where('subject', 'maps')->get();
        $socialMedia = SocialMedia::all();
        $logo = Setting::where('subject', 'logo')->first();

        return response()->view('app.index', [
            'sliders' => $sliders,
            'logo' => $logo,
            'socialMedias' => $socialMedia,
            'about_us' => $about_us,
            'services' => $services,
            'categories' => $categories,
            'jobs' => $jobs,
            'opinions' => $opinions,
            'blogs' => $blogs,
            'call_us' => $call_us,
            'maps' => $maps
        ]);
    }

}
