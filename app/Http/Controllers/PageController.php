<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;

class PageController extends Controller
{
    public function home()
{
    $featuredProjects = Project::where('status', 'published')
        ->whereNotNull('slug')
        ->where('is_featured', true)
        ->latest()
        ->take(3)
        ->get();

    $featuredServices = Service::where('status', 'published')
        ->where('is_featured', true)
        ->latest()
        ->take(6)
        ->get();

    return view('pages.home', compact('featuredProjects', 'featuredServices'));
}

    public function story()
    {
        return view('pages.story');
    }

    public function works()
{
    $categories = [
        'All',
        'Restaurant Systems',
        'Clinic Systems',
        'Salon Systems',
        'Business Dashboards',
        'Automation',
    ];

    $selectedCategory = request('category', 'All');

    $projectsQuery = Project::where('status', 'published')
        ->whereNotNull('slug');

    if ($selectedCategory !== 'All') {
        $projectsQuery->where('category', $selectedCategory);
    }

    $projects = $projectsQuery
        ->latest()
        ->get();

    $featuredProject = Project::where('status', 'published')
        ->whereNotNull('slug')
        ->where('is_featured', true)
        ->latest()
        ->first();

    return view('pages.works', compact(
        'projects',
        'featuredProject',
        'categories',
        'selectedCategory'
    ));
}

    public function projectDetails(Project $project)
    {
        abort_if($project->status !== 'published', 404);

        $relatedProjects = Project::where('status', 'published')
            ->where('id', '!=', $project->id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.project-details', compact('project', 'relatedProjects'));
    }

    public function bookCall()
    {
        $services = Service::where('status', 'published')
            ->orderBy('title')
            ->get();

        return view('pages.book-a-call', compact('services'));
    }
}