<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create()
    {
        return view('forms.create');
    }
    public function store(Request $request)
    {
        // Form::create($request->all());

        // return response(['success' => 'Employee created successfully.']);
        // $data = isset($_REQUEST['form_data'])?$_REQUEST['form_data']:"";
        // dd($data);
        // $formData = $request->input('form_data');
        // $formName = $request->input('form_name');
        $formData = json_decode($request->input('form_data'), true);
        // // Store the form data in the database
        $form = new Form();
        $form->name = 'one';
        $form->fields = $formData;
        $form->save();

        // Redirect or perform further actions
    }

    public function show($id)
    {
        $form = Form::findOrFail($id);

        return view('forms.show', compact('form'));
    }

}
