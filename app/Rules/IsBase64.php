<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsBase64 implements Rule
{
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
        if ((bool)preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $value) === false) {
            return false;
        }

        $decoded = base64_decode($value, true);

        if ($decoded === false) {
            return false;
        }

        $encoding = mb_detect_encoding($decoded);

        if (!in_array($encoding, ['UTF-8', 'ASCII'], true)) {
            return false;
        }

        return $decoded && base64_encode($decoded) === $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The file is not encode of base64.';
    }
}
