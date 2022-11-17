<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Project;
use App\Models\Task;
use Exception;
use Illuminate\Http\RedirectResponse;
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

    public function store(TaskStoreRequest $request):RedirectResponse
    {
        $validatedData = $request->validated();

        try{
            Task::create($validatedData);
        }catch(Exception $e){
            
        }
        
        return redirect()->back()->with("success", "Add new task successfully");
    }
}
