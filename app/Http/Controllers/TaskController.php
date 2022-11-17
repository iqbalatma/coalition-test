<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function index():Response
    {
        $data = [
            "title" => "Tasks",
            "projects" => Project::with(["task"=> function ($query)
            {
                return $query->orderBy("priority");   
            }])->get()
        ];

        return response()->view("tasks.index", $data);
    }
}
