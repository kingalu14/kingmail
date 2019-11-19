<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Templates\TemplatesRepository;
use Auth;

class TemplatesController extends Controller
{
    private $template;
    public function __construct(TemplatesRepository $template){
          $this->template = $template;
    }
   
    public function getAllTemplate(){
        $templates=$this->template->getAll();
        return view('dashboard.admin.templates.index',['templates'=>$templates]);
    }

    public function  userTemplates(){
        if(Auth::user()->role == '3')
           $templates = $this->template->getByUserId(Auth::user()->id);
        else
          $templates=$this->template->getAll();
          return view('dashboard.admin.templates.index',['templates'=>$templates]);         
    }

    public function getTemplateForm(){
          return view('dashboard.admin.templates.create');    
    }
    public function createTemplate(Request $request){
       
        $this->validate($request, [
            'name' => 'required',
            'contents' => 'required'
        ]);
       
        $request->request->add(['user_id' => Auth::user()->id]);
        $result =  $this->template->create($request->all());
         if($result) flash('Template Added Successful')->success();
         else flash('Sorry! Please try again.')->error();  
         return redirect()->route('templates');
    }

   public function update($id,Request $request){
        $this->validate($request, [
            'contents' => 'required',
        ]);
        $result = $this->template->update($id,$request->all());
        if($result)  flash('Template has been Updated Successful')->success();
        else flash('Sorry! Please try again.')->error();
        return redirect()->route('templates');
   }

   public function edit($id){
        $template = $this->template->edit($id);
        return view('dashboard.admin.templates.edit',['template'=>$template]);
   }

   public function destroy(Request $request){  
        $result =  $this->template->delete($request->template_id);
        if($result)  flash('Record Removed Successful')->success();
        else flash('Sorry! Please try again.')->error();
        return redirect()->back();
   }

}
