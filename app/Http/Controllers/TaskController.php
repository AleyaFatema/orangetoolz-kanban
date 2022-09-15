<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todoList = Task::whereStatus('todo')->get();
        $progressList = Task::whereStatus('inprogress')->get();
        $doneList = Task::whereStatus('done')->get();
        return view('task',compact('todoList','progressList','doneList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            Task::create($request->all());
            return back();
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }

    /**
     * @deprecated
     * GET route for status update to "inprogress"
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateToInProgressGet($id)
    {
        Task::where("id", $id)
            ->update([
                "status" => "inprogress",
                "updated_at" => now()
            ]);
        return back();
    }

    /**
     * POST route for status update to "inprogress"
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateToInProgress(Request $request) {

        $id = $request->get('id');
        Task::where("id", $id)
            ->update([
                "status" => "inprogress",
                "updated_at" => now()
            ]);
        return back();
    }

    /**
     * @deprecated
     * GET route to status update to "done"
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateToDoneGet($id)
    {
        Task::where("id", $id)
            ->update([
                "status" => "done",
                "updated_at" => now()
            ]);

        return back();
    }

    /**
     * POST route form status update to "done"
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateToDone(Request $request)
    {
        $id = $request->get('id');

        Task::where("id", $id)
            ->update([
                "status" => "done",
                "updated_at" => now()
            ]);

        return back();
    }


}
