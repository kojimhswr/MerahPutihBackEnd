<?php
namespace App\Repositories;
use App\Models\Student;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\StudentContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
/**
 * Class StudentRepository
 *
 * @student \App\Repositories
 */
class StudentRepository extends BaseRepository implements StudentContract
{
    use UploadAble;
    /**
     * StudentRepository constructor.
     * @param Student $model
     */
    public function __construct(Student $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listStudents(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }
    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findStudentById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }
    /**
     * @param array $params
     * @return Student|mixed
     */
    public function createStudent(array $params)
    {
        try {
            $collection = collect($params);
            $student = new Student($collection->all());
            $student->save();
            return $student;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    /**
     * @param array $params
     * @return mixed
     */
    public function updateStudent(array $params)
    {
        $student = $this->findStudentById($params['student_id']);
        $collection = collect($params)->except('_token');
        $student->update($collection->all());
        return $student;
    }
    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteStudent($id)
    {
        $student = $this->findStudentById($id);
        $student->delete();
        return $student;
    }
    /**
     * @param $slug
     * @return mixed
     */
    public function findStudentBySlug($slug)
    {
        $student = Student::where('slug', $slug)->with('itinerary')->with('images')->first();
        return $student;
    }

    public function studentByAge(){
        $student = Student::where('age','=',20 )->get();
        return $student;
    }

    public function studentByName(){
        $student = Student::where('name', 'like', "ab%")->get();
        return $student;
    }

    public function studentByPhoto(){
        $student = Student::doesntHave('images')->get();
        return $student;
    }



}
