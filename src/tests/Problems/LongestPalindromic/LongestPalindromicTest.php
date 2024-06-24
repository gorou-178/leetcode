<?php

use Tests\TestCase;
use App\Problems\LongestPalindromic\LongestPalindromic;

class LongestPalindromicTest extends TestCase {

    /** @var LongestPalindromic */
    private $solution;

    public function setUp(): void
    {
        parent::setUp();
        $this->solution = new LongestPalindromic();
    }

    /**
     * @test
     */
    public function longestPalindrome_bababの場合()
    {
        $this->markTestIncomplete('未回答');
        $s = 'babad';
        $anser = 'bab';
        $output = $this->solution->longestPalindrome($s);
        $this->assertSame($anser, $output);
    }

}
