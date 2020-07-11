<?php

use Tests\TestCase;
use App\Problems\ValidParentheses\ValidParentheses;

class ValidParenthesesTest extends TestCase {

    /** @var ValidParentheses */
    private $solusion;

    public function setUp(): void
    {
        parent::setUp();
        $this->solusion = new ValidParentheses();
    }

    /**
     * @test
     */
    public function isValid_openBracketsPattern1()
    {
        $input = '()';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_openBracketsPattern2()
    {
        $input = '[]';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_openBracketsPattern3()
    {
        $input = '{}';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_2種類入れ子1()
    {
        $input = '({})';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_2種類入れ子2()
    {
        $input = '([])';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_2種類入れ子3()
    {
        $input = '{[]}';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_2種類入れ子4()
    {
        $input = '{()}';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_2種類入れ子5()
    {
        $input = '[{}]';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_2種類入れ子6()
    {
        $input = '[()]';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_1種類入れ子1()
    {
        $input = '[[]]';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_1種類入れ子2()
    {
        $input = '(())';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_1種類入れ子3()
    {
        $input = '{{}}';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_2種類入れ子並列1()
    {
        $input = '{()()}';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_2種類入れ子並列2()
    {
        $input = '({}[])';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_空文字()
    {
        $input = '';
        $output = $this->solusion->isValid($input);
        $this->assertTrue($output);
    }

    /**
     * @test
     */
    public function isValid_NG_1週類閉じてない1()
    {
        $input = '(';
        $output = $this->solusion->isValid($input);
        $this->assertFalse($output);
    }

    /**
     * @test
     */
    public function isValid_NG_1週類閉じてない2()
    {
        $input = '[';
        $output = $this->solusion->isValid($input);
        $this->assertFalse($output);
    }

    /**
     * @test
     */
    public function isValid_NG_1週類閉じてない3()
    {
        $input = '{';
        $output = $this->solusion->isValid($input);
        $this->assertFalse($output);
    }

    /**
     * @test
     */
    public function isValid_NG_1週類開いていない1()
    {
        $input = ')';
        $output = $this->solusion->isValid($input);
        $this->assertFalse($output);
    }

    /**
     * @test
     */
    public function isValid_NG_1週類開いていない2()
    {
        $input = ']';
        $output = $this->solusion->isValid($input);
        $this->assertFalse($output);
    }

    /**
     * @test
     */
    public function isValid_NG_1週類開いていない3()
    {
        $input = '}';
        $output = $this->solusion->isValid($input);
        $this->assertFalse($output);
    }

    /**
     * @test
     */
    public function isValid_NG_2種類入れ子閉じてない1()
    {
        $input = '{(}';
        $output = $this->solusion->isValid($input);
        $this->assertFalse($output);
    }

    /**
     * @test
     */
    public function isValid_NG_2種類入れ子閉じてない2()
    {
        $input = '{[}';
        $output = $this->solusion->isValid($input);
        $this->assertFalse($output);
    }

    /**
     * @test
     */
    public function isValid_NG_2種類入れ子閉じてない3()
    {
        $input = '{{}';
        $output = $this->solusion->isValid($input);
        $this->assertFalse($output);
    }

    /**
     * @test
     */
    public function isValid_NG_2種類入れ子開いていない1()
    {
        $input = '{)}';
        $output = $this->solusion->isValid($input);
        $this->assertFalse($output);
    }

    /**
     * @test
     */
    public function isValid_NG_2種類入れ子開いていない2()
    {
        $input = '{]}';
        $output = $this->solusion->isValid($input);
        $this->assertFalse($output);
    }

    /**
     * @test
     */
    public function isValid_NG_2種類入れ子開いていない3()
    {
        $input = '{}}';
        $output = $this->solusion->isValid($input);
        $this->assertFalse($output);
    }
}
