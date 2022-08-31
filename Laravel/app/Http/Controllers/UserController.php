<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use  App\Models\Utilisateur;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
       
       
        $username=$request->username;
        $password=$request->password;
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
         $error='';
         $result=[];
         $user = Utilisateur::where('username', $username)->first();
         if($user==null){
             $error="اسم المستخدم غير موجود";
             return $error;
            
         }
         else{
             if(Hash::check($password,$user->password)){
                $token=$user->createToken('tokenbeyrem')->plainTextToken;
                
             }
                else{
                   $error="كلمة العبور غير صحيحة";
                   return $error;
                }
         }
         
        
         return response()->json([
            "message"=>"success",
            "user"=>$user,
            "token"=>$token,
            "validateur"=>$user->rolevalidateur,
            "error"=>""
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $name=$request->name;
        $lastname=$request->lastname;
        $username=$request->username;
        $email=$request->email;
        $adresse=$request->adresse;
        $password=$request->password;
        $hached=Hash::make($password);
        $nomcomplet=$name.' '.$lastname;
        $role='a:1:{i:0;s:10:"ROLE_USERS";}';
        $today = today();
        // $today->format('Y-m-d H:i:s')
      
       
        $user = DB::table('D_UTILISATEUR')->where('username', $username)->first();
        $useremail=DB::table('D_UTILISATEUR')->where('email', $email)->first();
        if($user==null)
            { 
                if($useremail==null){
                    
                    $usernv=Utilisateur::create([
                        'username'=>$username,
                        'username_canonical'=>$username,
                        'email'=>$email,
                        'email_canonical'=>$email,
                        'enabled'=>'1',
                        'password'=>$hached,
                        'last_login'=>$today->format('Y-m-d H:i:s'),
                        'roles'=>$role,
                        'created_at'=>$today->format('Y-m-d H:i:s'),
                        'updated'=>$today->format('Y-m-d H:i:s'),
                        'NomComplet'=>$nomcomplet
                    ]);
                    
                  
                   
                    $token=$usernv->createToken('tokenbeyrem')->plainTextToken;
                  
              
                }
                else{
                    return 1;
                }
            }
            else{
                return 0;
            }
            return response()->json([
                "message"=>"success",
                "token"=>$token,
                
            ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
   
        return response()->json([
            "message"=>"logout",
            "status"=>"success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(auth()->user()->rolevalidateur){
            $mesdemandes = DB::table('EL_DEMANDES')
            ->join('D_UTILISATEUR', 'D_UTILISATEUR.id', '=', 'EL_DEMANDES.user_id')
            ->join('El_FORMULAIRES', 'El_FORMULAIRES.id', '=', 'EL_DEMANDES.id_form')
            ->select('NomComplet', 'id_doc', 'title','DateDemande','typeForm','el_Demandes.id','Status')
            ->where('D_UTILISATEUR.id',auth()->user()->id)
            ->orderBy('DateDemande','DESC')
            ->paginate(2);
        }
        else{
            $mesdemandes = DB::table('EL_DEMANDES')
            ->join('D_UTILISATEUR', 'D_UTILISATEUR.id', '=', 'EL_DEMANDES.user_id')
            ->join('El_FORMULAIRES', 'El_FORMULAIRES.id', '=', 'EL_DEMANDES.id_form')
            ->select('NomComplet', 'id_doc', 'title','DateDemande','typeForm','el_Demandes.id','Status')
            ->where('D_UTILISATEUR.id',auth()->user()->id)
            ->orderBy('DateDemande','DESC')
            ->get();
        
        }

        
            return $mesdemandes;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
