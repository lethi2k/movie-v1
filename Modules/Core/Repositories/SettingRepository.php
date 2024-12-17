<?php

namespace Modules\Core\Repositories;

use Modules\Core\Models\Settings\Setting;

//use Models
use Modules\Core\Repositories\Interfaces\SettingRepositoryInterface;

class SettingRepository implements SettingRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }

    public function store(array $params)
    {
        unset($params['_token']);
        foreach ($params as $key => $value) {
            $setting = Setting::where('key', $key);
            if ($setting != null) {
                $setting->update([
                    'store_id' => 0,
                    'code' => explode('_', $key)[0],
                    'key' => $key,
                    'value' => $value,
                    'serialized' => 0,
                ]);
            }

            if ($setting == null) {
                Setting::create([
                    'store_id' => 0,
                    'code' => explode('_', $key)[0],
                    'key' => $key,
                    'value' => $value,
                    'serialized' => 0,
                ]);
            }
        }

        return true;
    }
}
