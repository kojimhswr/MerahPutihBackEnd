<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadAble;
use App\Models\StudentImage;
use Illuminate\Http\Request;
use App\Contracts\StudentContract;
use App\Http\Controllers\Controller;

class StudentImageController extends Controller
{
    use UploadAble;

    protected $studentRepository;

    public function __construct(StudentContract $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function upload(Request $request)
    {
        $student = $this->studentRepository->findStudentById($request->student_id);

        if ($request->has('image')) {

            $image = $this->uploadOne($request->image, 'students');

            $studentImage = new StudentImage([
                'full'      =>  $image,
            ]);

            $student->images()->save($studentImage);
        }

        return response()->json(['status' => 'Success']);
    }

    public function delete($id)
    {
        $image = StudentImage::findOrFail($id);

        if ($image->full != '') {
            $this->deleteOne($image->full);
        }
        $image->delete();

        return redirect()->back();
    }
}
