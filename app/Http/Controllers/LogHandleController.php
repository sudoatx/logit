<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\SubLog;

class LogHandleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Log::orderBy('created_at', 'desc')->paginate(5);
        return view('logging.index')->with('logs', $logs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logging.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $main_log = new Log;
        $main_log->id = $request->get('id');
        $main_log->title = $request->get('title');
        $main_log->parent_id = $request->get('parent_id');
        $main_log->description = $request->get('description');
        $parent_id = $main_log;
        $main_log->save();



        redirect('./sublogs')->with('parent_id', $parent_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Log::find($id);

        return view('logging.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $log = Log::find($id);
        return view('logging.edit')->with('log', $log);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $main_log = Log::find($id);
        $main_log->title = $request->get('title');
        $main_log->parent_id = $request->get('parent_id');
        $main_log->description = $request->get('description');
        $parent_id = $main_log;
        $main_log->save();

        return redirect('/devlogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    public function sub_handle(Request $request){
        $parent_id = $request->get('parent_id');
        $text = $request->get('text');

        $sub_thread = new SubLog;
        $sub_thread->page_id = $request->get('id');
        $sub_thread->parent_id = $parent_id;
        $sub_thread->sub_body = $text;
        $sub_thread->save();


        return response()->json('Success');
    }
}
