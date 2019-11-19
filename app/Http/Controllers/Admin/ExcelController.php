<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\Contacts\ContactRepository;
use App\Http\Controllers\Controller;
use App\Imports\ContactsImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Contact;




class ExcelController extends Controller
{
    private $contact;
    public function __construct(ContactRepository $contact){
          $this->contact = $contact;
    }

    public function importExcel(Request $request){
        //libxml_disable_entity_loader(false);
        $insert[]="";
        $validator=$this->validate($request,[
              'file'=> 'required'
          ]);
              $file = $request->file('file');
              $fileName =  $file->getClientOriginalName();
              $savePath= public_path('/upload');
              $f = $savePath.'/'.$fileName;
          
              if(!file_exists($savePath)){
                   try{
                       mkdir($savePath,0777,true);
                    }catch (Exception $e){
                            flash($e)->fail()->important();
                            return redirect()->back();
                        }
                    }
              //get mime type of image for image resizing and creation
              $file->move($savePath,$fileName);
              $results  = Excel::toCollection(new ContactsImport(),$f);
            // $i++;
            
            $i=0;$j=0;
        
            foreach ($results[0] as $result){ 
                $contact = new Contact;
                if($i>0){
                         $contact->fname=$result[0]; 
                         $contact->lname =  $result[1];
                         $contact->email =  $result[2];
                         $contact->bulk_id = $request->bulk_id;
                         $contact->user_id = $request->user_id; 
                         if($contact->save()){
                           $j++;
                         }
                   }                  
                  $i++;
             }

             if($j>0){
                 flash($j.' Of Your Data has been imported')->success();
                 return redirect()->back();
               }else{
                 flash('error', 'Error inserting the data..')->fail();
                 return redirect()->back();
               }
          
      }



   
}
