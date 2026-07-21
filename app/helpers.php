<?php

use App\Models\Setting;

if (! function_exists('t')) {
    function t(string $id, ?string $en = null): string
    {
        $locale = app()->getLocale();

        return $locale === 'en' && $en !== null ? $en : $id;
    }
}

if (! function_exists('setting')) {
    function setting(string $key, mixed $default = null): mixed
    {
        $found = Setting::find($key);

        return $found?->value ?? $default;
    }
}
