<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Contacts\ContactRepository;
use App\Repository\Templates\TemplatesRepository;
use App\Repository\Sents\SentRepository;
use Auth;
use App\Contact;
use App\Bulk;
use App\Template;
use Mail;
use App\Mail\SendEmail;


class MailsController extends Controller
{


    private  $contact;
    private  $template;
    private  $sent;
    public function __construct(ContactRepository $contact,TemplatesRepository $template,SentRepository $sent){
          $this->contact = $contact;
          $this->template = $template;
          $this->sent = $sent;
    }
    public function getSendMail(){
        if(Auth::user()->role == '3'){
            $bulks=Bulk::where('user_id',Auth::user()->id)->pluck('name','id');
            $templates=Template::where('user_id',Auth::user()->id)->pluck('name','id');
        }

        else{
            $bulks=Bulk::pluck('name','id');
            $templates=Template::pluck('name','id');
        }
      
        return view('dashboard.admin.mails.send',['bulks'=>$bulks,'templates'=>$templates]);
    }

    public function SendMail(Request $request){  
     $sentMails[]="";
     $success = 0;
     $fail = 0;
     foreach($request->bulk_id as $bulk_id){
        foreach($this->contact->getByBulkId($bulk_id) as $contact){
            try {
               //'user_id','bulk_id','template_id','status','email',
               Mail::to($contact->email)->send(new SendEmail($request->subject,$this->template->getById($request->template_id)->contents));
               $sentMails["user_id"] = Auth::user()->id;
               $sentMails["bulk_id"] = $bulk_id;
               $sentMails["template_id"] = $request->template_id;
               $sentMails["email"] = $contact->email;
               $sentMails["status"] = 1;
               $this->sent->create($sentMails);
               $success++;
             }
            catch (\Exception $e) {
                if (count(Mail::failures()) > 0) {
                    // return Redirect::back()->withInput()->withErrors('Mail was not sucessfully sent. Please try again');
                     $fail++;
                } 
               // throw new SendMailException($e->getMessage());
            }
           }
        
         } 
         flash($success. ' Message sent, '.$fail.' Message Failed')->success();
         return redirect()->back();
    }
}
