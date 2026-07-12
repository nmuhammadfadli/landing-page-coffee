<?php

if (! function_exists('t')) {
    function t(string $id, ?string $en = null): string
    {
        $locale = app()->getLocale();

        return $locale === 'en' && $en !== null ? $en : $id;
    }
}
