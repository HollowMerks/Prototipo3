<?php

namespace App\Helpers;

class PhoneCountries
{
    public static function getCountries()
    {
        return [
            'BO' => ['name' => '🇧🇴 Bolivia', 'code' => '+591'],
            'AR' => ['name' => '🇦🇷 Argentina', 'code' => '+54'],
            'BR' => ['name' => '🇧🇷 Brasil', 'code' => '+55'],
            'CL' => ['name' => '🇨🇱 Chile', 'code' => '+56'],
            'CO' => ['name' => '🇨🇴 Colombia', 'code' => '+57'],
            'EC' => ['name' => '🇪🇨 Ecuador', 'code' => '+593'],
            'PE' => ['name' => '🇵🇪 Perú', 'code' => '+51'],
            'PY' => ['name' => '🇵🇾 Paraguay', 'code' => '+595'],
            'UY' => ['name' => '🇺🇾 Uruguay', 'code' => '+598'],
            'VE' => ['name' => '🇻🇪 Venezuela', 'code' => '+58'],
            'MX' => ['name' => '🇲🇽 México', 'code' => '+52'],
            'GT' => ['name' => '🇬🇹 Guatemala', 'code' => '+502'],
            'HN' => ['name' => '🇭🇳 Honduras', 'code' => '+504'],
            'SV' => ['name' => '🇸🇻 El Salvador', 'code' => '+503'],
            'NI' => ['name' => '🇳🇮 Nicaragua', 'code' => '+505'],
            'CR' => ['name' => '🇨🇷 Costa Rica', 'code' => '+506'],
            'PA' => ['name' => '🇵🇦 Panamá', 'code' => '+507'],
            'CU' => ['name' => '🇨🇺 Cuba', 'code' => '+53'],
            'DO' => ['name' => '🇩🇴 República Dominicana', 'code' => '+1'],
        ];
    }

    public static function getOptions()
    {
        $options = [];
        foreach (self::getCountries() as $code => $country) {
            $options[$code] = $country['name'] . ' ' . $country['code'];
        }
        return $options;
    }

    public static function getCodeOptions()
    {
        $options = [];
        foreach (self::getCountries() as $code => $country) {
            $options[$country['code']] = $country['code'];
        }
        return $options;
    }

    public static function getCountryCode($countryCode)
    {
        return self::getCountries()[$countryCode]['code'] ?? null;
    }
}
