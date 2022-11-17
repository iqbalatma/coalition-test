<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Statics\GlobalData;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function index():Response
    {
        $data = [
            "title" => "Projects",
            "projects" => Project::paginate(GlobalData::DEFAULT_PERPAGE)
        ];
        return response()->view("projects.index", $data);
    }
}
