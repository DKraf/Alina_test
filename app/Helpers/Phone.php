<?php

namespace App\Helpers;

use libphonenumber;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\NumberParseException;

class Phone
{
    /**
     * @throws NumberParseException
     */
    public static function formatPhone($phoneNumber): string
    {
        $phoneNumberUtil = libphonenumber\PhoneNumberUtil::getInstance();
        $phoneNumberObject = $phoneNumberUtil->parse($phoneNumber, 'KZ');

        return $phoneNumberUtil->format(
            $phoneNumberObject,
            PhoneNumberFormat::E164
        );
    }
}
