<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\questionRequest;

use App\Question;
use App\Qcm;
use Auth;

class QuestionController extends Controller
{
    //

        public function __construct(){

        $this->middleware('auth');
    }

    //lister les qcms

    //creation de Qcm: formulaire d'enregistrement
    
    public function index($id){
        
        $qcm = qcm::find($id);
        $questions=$qcm->questions;
        //dd($questions);
        return view('question.index', ['qcm' => $qcm,'questions'=>$questions]);

    }


    

    //Enregistrer un Qcm
    public function store(questionRequest $request, $id){

    	$qcm = Qcm::find($id);
        $qst = new Question();
        $qst->enonce = $request->input('enonce');
        $qst->commentaire = $request->input('comment');
        $qst->avecchoix = $request->get('avecchoix');
        $qst->qcm_id = $id;
        
        $qst->save();
       
        session()->flash('success','Le question a étè bien enregistré !');

        return redirect('qsts/index/'.$id);
    }

    //Permet de recuperer un qcm puis le mettre dans un formulaire
    public function edit($id){

        $qst = Question::find($id);
        return view('question.edit', ['qst'=>$qst]);
    }


    public function update(questionRequest $request, $id){

        $qst = Question::find($id);
        $qst->enonce = $request->input('enonce');
        $qst->commentaire = $request->input('comment');
        $qst->avecchoix =$request->get('avecchoix');

        $qst->save();
        session()->flash('success','Le question a étè bien modifiée !');

        return redirect('qsts/index/'.$qst->qcm_id);
    }


    public function destroy($id){
        //dd($id);
        $this->middleware('auth');
    	$qst = Question::find($id);
    	$qst->delete();

        return redirect('qsts/index/'.$qst->qcm_id);
    }

    //Persister la modification dans la base de donnees
   /* public function update(qcmRequest $request, $id){

        $qcm = Qcm::find($id);
        $qcm->titre = $request->input('titre');
        $qcm->introduction = $request->input('introduction');
        $qcm->breponse = $request->input('breponse');
        $qcm->preponse = $request->input('preponse');
        $qcm->mreponse = $request->input('mreponse');
        $qcm->bareme = $request->input('bareme');
        $qcm->partagee =$request->get('partagee');

        $qcm->save();
        session()->flash('success','Le Qcm a étè bien modifiée !');


        return redirect('qcms');
    }

    //permet de supprimer un Qcm
    public function destroy(Request $request, $id){
$qcm = Qcm::find($id);

$qcm->delete();

        return redirect('qcms');
    }*/
}
