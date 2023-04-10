<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
class TaskController extends Controller
{
    public function add(Request $request){
        $user = $request->user();
        Task::create([
            'user_id'=>$user->id,
            'title'=>$request->title,
            'description'=>$request->description,
            'deadline'=>$request->deadline,
        ]);
        return "Sucessful created";
    }
    public function get(Request $request){
        $user_id = $request->user()->id;
        return Task::where('user_id',$user_id)->select('id','title','description','deadline','active')->get();
    }
    public function update(Request $request, Task $task){   
            if (!$task) {
            return response()->json(['error' => 'Task not  not found'], 404);
            }
            $task->update($request->all());
            return $task;
    }  
    public function delete(Request $request, Task $task){   
        if (!$task) {
        return response()->json(['error' => 'Task not  not found'], 404);
        }
        $task->update($request->all());
        return $task;
}  
    
}
