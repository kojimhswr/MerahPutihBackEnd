<?php
namespace App\Contracts;
/**
 * Interface StudentContract
 * @package App\Contracts
 */
interface StudentContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listStudents(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
    /**
     * @param int $id
     * @return mixed
     */
    public function findStudentById(int $id);
    /**
     * @param array $params
     * @return mixed
     */
    public function createStudent(array $params);
    /**
     * @param array $params
     * @return mixed
     */
    public function updateStudent(array $params);
    /**
     * @param $id
     * @return bool
     */
    public function deleteStudent($id);
    /**
     * @param $slug
     * @return mixed
     */
    public function findStudentBySlug($slug);
}
