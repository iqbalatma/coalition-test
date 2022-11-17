<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function index():Response
    {
        $data = [
            "title" => "Projects",
            "projects" => Project::all()
        ];
        return response()->view("projects.index", $data);
    }

    public function store(ProjectStoreRequest $request)
    {
        Project::create($request->validated());
        
        return redirect()->back()->with("success", "Add new project successfully");
    }
}
