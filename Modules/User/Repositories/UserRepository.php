<?php

namespace Modules\User\Repositories;

use Illuminate\Support\Str;
use Modules\Core\Models\Location\Address;

//use Your Model
use Modules\User\Models\Group;
use Modules\User\Models\User;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }

    public function getList($filter, $paginate)
    {
        return User::paginate($paginate);
    }

    public function create($data)
    {
        if (isset($data['address'])) {
            $data['address']['postcode'] = 100000;
            $data['address']['custom_field'] = '';
            $address = Address::create($data['address']);
        }

        if (isset($data['user'])) {
            $data['user']['address_id'] = $address->address_id;
            $data['user']['firstname'] = $data['user']['name'];
            $data['user']['username'] = Str::snake($data['user']['name']);
            $data['user']['status'] = 1;
            $data['user']['password'] = bcrypt($data['user']['password']);
            $data['user']['salt'] = 'vciie4047';
            $data['user']['code'] = '';
            $user = User::create($data['user']);
        }

        return $user->user_id;
    }

    public function edit($id)
    {
        return User::findOrFail($id);
    }

    public function update($data, $id)
    {
        //update user
        if (isset($data['user'])) {
            User::findOrFail($id)->update($data['user']);
        }

        //update address
        if (isset($data['address'])) {
            User::findOrFail($id)->address->update($data['address']);
        }

        return $id;
    }

    public function destroy($id)
    {
        User::find($id)->address()->delete();
        User::find($id)->delete();

        return $id;
    }

    public function getByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function getByUsername($username)
    {
        return User::where('username', $username)->first();
    }

    public function getUserByCode($code)
    {
        return User::where('code', $code)->first();
    }

    public function getByToken($token)
    {
        return User::where('token', $token)->first();
    }

    public function getUserGroups($filter, $paginate)
    {
        return Group::paginate($paginate);
    }

    public function findByField($field, $value)
    {
        return User::where($field, $value)->first();
    }
}
