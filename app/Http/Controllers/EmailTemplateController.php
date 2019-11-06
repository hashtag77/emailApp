<?php

namespace App\Http\Controllers;

use App\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email_template = EmailTemplate::all();
        
        return view('emailtemplate.list', compact('email_template'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('emailtemplate.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'template_name' => 'required|unique:email_templates',
            'template_layout' => 'required',
        ]);

        $email_template = new EmailTemplate;   
        $email_template->template_name   = $request->template_name;
        $email_template->template_layout = $request->template_layout;
        $email_template->template_key    = str_replace(' ','-',strtolower($request->template_name));
        $email_template->save();

        return redirect('/template/list')->with('success','Template added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(EmailTemplate $emailTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailTemplate $emailTemplate,$id)
    {
        $email_template = EmailTemplate::find($id);

        return view('emailtemplate.edit', compact('email_template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'template_layout' => 'required',
        ]);
        
        $email_template = EmailTemplate::where('id',$id)
                                       ->update([
                                            'template_layout' => $request->template_layout,
                                            'template_status' => $request->template_status,
                                        ]); 

        return redirect('/template/list')->with('success','Template updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->delid;
        $email_template = EmailTemplate::find($id)->delete();

        return redirect('/template/list')->with('success','Template deleted successfully.');
    }
}
