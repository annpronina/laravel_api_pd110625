<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller implements HasMiddleware
{
    public static function middleware() {
        return [
            new Middleware('auth:sanctum', except: ['index'])
        ];
    }

    public function index(Task $task)
    {
        return response()->json($task->comments);
    }

    public function store(Request $request, Task $task, Comment $comment)
    {
        $request->validate(['content' => 'required|string']);

        $comment = $task->comments()->create([
            'content' => $request->content, 
            'task_id' => $task->id,
            'user_id' => Auth::id()
        ]);

        return response()->json($comment, 201);
    }

    public function destroy(Task $task, Comment $comment)
    {
        $comment->delete();
        return response()->json(null, 204);
    }
}

?>