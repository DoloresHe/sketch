<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Thread;
use App\Models\Post;
use App\Http\Requests\StoreThread;
use App\Http\Resources\ThreadResources\ThreadsResource;
use App\Http\Resources\ThreadResources\ThreadProfileResource;

class ThreadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
        $this->middleware('filter_thread')->only('show');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $group = Auth::guard('api')->check()? Auth::guard('api')->user()->user_group:2;//未登陆用户只能看小于2的
        $threads = Thread::threadInfo()
        ->inChannel($request->channel)
        ->inLabel($request->label)
        ->isNotBook()
        ->isPublic()
        ->canSee($group)
        ->with('author')
        ->orderBy('last_responded_at', 'desc')
        ->paginate(config('constants.threads_per_page'));
        return response()->success(new ThreadsResource($threads));
        //return view('test',compact('threads'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreThread $form)//
    {
        $thread = $form->generateThread();
        return response()->success($thread);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $thread
    * @return \Illuminate\Http\Response
    */
    public function show($thread)
    {
        $thread = Thread::find($thread);
        if($thread){
            $thread->load('author');
            $posts = Post::where('thread_id',$thread)
            ->with('author', 'mainchapter')
            ->orderBy('created_at','asc')
            ->paginate(config('constants.posts_per_page'));
            return response()->success([
                'thread' => new ThreadProfileResource($thread),
                'posts' => new PostsResource($posts),
            ]);
        }else{
            return response()->error(config('error.404'), 404);
        }

    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
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
}
