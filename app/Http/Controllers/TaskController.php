<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
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


    public function edit(int $id):Response
    {
        $data = [
            "title" => "Edit Task",
            "tasks" => Task::find($id),
            "projects" => Project::all()
        ];
        return response()->view("tasks.edit", $data);
    }


    public function delete(int $id):Response
    {
        $data = [
            "title" => "Edit Task",
            "id" => $id
        ];
        return response()->view("tasks.delete", $data);
    }

    public function update(TaskUpdateRequest $request, int $id):RedirectResponse
    {
        $validatedData = $request->validated();

        $updated = Task::where("id", $id)->update($validatedData);

        if($updated){
            return redirect()->route("tasks.index")->with("success", "Update task successfully");
        }

        return redirect()->route("tasks.index")->with("failed", "Update task failed");
    }

    public function destroy(int $id)
    {
        $deleted = Task::destroy($id);

        if($deleted){
            return redirect()->route("tasks.index")->with("success", "Delete task successfully");
        }

        return redirect()->route("tasks.index")->with("failed", "Delete task failed");
    }
}
