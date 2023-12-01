<?php


namespace App\Http\Controllers\Courses;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use CodeZero\UniqueTranslation\UniqueTranslationRule;

use App\Http\Requests\StoreCourses;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Courses = Course::all();
    return view('pages.Courses.Courses',compact('Courses'));
  }



  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreCourses $request)
  {

 try {
          $validated = $request->validated();
          $Course = new Course();
          /*
          $translations = [
              'en' => $request->Name_en,
              'ar' => $request->Name
          ];
          $Course->setTranslations('Name', $translations);
          */
          $Course->Name = ['en' => $request->Name_en, 'ar' => $request->Name];
          $Course->Notes = $request->Notes;
          $Course->save();
          toastr()->success(trans('messages.success'));
          return redirect()->route('Courses.index');
      }

      catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }


  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
   public function update(StoreCourses $request)
 {
   try {

       $validated = $request->validated();
       $Courses = Course::findOrFail($request->id);
       $Courses->update([
         $Courses->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
         $Courses->Notes = $request->Notes,
       ]);
       toastr()->success(trans('messages.Update'));
       return redirect()->route('Courses.index');
   }
   catch
   (\Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }
 }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
      $MyClass_id = Classroom::where('course_id',$request->id)->pluck('course_id');

      if($MyClass_id->count() == 0){

          $Courses = Course::findOrFail($request->id)->delete();
          toastr()->error(trans('messages.Delete'));
          return redirect()->route('Courses.index');
      }

      else{

          toastr()->error(trans('Courses_trans.delete_Course_Error'));
          return redirect()->route('Courses.index');

      }


  }

}
