<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use App\Model\Setting;

class Settings {

    public static function __callStatic($method, $parameters) {
        if (method_exists(__CLASS__, $method)) {
            self::prepare();
            return forward_static_call_array(array(__CLASS__, $method), $parameters);
        }
    }

    private static function prepare() {
        if (!Cache::has('settings')) {
            $cacheSettings = [];
            $settings = Setting::get();
            foreach ($settings as $setting) {
                $cacheSettings[$setting->key]['value'] = $setting->value;
                $cacheSettings[$setting->key]['default'] = $setting->default;
            }
            Cache::forever('settings', $cacheSettings);
        }
    }

    private static function all() {
        return cache::get('settings');
    }

    private static function has($config) {
        return self::get($config) != "" ? true : false;
    }

    private static function get($config) {
        $value = "";
        if (strpos($config, ".") !== false) {
            $configs = explode(".", $config);
            $app = $configs[0];
            $key = $configs[1];

            $settings = cache::get('settings');
            $value = isset($settings[$app][$key]) ? $settings[$app][$key] : "";
        } else {
            $settings = cache::get('settings');
            $value = isset($settings[$config]) ? $settings[$config]['value'] : "";
        }
        
        if( is_object(json_decode($value)) ) {
            $value = json_decode($value);
        }

        return $value;
    }

    private static function def($key) {
        $settings = cache::get('settings');
        return isset($settings[$key]) ? $settings[$key]['default'] : "";
    }

    private static function set($key, $value) {
        Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    private static function clear() {
        if (Cache::has('settings')) {
            Cache::forget('settings');
        }
    }

}
