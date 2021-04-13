<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Coop;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
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
        
        // $comment = new Comment;
        // $comment->text = $request->get('comment_text');
        // $comment->user()->associate($request->user());
        // $coop = Coop::find($request->get('coop_id'));
        // $coop->comments()->save($comment);

        $request->validate([
            'coop_id'=>'required',
            'user_id'=>'required',
            'comment_text'=>'required',
        ]);

        $comment = new Comment;
        $comment->comment_text = $request->get('comment_text');
        $comment->coop_id = $request->get('coop_id');
        $comment->commenter_id = request()->user_id;
        $comment->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $cmt)
    { 
        $cmt->delete();
        return redirect()->back()
                            ->with('success','Comment deleted');
    }
}
