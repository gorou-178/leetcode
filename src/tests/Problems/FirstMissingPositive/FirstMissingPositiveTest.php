<?php

namespace Tests\Problems\FirstMissingPositive;

use Tests\TestCase;
use App\Problems\FirstMissingPositive\FirstMissingPositive;

class FirstMissingPositiveTest extends TestCase {

    /** @var FirstMissingPositive */
    private $solution;

    public function setUp(): void
    {
        parent::setUp();
        $this->solution = new FirstMissingPositive();
    }

    /**
     * @test
     */
    public function firstMissingPositive_ok_連続の末尾()
    {
        $input = [1,2,0];
        $output = $this->solution->firstMissingPositive($input);
        $this->assertSame(3, $output);
    }

    /**
     * @test
     */
    public function firstMissingPositive_連続が途絶えるパターン()
    {
        $input = [3,4,-1,1];
        $output = $this->solution->firstMissingPositive($input);
        $this->assertSame(2, $output);
    }
}
