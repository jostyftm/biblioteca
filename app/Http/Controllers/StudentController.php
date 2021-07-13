<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\User;
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
        $students = Student::with('user')
        ->orderBy('id', 'desc')
        ->paginate(5);
        
        return view('pages.admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentRequest $request)
    {
        
        // $user = new User($request->all());
        // $user->password = bcrypt($request->code);
        $user = User::create([
            'name'          =>  $request->name,
            'last_name'     =>  $request->last_name,
            'email'         =>  $request->email,
            'password'      =>  bcrypt($request->code),
        ]);

        $user->student()->create([
            'code'  =>  $request->code,
            'age'   =>  $request->age
        ]);

        return redirect()->route('students.index')
        ->with('success', 'El estudiante se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $student->user;

        return view('pages.admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
        $user = $student->user;
        $user->fill($request->all());

        $student->fill($request->all());

        $user->update();
        $student->update();

        return back()->with('success', 'Se ha actualizado el usuario con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
