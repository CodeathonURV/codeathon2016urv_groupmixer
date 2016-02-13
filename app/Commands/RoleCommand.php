<?php
/**
 * Created by PhpStorm.
 * User: idir
 * Date: 12/02/16
 * Time: 18:16
 */

namespace App\Commands;

use Bican\Roles\Models\Role;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoleCommand
{
    /**
     * @var Role
     */
    private $role;

    /**
     * RoleCommand constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * @param $name
     * @param int $level
     * @param string $description
     * @throws Exception
     */
    public function create($name, $level = 1, $description = '')
    {
        try {
            $this->role->create(
                [
                    'name' => ucwords($name),
                    'slug' => str_slug($name),
                    'description' => $description,
                    'level' => $level,
                ]
            );
        } catch (Exception $e) {
            echo "- Role $name is already created\n";
        }
    }

    /**
     * @param $name
     * @throws Exception
     */
    public function delete($name)
    {
        try {
            $role = $this->role->where(['name' => ucwords($name)])->firstOrFail();
            $role->delete();
        } catch (ModelNotFoundException $e) {
            throw new Exception('No role found');
        }
    }

    public function listRoles()
    {
        return $this->role->lists('name','id');
    }

    public function getAll(array $attributes = array())
    {
        if (empty($attributes)) {
            $roles = $this->role->all();
        } else {
            $roles = $this->role->get($attributes);
        }

        return $roles;
    }

}