<?php

namespace App\Http\Controllers;

use App\Memory;
use App\User;
use Redirect;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\MemoryFormRequest;
use Auth;

use Illuminate\Http\Request;

class MemoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
   {

     $user = Auth::id();

     //fetch 5 posts from database which are active and latest
     $memories = Memory::where('author_id', $user )->orderBy('created_at','desc')->paginate(5);
     //page heading
     $title = 'Your Memories';
     //return home.blade.php template from resources/views folder
     if(!$memories->isEmpty())
     {
         $title = 'Your Memories';
         return view('home')->withMemories($memories)->withTitle($title);
     }
     else
     {
         $title = 'Add Your Memories';
         return view('memories.create')->withTitle($title);
     }
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('memories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemoryFormRequest $request)
    {
    $memory = new Memory();
    $memory->body = $request->get('body');
    $memory->author_id = $request->user()->id;
    if($request->has('public'))
    {
      $memory->public = 0;
      $message = 'Memory Privately Published';
    }
    else
    {
      $memory->public = 1;
      $message = 'Memory Publically Published';
    }
    $memory->save();
    return redirect('memories')->withMessage($message);
  }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $memory = Memory::where('id',$id)->first();
        if($memory && ($request->user()->id == $memory->author_id))
            return view('memories.edit')->with('memory',$memory);

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
        {
   //
   $memory_id = $request->input('memory_id');
   $memory = Memory::find($memory_id);
   if($memory && ($memory->author_id == $request->user()->id || $request->user()->is_admin()))
   {
     $memory->body = $request->input('body');
     if($request->has('save'))
     {
       $memory->public = 0;
       $message = 'Memory saved successfully';
       $landing = 'memories/'.$memory->id.'/edit';
     }
     else {
       $memory->public = 1;
       $message = 'Memory updated successfully';
       $landing = 'memories';
     }
     $memory->save();
          return redirect($landing)->withMessage($message);
   }
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
    $memory = Memory::findOrFail($id);
    if($memory && ($memory->author_id == $request->user()->id || $request->user()->is_admin()))
    {
      $memory->delete();
      $data['message'] = 'memory deleted Successfully';
    }
    else
    {
      $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
    }
    return redirect('/')->with($data);
    }
}
