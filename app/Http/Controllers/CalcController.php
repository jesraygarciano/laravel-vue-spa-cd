<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calculator;

class CalcController extends Controller
{

    /**
     * Display the home page 
     * 
     * @return \Illuminate\Http\Response
     */
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
            return view('home', $items);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
// }
