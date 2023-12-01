<?php

namespace App\Repository;
use App\Models\Gender;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\DB;


class StudentRepository implements StudentRepositoryInterface{


    public function Get_Student()
    {
        $students = Student::all();
        return view('pages.Students.index',compact('students'));
    }

    public function Edit_Student($id)
    {
        $data['my_class'] = Course::all();
        $data['Genders'] = Gender::all();

        $Students =  Student::findOrFail($id);
        return view('pages.Students.edit',$data,compact('Students'));
    }

    public function Update_Student($request)
    {
        try {
            $Edit_Students = Student::findorfail($request->id);
            $Edit_Students->first =$request->first;
            $Edit_Students->Middle = $request->Middle;
            $Edit_Students->Last = $request->Last;
            $Edit_Students->email = $request->email;
            $Edit_Students->Contact_No = $request->Contact_No;
            $Edit_Students->gender_id = $request->gender_id;
            $Edit_Students->Date_Birth = $request->Date_Birth;
            $Edit_Students->course_id = $request->course_id;
            $Edit_Students->academic_year = $request->academic_year;
            $Edit_Students->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function Create_Student(){
       $data['my_class'] = Course::all();
       $data['Genders'] = Gender::all();

       return view('pages.Students.add',$data);

    }

    public function Show_Student($id)
    {
        $Student = Student::findorfail($id);
        return view('pages.Students.show',compact('Student'));
    }




    public function Store_Student($request){


        DB::beginTransaction();

        try {
            $students = new Student();
            $students->first = $request->first;
            $students->Middle = $request->Middle;
            $students->Last = $request->Last;
            $students->email = $request->email;
            $students->Contact_No = $request->Contact_No;
            $students->gender_id = $request->gender_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->course_id = $request->course_id;
            $students->academic_year = $request->academic_year;
            $students->save();


            DB::commit(); // insert data
            toastr()->success(trans('messages.success'));
            return redirect()->route('Students.create');

        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function Delete_Student($request)
    {

        Student::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Students.index');
    }






}
