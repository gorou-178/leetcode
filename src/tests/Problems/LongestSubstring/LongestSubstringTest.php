<?php

namespace Tests\Problems\LongestSubstring;

use App\Problems\LongestSubstring\LongestSubstring;
use Tests\TestCase;

class LongestSubstringTest extends TestCase
{
    /** @var LongestSubstring */
    private $solution;

    /**
     * setUp
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->solution = new LongestSubstring();
    }

    /**
     * @test
     */
    public function lengthOfLongestSubstring_パターンabc3文字の場合()
    {
        $input = 'abcabcbb';
        $output = $this->solution->lengthOfLongestSubstring($input);
        $this->assertSame(3, $output);
    }

    /**
     * @test
     */
    public function lengthOfLongestSubstring_パターンb1文字の場合()
    {
        $input = 'bbbbb';
        $output = $this->solution->lengthOfLongestSubstring($input);
        $this->assertSame(1, $output);
    }

    /**
     * @test
     */
    public function lengthOfLongestSubstring_パターンwke3文字の場合()
    {
        $input = 'pwwkew';
        $output = $this->solution->lengthOfLongestSubstring($input);
        $this->assertSame(3, $output);
    }

    /**
     * @test
     */
    public function lengthOfLongestSubstring_inputが空文字の場合()
    {
        $input = '';
        $output = $this->solution->lengthOfLongestSubstring($input);
        $this->assertSame(0, $output);
    }

    /**
     * @test
     */
    public function lengthOfLongestSubstring_inputが半角空白1文字の場合()
    {
        $input = ' ';
        $output = $this->solution->lengthOfLongestSubstring($input);
        $this->assertSame(1, $output);
    }

    /**
     * @test
     */
    public function lengthOfLongestSubstring_パターン3文字の場合()
    {
        $input = 'dvdf';
        $output = $this->solution->lengthOfLongestSubstring($input);
        $this->assertSame(3, $output);
    }

    /**
     * @test
     */
    public function lengthOfLongestSubstring_パターンaabの場合()
    {
        $input = 'aab';
        $output = $this->solution->lengthOfLongestSubstring($input);
        $this->assertSame(2, $output);
    }
}
