<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

/**
 * Class Repository
 *
 */
abstract class Repository implements RepositoryInterface {

    
    private $app;

    protected $model;

    
    public function __construct(App $app) {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * @param array $columns
     * @return mixed
     */
    public function paginate( $perPage=15,$columns = array('*')) {
        return $this->model->orderBy('created_at', 'desc')->paginate($perPage, $columns);
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all( $columns = array('*')) {
        return $this->model->orderBy('created_at', 'desc')->get($columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) {
        $data['staff_created'] = \Auth::guard()->user()->id;
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param string $value
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $value, $attribute="id") {
        /*$data['staff_updated'] = \Auth::guard()->user()->id;*/
        return $this->model->where($attribute, '=', $value)->update($data);
    }

     /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function deletePaginate( $columns = array('*')) {
        return $this->model->withTrashed()->paginate(env('PERPAGE'), $columns);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*')) {
        return $this->model->find($id, $columns);
    }
    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
   
    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*')) {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }
    public function delete($array){
        return $this->model->where($array )->delete();
    }


    /**
     * @param array $ids
     * @return mixed
     */
    public function restore( $ids)
    {
        return $this->model->withTrashed()->whereIn('id', $ids)->restore();
    }
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws RepositoryException
     */
    public function makeModel() {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }
}