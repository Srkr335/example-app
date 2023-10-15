<?php

namespace App\Http\Controllers;

use App\Models\User;

class project extends Controller
{
    public function homePage(){
       //$users = User::all(); // select * from users
       // $user = User::find(43);  //select * from users where user_id =43
       // $user = User::where('user_id',43)->first();  //select * from users where user_id =43
       // $user = User::where('email','tremayne78@example.org')->first();
        //$users = User::whereIn('user_id',[43,23])->get(); 
        //$user = User::active()->orderBy('name','ASC')->get();
       // $user = User::active()->latest()->get();
      // $user = User::active()->oldest()->get();
      //$user = User::active()->oldest()->limit(10)->get();
     $users = User::active()->latest()->limit(10)->paginate(6);
       // return $user;
        return view('home',compact('users'));
    }
    //public function aboutUs(){
  //   return view('about_us');    }


   // public  function contactUs(){
     //   return view('contact');    }



public function create(){
    return view('users.create');
}

public function save(){
//create a new data
//User::create([
  //  'name' =>request('name'),
    //'email'  =>request('email'),
  //  'date_of_birth'=> request ('dateofbirth'),
  //  'status'=>request('status'),
// ]);

             //$user = User::firstOrCreate([
            // 'email'=>request('email')
         //],[
        //      'name' =>request('name'),
        //     'date_of_birth'=> request ('dateofbirth'),
        //     'status'=>request('status'), 
        //  ]);

request()->validate([
    'name'=>'required'
]);
         $input =[
    'name' => request('name'),
    'email' => request('email'),
    'date_of_birth' => request('dateofbirth'),
    'status' =>request('status'),

         ];


         if(request()->hasFile('image')){

            $extension = request('image')->extension();
        
            $fileName = 'user_pic_'.time().'.'.$extension;
        
            request('image')->storeAs('images',$fileName);
            
            $input['image']= $fileName;
        }


 $user = User::create($input);













//update data

    $user = User::updateOrCreate([
        'email'=>request('email')
    ],[
            'name' =>request('name'),
            'date_of_birth'=> request ('dateofbirth'),
            'status'=>request('status'), 
    
        ]);
    return redirect()->route('home')->with('message','User Created Successfully !!!');
}

public function edit($userId){
    $user = User::find(decrypt($userId));
    return view('users.edit',compact('user'));
}


public function update(){

    $userId= decrypt(request('user_id'));

    $user = User::find($userId);
    $user->update([
          'name' =>request('name'),
          'email'  =>request('email'),
          //'date_of_birth'=> request ('date_of_birth'),
          'status'=>request('status'),
       ]);
       return   redirect()->route('home')->with('message','user Updated Successfully !!');
}
public function delete ($userId){
    $user=User::find(decrypt($userId));
    $user->delete();

    return   redirect()->route('home')
        ->with('message','user Deleted Successfully !!!');

}
}