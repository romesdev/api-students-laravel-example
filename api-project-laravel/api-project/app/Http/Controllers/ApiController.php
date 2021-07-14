<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ApiController extends Controller
{

    //listar todos estudantes
    public function getAllStudents()
    {
        // logic to get all students goes here
        $students = Student::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200);
    }

    // adicionar estudante
    public function createStudent(Request $request)
    {
        // logic to create a student record goes here

        $student = new Student;
        $student->name = $request->name;
        $student->course = $request->course;
        $student->save();

        return response()->json([
            "message" => "student record created"
        ], 201);
    }


    // recuperar estudante a partir um ID
    public function getStudent($id)
    {
        // logic to get a student record goes here
        if (Student::where('id', $id)->exists()) {
            $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    // atualizar estudante passando o id
    public function updateStudent(Request $request, $id)
    {
        // logic to update a student record goes here
        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->course = is_null($request->course) ? $student->course : $request->course;
            $student->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    // remover estudante a partir do ID
    public function deleteStudent($id)
    {
        // logic to delete a student record goes here
        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }
}
