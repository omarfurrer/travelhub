<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\AgenciesRepository;
use App\Agency;
use App\Validators\AgenciesValidator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * Class AgenciesRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class AgenciesRepositoryEloquent extends BaseRepositoryEloquent implements AgenciesRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Agency::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Create an agency.
     * 
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        if (isset($attributes['logo'])) {
            $image = $attributes['logo'];
            $originalImageName = $image->getClientOriginalName();
            $imagePath = $image->store('agencies/logos', 'public');
            $attributes = array_merge($attributes, ['image_name' => $originalImageName, 'logo_path' => $imagePath]);
        }
        return parent::create($attributes);
    }

    /**
     * Update an agency.
     * 
     * @param array $attributes
     * @param Integer $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        if (isset($attributes['logo'])) {
            $model = $this->find($id);

            if (!$this->_deleteImage($model)) {
                return false;
            }

            $image = $attributes['logo'];
            $originalImageName = $image->getClientOriginalName();
            $imagePath = $image->store('agencies/logos', 'public');
            $attributes = array_merge($attributes, ['image_name' => $originalImageName, 'logo_path' => $imagePath]);
        }
        return parent::update($attributes, $id);
    }

    /**
     * Delete an agency.
     * 
     * @param Integer $id
     * @return mixed
     */
    public function delete($id)
    {
        $model = $this->find($id);

        if (!$this->_deleteImage($model)) {
            return false;
        }

        return parent::delete($id);
    }

    /**
     * Delete an logo.
     * 
     * @param Agency $agency
     * @return boolean
     */
    protected function _deleteImage(Agency $agency)
    {
        if ($agency->logo_path != NULL) {
            $deleted = Storage::disk('public')->delete($agency->logo_path);
            if (!$deleted) {
                return $deleted;
            }
        }
        return true;
    }

}
