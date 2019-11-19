<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Bulks\BulkRepository;
use Auth;

class BulksController extends Controller
{
    private $bulk;
    public function __construct(BulkRepository $bulk){
          $this->bulk = $bulk;
    }
   
    public function getAllContacts(){
        if(Auth::user()->role != '3')
         $bulks=$this->bulk->getAll();
         else 
         $bulks=$this->bulk->getByUserId(Auth::user()->id);
         return view('dashboard.admin.bulks.index',['bulks'=>$bulks]);
    }


    public function createBulk(Request $request){

        $this->validate($request, [
            'name'=>'required'
         ]);
        
         $result =  $this->bulk->create($request->all());
         if($result) flash('Record Added Successful')->success();
         else flash('Sorry! Please try again.')->error();  
         return redirect()->back();
    }

   public function update(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        $result = $this->bulk->update($request->bulk_id,$request->all());
        if($result)  flash('Record Updated Successful')->success();
        else flash('Sorry! Please try again.')->error();
            return redirect()->back();
   }

   public function edit($id){
       $bulk = $this->bulk->edit($id);
       return view('dashboard.admin.bulks.edit',['contact'=>$contact]);
   }

   public function destroy(Request $request){  
      $result =  $this->bulk->delete($request->bulk_id);
      if($result)  flash('Record Removed Successful')->success();
      else flash('Sorry! Please try again.')->error();
          return redirect()->back();
   }
}
