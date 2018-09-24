<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Requests\groupRequest;
use App\Group;
use App\User;
use App\Qcm;
use Auth;
use Illuminate\Support\Facades\DB;




use App\Policies\GroupPolicy;

class GroupController extends Controller
{
    //


    public function __construct(){

        $this->middleware('auth');
    }
    


    public function index(){
            # code...
        if (Auth::user()->is_admin) {
            # code...

            $listgroup = Group::all();
            return view('group.index', ['groups'=>$listgroup]);
        }elseif (Auth::user()->type=='Teacher') {
            # code...

            $listgroup = Auth::user()->groups;
           // dd($listgroup);
            //dd($listgroup);
            return view('group.index', ['groups'=>$listgroup]);
        }elseif (Auth::user()->type=='Student') {
            # code...
             $listgroup = Auth::user()->groupsstd;
            // dd($listgroup);
            return view('student.index', ['groups'=>$listgroup]);
        }else
        {
            abort(403);
        } 
    }



    public function result(){
            # code...
        if (Auth::user()->is_admin) {
            # code...

            $listgroup = Group::all();
            return view('group.result', ['groups'=>$listgroup]);
        }elseif (Auth::user()->type=='Teacher') {
            # code...

            $listgroup = Auth::user()->groups;
           // dd($listgroup);
            //dd($listgroup);
            return view('group.result', ['groups'=>$listgroup]);
        }else
        {
            abort(403);
        } 
    }


    function fetch(Request $request){



    $select = $request->get('select');
    $value = $request->get('value');
    $valeur=$request->get('grpid');
  
    $dependent=$request->get('dependent');


    /**/
   
    /*$data = DB::table('group_qcm')->select('qcm_id')
            ->where('group_id','===', $group->id)
            ->get();*/
//dd($data);

            if ($select=='group') {
                # code...
    $group = Group::find($value);


    $data = $group->qcms;



    $output = '<option value="">Select '.ucfirst($dependent).'</option>';
            
    foreach ($data as $row) {
        # code...

        $output .= '<option value="'.$row->id.'">'.$row->titre.'</option>';
        
    }
    echo $output;
    

}else{
    //$result = DB::table('qcm_user')->get();

    

    $qcm=Qcm::find($value);

//$result = DB::table('qcm_user')->where('group_id',$_SESSION['group'])->get();
    $result=$qcm->users()->where('group_id',$valeur)->get();



   
    $output = '<h4>'.ucfirst($dependent).'</option>';
    
    foreach ($result as $row) {
       
      
    $output .='<div class="card text-white bg-dark mb-3 " style="max-width: 18rem;">
                           <div class="card-header"><h4>'.$row->name.'    '.$row->pivot->note.'/'.$qcm->bareme.'
                           </h4></div>
                                            </div>' ;
    
        
    }
    echo $output;

    
}

    /*return view('group.result', ['res'=>$result]);*/

//$row->user_id->pivot->name.

    /*$result = DB::table('user_qcm')->where([
    ['group_id', '=', $group->id],
    ['qcm_id', '=', $value],
])->get();
    return view('group.result', []);*/


    
}


    public function create(){
        
         if (Auth::user()->type=='Teacher') {

        return view('group.create');
        }else
        {
            abort(403);
        }
        
    }

    public function inscription(groupRequest $request){


        $code=$request->input('code');
        $group = Group::where("code",$code)->first();
        //dd($group);
        $group->users()->attach(Auth::user());
        $group->code = $group->getGenerateRandomString(10);
       // dd($group->code);
        $group->save();

        return redirect('groups');

    }
    public function studentList($id){

        $group = Group::find($id);
       // dd($group);
        $liststd = $group->users;
        return view('group.details', ['group' => $group,'students'=>$liststd]);
    }


    public function confirm($group_id,$user_id){
//$group->users()->attach($user)
        
        //dd($student);
       // $student->groups()->attach($student);
        /*$message = $student->groups();
        $message->allow='1';*/
        /*dd($message);*/
      //  $student=Auth::user();
        /*dd($student);*/
        $group=Group::find($group_id);
        $student=User::find($user_id);

        //dd($group);
        /*$student = User::find($id);*/
        $group->users()->updateExistingPivot($student,['allow' => 1]);
       /* $group = users::where("user_id",$user_id)->first();
        dd($group);*/
        //$group->save();
        //dd($student);

/*$message = $student->groups();
//dd($message);
$message->allow = 1;*/


//$student->groups()->updateExistingPivot($student, array('allow' => 1), false);
/*$student->groups();
dd($student);*/
       // $student->save();
        return redirect('groups');

    }





     public function store(groupRequest $request){

        $group = new Group();
        $group->titre = $request->input('titre');
        $group->user_id = Auth::user()->id;
        $group->code = $group->getGenerateRandomString(10);

        

        $group->save();
        session()->flash('success','Group ajouter avec succer !');

        return redirect('groups');
    }



    public function edit($id){

        $group = Group::find($id);
   

        $this->authorize('update', $group);

        return view('group.edit', ['group'=>$group]);
    }

    public function update(groupRequest $request, $id){

        $group = Group::find($id);
        $group->titre = $request->input('titre');

        $group->save();
        session()->flash('success','Le group a étè bien modifiée !');


        return redirect('groups');
    }

     public function destroy($id){

        $group = Group::find($id);
        $this->authorize('delete', $group);

        $group->delete();

        return redirect('groups');
    }


}
