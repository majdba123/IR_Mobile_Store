<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Problem;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;


class ProblemController extends Controller
{
    public function show()
    {
        return view('web.problem');
    }


    public function store(Request $request)
    {
            // Validate the form data
            $user=Auth::id();
            $request->validate([

                'Text_of_problem' => 'required',
                'file' => 'required|mimes:jpeg,png,jpg,gif,svg,doc,docx,pdf,txt,zip|max:2048',
            ]);
            // Save the file
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('problem'), $fileName);
            // Save the file name and problem text and user id in the database
            // Assuming you have a 'problems' table in your database with columns 'user_id', 'problem_text', 'file_name'
            // Also assuming that you have a 'User' model for the user_id
            $problem = new Problem;
            $problem->User_id = $user;
            $problem->Text_of_problem = $request->Text_of_problem;
            $problem->file = $fileName;
            $problem->save();
            // Redirect back to the form page with a success messag
            return redirect()->back()->with('success', 'File and text have been uploaded successfully');
        }
    }

