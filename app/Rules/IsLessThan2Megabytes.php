<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class IsLessThan2Megabytes implements Rule
{
    public const MAX_FILE_SIZE_BYTES = 2000000;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $length = Str::length($value);
        $suffix = substr($value, -2);

        if (preg_match('/==/', $suffix)) {
            $equal_count = 2;
        } elseif (preg_match('/=/', $suffix)) {
            $equal_count = 1;
        } else {
            $equal_count = 0;
        }

        return (($length * (3 / 4)) - $equal_count) <= self::MAX_FILE_SIZE_BYTES;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The file size is too big.';
    }
}
