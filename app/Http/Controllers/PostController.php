<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ayuda a solo obtener los ultimos posts del usuario
        return view ('posts/index', [
            'posts' => Post::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     //return 'Posting Now...';
  //return request('message');
  //$message = request('message');

  $dataValidates = $request->validate([
    'message' => ['required', 'min:8', 'max:255'],
    ]);

//   Post::create([
//       // 'message' => $message,
//       'message' => $request->get('message'),
//        'user_id' => auth()->id(),
//   ]);

    //Generar un registro a traves de una relación hasmany
    //Primero accediendo al usuario desde el request, luego a post desde user
    //y finalmente a create desde post, ahora solo pasar los datos
    //ayuda a que no agarren directamente de el post y lo hace mas seguro para no
    //Extraer del mismo donde venia el user_id
//      $request->user()->posts()->create([
//     'message' => $request->get('message'),
//    ]);

//reduccion del codigo anterior
  $request->user()->posts()->create($dataValidates);

  return to_route('posts.index') -> with ('status', ('Post created succesfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        // if(auth()->user()->id != $post->user_id){
        //     abort(403);
        // }
        $this->authorize('update', $post);

        // forma compactada // return view ('posts/edit', compact('post'));
        return view('posts/edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $dataValidates = $request->validate([
            'message' => ['required', 'min:8', 'max:255'],
            ]);

            $post->update($dataValidates);

            return to_route('posts.index') -> with ('status', ('Post created succesfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return to_route('posts.index') -> with ('status', __('Post deleted successfully!'));
    }
}
