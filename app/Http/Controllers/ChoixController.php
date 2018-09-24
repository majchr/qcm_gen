<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\choixRequest;
use App\Choix;
use App\Question;
use Auth;
use Illuminate\Support\Facades\DB;


class ChoixController extends Controller
{
    //


    public function __construct(){

        $this->middleware('auth');
    }




public function index($id){
        
        $question = question::find($id);
        //dd($question);
        $choix=$question->choix;

        
        //dd($questions);
        return view('choix.index', ['question' => $question,'choix'=>$choix]);
    }




    public function store(choixRequest $request, $id){

    	$qst = Question::find($id);
        $choix = new Choix();
        $choix->enonce = $request->input('enonce');
        $choix->is_correct = $request->get('is_correct');
        $choix->question_id = $id;
        
        $choix->save();
       
        session()->flash('success','Le choix a étè bien enregistré !');

        return redirect('choix/'.$id);
    }


    public function edit($id){

        $choix = Choix::find($id);
        return view('choix.edit', ['chx'=>$choix]);
    }



    public function update(choixRequest $request, $id){

        $choix = Choix::find($id);
        $choix->enonce = $request->input('enonce');
        $choix->is_correct =$request->get('is_correct');

        $choix->save();
        session()->flash('success','Le choix a étè bien modifiée !');

        return redirect('choix/'.$choix->question_id);
    }




    public function destroy($id){
        //dd($id);
        $this->middleware('auth');
        $choix = Choix::find($id);
        $choix->delete();

        return redirect('choix/'.$choix->question_id);
    }
}
