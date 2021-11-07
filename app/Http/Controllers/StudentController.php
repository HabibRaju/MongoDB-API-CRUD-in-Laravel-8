<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();  

        return response()->json([
            'success' => true,
            'students'=>$students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    return response()->json([
    //        'names' => $request['name'],
    //        'rolls' => $request['roll']
    //    ]);
       for($i=0; $i<count($request['name']); $i++){
            $student = new Student([
                'name' => $request['name'][$i],
                'roll'=> $request['roll'][$i]
            ]);
        
            $student->save();
       }
       $message ="Student Create Sucessflly";

       if(count($request['name'])>1)$mesage = "Students Create Successfully";
        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        return response()->json([
            'success' => true,
            'Student'=> $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $student = Student::find($request->id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->address = $request->address;

        $student->update();

        return response()->json([
            'success' => true,
            'Data'    => $request->all(),
            'Message'=> "Student Update Successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $student = Student::find($request->id);
        $student->delete();

        return response()->json([
            'success' => true,
            'Message'=> "Student Delete Successfully"
        ]);
    }
}
