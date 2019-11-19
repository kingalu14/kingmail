<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Contacts\ContactRepository;
use App\Repository\Bulks\BulkRepository;
use Auth;

class ContactsController extends Controller
{
    private $contact;
    private $bulk;
    public function __construct(ContactRepository $contact,BulkRepository $bulk){
          $this->contact = $contact;
          $this->bulk=$bulk;

    }
   
    public function getAllContacts($bulk_id){
         if(Auth::user()->role != '3')
            $contacts=$this->contact->getByBulkId($bulk_id);
         else 
         $contacts=$this->contact->getByUserBulkId(Auth::user()->id,$bulk_id);
         $bulk=$this->bulk->getById($bulk_id);
         return view('dashboard.admin.contacts.index',['contacts'=>$contacts,'bulk'=>$bulk]);
    }

    public function  getByEmail($email){
        return $this->contact->getByEmail();
    }

    public function createContacts(Request $request){
       
        $this->validate($request, [
            'email' => 'required|email|unique:contacts,email'
         ]);
      
         $result =  $this->contact->create($request->all());
         if($result) flash('Record Added Successful')->success();
         else flash('Sorry! Please try again.')->error();  
         return redirect()->back();
    }

   public function update(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:contacts,email,'.$request->contact_id,
        ]);
        $result = $this->contact->update($request->contact_id,$request->all());
        if($result)  flash('Record Updated Successful')->success();
        else flash('Sorry! Please try again.')->error();
            return redirect()->back();
   }

   public function edit($id){
       $contact = $this->contact->edit($id);
       return view('dashboard.admin.contacts.edit',['contact'=>$contact]);
   }

   public function destroy(Request $request){  
      $result =  $this->contact->delete($request->contact_id);
      if($result)  flash('Record Removed Successful')->success();
      else flash('Sorry! Please try again.')->error();
          return redirect()->back();
   }

}

