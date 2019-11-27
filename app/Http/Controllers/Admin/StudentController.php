<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\StudentContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreStudentFormRequest;
use App\Models\Student;

class StudentController extends BaseController
{
    protected $studentRepository;

    public function __construct(StudentContract $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        $students = $this->studentRepository->listStudents();
        $this->setPageTitle('Students', 'Students List');
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $this->setPageTitle('Students', 'Create Students');
        return view('admin.students.create');
    }

    public function store(StoreStudentFormRequest $request)
    {
        $params = $request->except('_token');

        $student = $this->studentRepository->createStudent($params);

        if (!$student) {
            return $this->responseRedirectBack('Error occurred while creating student.', 'error', true, true);
        }
        return $this->responseRedirect('admin.students.index', 'Student added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $student = $this->studentRepository->findStudentById($id);

        $this->setPageTitle('Students', 'Edit Student');
        return view('admin.students.edit', compact('student'));
    }

    public function update(StoreStudentFormRequest $request)
    {
        $params = $request->except('_token');

        $student = $this->studentRepository->updateStudent($params);

        if (!$student) {
            return $this->responseRedirectBack('Error occurred while updating student.', 'error', true, true);
        }
        return $this->responseRedirect('admin.students.index', 'Student updated successfully' ,'success',false, false);
    }

    public function delete($id)
    {
        $student = $this->studentRepository->deleteStudent($id);

        if (!$student) {
            return $this->responseRedirectBack('Error occurred while deleting student.', 'error', true, true);
        }
        return $this->responseRedirect('admin.students.index', 'Student deleted successfully' ,'success',false, false);
    }

    public function indexAgeBy20()
    {
        $students = $this->studentRepository->studentByAge();
        $this->setPageTitle('Students', 'Students List');
        return view('admin.students.index', compact('students'));
    }

    public function indexNameByAb()
    {
        $students = $this->studentRepository->studentByName();
        $this->setPageTitle('Students', 'Students List');
        return view('admin.students.index', compact('students'));
    }

    public function indexPhotoNull()
    {
        $students = $this->studentRepository->studentByPhoto();
        $this->setPageTitle('Students', 'Students List');
        return view('admin.students.index', compact('students'));
    }

    public function searchByKecamatan(Request $request){
        $this->setPageTitle('Students', 'Students List');

        $request->validate([
          'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        $students = Student::where('kecamatan', 'like', "%$query%")->get();

        return view('admin.students.index', compact('students'));

      }


}
