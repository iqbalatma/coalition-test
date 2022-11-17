<?php

namespace App\Http\Controllers;

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
}
