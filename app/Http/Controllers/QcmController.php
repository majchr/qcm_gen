<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Qcm;
use App\Question;
use App\Choix;
use App\User;
use App\Group;
use App\Http\Requests\qcmRequest;
use App\Http\Requests\fixRequest;
use Auth;
use Illuminate\Support\Facades\DB;

class QcmController extends Controller
{
    //

    public function __construct(){

        $this->middleware('auth');
    }

    //lister les qcms

    public function index(){
            # code...
        if (Auth::user()->is_admin) {
            # code...
            $listqcm = Qcm::all();
            return view('qcm.index', ['qcms'=>$listqcm]);
        }elseif (Auth::user()->type=='Teacher') {
            # code...
            $listqcm = Auth::user()->qcms;
            return view('qcm.index', ['qcms'=>$listqcm]);
        }elseif (Auth::user()->type=='Student') {
            # code...
             $listgroup = Auth::user()->groupsstd;
             //dd($listgroup);
             foreach ($listgroup as $key => $group) {
                 # code...
                if ($group->pivot->allow) {
                    # code...
                
                $listqcm[$key]=$group->qcms;
                }else{
                    $listqcm[$key]=null;
                }
             }
             //dd($listqcm);
             $req = DB::table('qcm_user')->get();
             //sdd(Auth::user());
             //dd($req);
            return view('student.qcms', ['qcms'=>$listqcm,'group'=>$group, 'req' => $req, 'user' => Auth::user()]);
        }else{
            abort(403);
        }
      
    }




  

    //creation de Qcm: formulaire d'enregistrement
    public function create(){
        
        if (Auth::user()->type=='Teacher') {

        return view('qcm.create');
        }else
        {
            abort(403);
        }
    }


    

    //Enregistrer un Qcm
    public function store(qcmRequest $request){

        $qcm = new Qcm();
        $qcm->titre = $request->input('titre');
        $qcm->introduction = $request->input('introduction');
        $qcm->breponse = $request->input('breponse');
        $qcm->preponse = $request->input('preponse');
        $qcm->mreponse = $request->input('mreponse');
        $qcm->bareme = $request->input('bareme');
        $qcm->partagee = $request->get('partagee');
        $qcm->user_id = Auth::user()->id;

        if($request->hasFile('qcmfile')){
           $path = $request->qcmfile->path();
           $extension = $request->qcmfile->extension();
           $path = $request->qcmfile->store('images');
        }
        
         

        $qcm->save();
        session()->flash('success','Le Qcm a étè bien enregistré !');

        return redirect('qcms');
    }

    //Permet de recuperer un qcm puis le mettre dans un formulaire
    public function edit($id){

        $qcm = Qcm::find($id);

        $this->authorize('update', $qcm);

        return view('qcm.edit', ['qcm'=>$qcm]);


    }

    //Persister la modification dans la base de donnees
    public function update(qcmRequest $request, $id){

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


    public function catalogue(){

        if (Auth::user()->type=='Teacher') {
            # code...
            //$listqcm = Qcm::where('partagee');
           // $listqcm = Qcm::all();
           
            $listqcm = DB::table('qcms')->where( [['deleted_at',null], ['partagee', '1']])->get();

            return view('qcm.catalogue', ['qcms'=>$listqcm]);
        }else
        {
            abort(403);
        } 
    }


    public function consulter($id){

        if (Auth::user()->type=='Teacher') {
            $qcm=qcm::find($id);
           // dd($qcm);
            $questions=$qcm->questions;

           
            return view('qcm.consult',['questions' => $questions,'qcm'=>$qcm]);
           
        }

    }


    public function examen($qcm_id, $group_id){
$qcm=qcm::find($qcm_id);
            $group=Group::find($group_id);
         if (Auth::user()->type=='Student') {
            if (($qcm->users()->where('user_id', '=', Auth::user()->id)->exists())&&($qcm->users()->where('group_id', '=', $group->id)->exists())) {
   // user found
            
                    # code...
                    abort(403);

            }else{
                $qcm=qcm::find($qcm_id);
            $group=Group::find($group_id);

           // dd($qcm);
            $questions=$qcm->questions;
           
            return view('student.examen',['questions' => $questions,'qcm' => $qcm, 'group' => $group]);
        }
           
        
        }

    }


    public function passerExamen(Request $request, $qcm_id, $group_id){

        $qcm=Qcm::find($qcm_id);
        $group=Group::find($group_id);
        if (($qcm->users()->where('user_id', '=', Auth::user()->id)->exists())&&($qcm->users()->where('group_id', '=', $group->id)->exists())) {
   // user found
            
                    # code...
                    abort(403);

            }else{
        $data=$request->input('choix');
        //dd($data);
        $moyenne=0;
       
        foreach ($request->input('choix') as $choix) {
            # code...
            //dd($choix);
            $user=Auth::user()->id;
            //dd($user);
            $array = [$qcm->id => ['user_id' => $user
                                               ]];
            $choix=Choix::find($choix);

//dd($array);
        $choix->qcms()->attach($array);

        if ($choix->is_correct) {
            # code...
            $moyenne=$moyenne+$qcm->breponse;
        }else{
            $moyenne=$moyenne+$qcm->mreponse;
        }
        
        }

       // dd($group_id);
        $array_note = [$user => ['group_id' => $group->id,
                                    'note' => $moyenne
                                               ]];

        $qcm->users()->attach($array_note);


//dd($moyenne);

        $questions=$qcm->questions;

           
        return view('student.resultat',['questions' => $questions,'qcm'=>$qcm, 'request' => $data, 'moyenne' => $moyenne]);
    }

    }

    public function fixerPeriode($id){


        $qcm = Qcm::find($id);
        if (Auth::user()->is_admin) {
            $listgroup = Group::whereDoesntHave('qcms', function ($query) use($id) {
          $query->whereId($id);
    })

    ->get();
        }elseif (Auth::user()->type=='Teacher') {
            # code...
            $listgroup = Auth::user()->groups()->whereDoesntHave('qcms', function ($query) use($id) {
          $query->whereId($id);
    })

    ->get();
        
        }
            
        
        


        return view('qcm.periode', ['groups' => $listgroup,'qcm'=>$qcm]);
            
    }


    public function fixer(fixRequest $request,$id){
        
        $qcm=Qcm::find($id);
        $group=Group::find($request->get('group'));

        $array = [$request->get('group') => ['date_debut' => $request->input('date_debut'),
                                               'date_fin' => $request->input('date_fin')
                                               ]];


        $qcm->groups()->attach($array);
       
       
        return redirect('qcms');

    }


    public function partager($id){

        if (Auth::user()->type=='Teacher') {
            $qcm=Qcm::find($id);
           // dd($qcm);
            $qcmpartage = $qcm->replicate();
            $questions=$qcm->questions;
            $qcmpartage->user_id = Auth::user()->id;
            $qcmpartage->partagee=0;
            $qcmpartage->save();
            foreach ($questions as  $question) {
                # code...
                $questionpartage = $question->replicate();
                $questionpartage->qcm_id=$qcmpartage->id;
                $questionpartage->save();
                 foreach ($question->choix as $choix) {
                # code...
                $choixpartage = $choix->replicate();

                $choixpartage->question_id=$questionpartage->id;
                $choixpartage->save();
            }
            }


       
             /*$qcm->qcmpartage1()->attach(Auth::user());
               $qcm->save();*/
           
            return redirect('qcms');           
        }

    }

    //permet de supprimer un Qcm
    public function destroy($id){

        $qcm = Qcm::find($id);
        $this->authorize('delete', $qcm);

        $qcm->delete();

        return redirect('qcms');
    }




}
