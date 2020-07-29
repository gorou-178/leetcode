<?php

namespace Tests\Problems\CatAndMouse;

use Tests\TestCase;
use App\Problems\CatAndMouse\CatAndMouse;

class CatAndMouseTest extends TestCase {

    /** @var CatAndMouse */
    private $solution;

    public function setUp(): void
    {
        parent::setUp();
        $this->solution = new CatAndMouse();
    }

    /**
     * @test
     */
    public function catMouseGame_case1()
    {
        $this->markTestIncomplete('未回答');
        $input = [
            [2,5],
            [3],
            [0,4,5],
            [1,4,5],
            [2,3],
            [0,2,3]
        ];
        $output = $this->solution->catMouseGame($input);
        $this->assertSame(0, $output);
    }
}
