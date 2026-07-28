<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;
use App\Models\ContactMessage;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $skills = Skill::active()->orderBy('sort_order')->get()->groupBy('category');
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $projects = Project::active()->featured()->orderBy('sort_order')->get();
        $services = Service::active()->orderBy('sort_order')->get();
        $testimonials = Testimonial::active()->orderBy('sort_order')->get();
        $contactInfo = ContactInformation::first();

        return view('portfolio.index', compact(
            'skills',
            'experiences',
            'projects',
            'services',
            'testimonials',
            'contactInfo'
        ));
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully! I\'ll get back to you soon.',
        ]);
    }
}
