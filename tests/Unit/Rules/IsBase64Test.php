<?php

namespace Tests\Unit\Rules;

use App\Rules\IsBase64;
use PHPUnit\Framework\TestCase;

class IsBase64Test extends TestCase
{
    /**
     * @test
     * @group custom_rules
     * @return void
     */
    public function test_passes_can_return_true(): void
    {
        $string = 'file';
        $encoded_string = base64_encode($string);

        $rule = app(IsBase64::class);
        $condition = $rule->passes('attachment', $encoded_string);

        $this->assertTrue($condition);
    }
}
