<?php

// PostController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Post;
use App\Calculator;

class PostController extends Controller
{
    public function store(Request $request)
    {
      $post = new Post([
        'title' => $request->get('title'),
        'body' => $request->get('body')
      ]);

      $post->save();

      return response()->json('successfully added');
    }

    public function index()
    {
      return new PostCollection(Post::all());
    }

    public function edit($id)
    {
      $post = Post::find($id);
      return response()->json($post);
    }

    public function update($id, Request $request)
    {
      $post = Post::find($id);

      $post->update($request->all());

      return response()->json('successfully updated');
    }

    public function delete($id)
    {
      $post = Post::find($id);

      $post->delete();

      return response()->json('successfully deleted');
    }



    // Calculator side

    public function home()
    {
        return $this->render();
    }

    public function calc(Request $request)
    {
        return $this->render($request->all());
    }

    private function render($items = null)
    {
          $c = new Calculator();        
          if (is_array($items) && isset($items['a']) && isset($items['b']) && isset($items['action'])){
              $action = $items['action'];
              $a = floatval($items['a']);
              $b = floatval($items['b']);
              if ($action == '+'){
                  $result = $c->sum($a, $b);
              }else if ($action == '-'){
                  $result = $c->diff($a, $b);
              }else if ($action == '*') {
                  $result = $c->multiplication($a, $b);
              }else{
                  $result = $c->div($a, $b);
              }
              $items['result'] = $result;
          }else{
              $items = array(
                  'a' => '',
                  'b' => '',
                  'action' => '+',
              );
          }
          return view('calc', $items);
    }
    
}