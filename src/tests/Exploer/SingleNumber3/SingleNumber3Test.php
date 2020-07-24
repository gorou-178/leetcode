<?php

namespace Tests\Exploer\SingleNumber3;

use App\Explore\SingleNumber3\SingleNumber3;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @var SingleNumber3 */
    private $solution;

    /**
     * setUp
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->solution = new SingleNumber3();
    }

    /**
     * @test
     */
    public function singleNumber_inputが0個の場合()
    {
        $input = [];
        $output = $this->solution->singleNumber($input);
        $this->assertSame(
            [],
            $output
        );
    }

    /**
     * @test
     */
    public function singleNumber_inputが1個の場合()
    {
        $input = [1];
        $output = $this->solution->singleNumber($input);
        $this->assertSame(
            [],
            $output
        );
    }

    /**
     * @test
     */
    public function singleNumber_inputが2個の場合()
    {
        $input = [1,2];
        $output = $this->solution->singleNumber($input);
        $this->assertSame(
            [1,2],
            $output
        );
    }

    /**
     * @test
     */
    public function singleNumber_inputが3個の場合()
    {
        $input = [1,2,1];
        $output = $this->solution->singleNumber($input);
        $this->assertSame(
            [],
            $output
        );
    }

    /**
     * @test
     */
    public function singleNumber_singleNumberが最初に並ぶ場合()
    {
        $input = [1,2,3,4,3,4];
        $output = $this->solution->singleNumber($input);
        $this->assertSame(
            [1, 2],
            $output
        );
    }

    /**
     * @test
     */
    public function singleNumber_singleNumberが最後に並ぶ場合()
    {
        $input = [1,2,1,2,3,4];
        $output = $this->solution->singleNumber($input);
        $this->assertSame(
            [3, 4],
            $output
        );
    }

    /**
     * @test
     */
    public function singleNumber_singleNumberが途中と最後に出てくる場合()
    {
        $input = [1, 2, 1, 3, 2, 5];
        $output = $this->solution->singleNumber($input);
        $this->assertSame(
            [3, 5],
            $output
        );
    }

    /**
     * @test
     */
    public function singleNumber_singleNumberが最初と最後に出てくる場合()
    {
        $input = [3, 2, 1, 1, 2, 4];
        $output = $this->solution->singleNumber($input);
        $this->assertSame(
            [3, 4],
            $output
        );
    }

    /**
     * @test
     */
    public function singleNumber_singleNumberがどちらも途中に出てくる場合()
    {
        $input = [1, 2, 3, 1, 4, 2];
        $output = $this->solution->singleNumber($input);
        $this->assertSame(
            [3, 4],
            $output
        );
    }

    /**
     * @test
     */
    public function singleNumber_10要素inputされた場合()
    {
        $input = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $output = $this->solution->singleNumber($input);
        $this->assertSame(
            [11, 12],
            $output
        );
    }
}
