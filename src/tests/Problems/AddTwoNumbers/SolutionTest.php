<?php

namespace Tests\Problems\AddTwoNumbers;

use App\Problems\AddTwoNumbers\ListNode;
use App\Problems\AddTwoNumbers\Solution;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @var Solution; */
    private $solution;

    /**
     * setUp
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->solution = new Solution();
    }

    /**
     * @test
     */
    public function addTwoNumbers_1要素ずつかつ繰り上げなし()
    {
        $val1 = 1;
        $val2 = 2;
        $l1 = new ListNode($val1);
        $l2 = new ListNode($val2);
        $resultListNode = $this->solution->addTwoNumbers($l1, $l2);
        $this->assertSame($resultListNode->val, ($val1+$val2));
        $this->assertNull($resultListNode->next);
    }

    /**
     * @test
     */
    public function addTwoNumbers_1要素ずつかつ繰り上げあり()
    {
        $val1 = 5;
        $val2 = 5;
        $l1 = new ListNode($val1);
        $l2 = new ListNode($val2);
        $resultListNode = $this->solution->addTwoNumbers($l1, $l2);

        $this->assertSame($resultListNode->val, 0);
        $this->assertSame($resultListNode->next->val, 1);
        $this->assertNull($resultListNode->next->next);
    }

    /**
     * @test
     */
    public function addTwoNumbers_3要素ずつかつ繰り上げなし()
    {
        $l1 = new ListNode(1, new ListNode(2, new ListNode(3)));
        $l2 = new ListNode(1, new ListNode(2, new ListNode(3)));
        $resultListNode = $this->solution->addTwoNumbers($l1, $l2);

        $this->assertSame($resultListNode->val, 2);
        $this->assertSame($resultListNode->next->val, 4);
        $this->assertSame($resultListNode->next->next->val, 6);
        $this->assertNull($resultListNode->next->next->next);
    }

    /**
     * @test
     */
    public function addTwoNumbers_3要素ずつかつ繰り上げあり()
    {
        $l1 = new ListNode(1, new ListNode(9, new ListNode(3)));
        $l2 = new ListNode(1, new ListNode(2, new ListNode(3)));
        $resultListNode = $this->solution->addTwoNumbers($l1, $l2);

        $this->assertSame($resultListNode->val, 2);
        $this->assertSame($resultListNode->next->val, 1);
        $this->assertSame($resultListNode->next->next->val, 7);
        $this->assertNull($resultListNode->next->next->next);
    }

    /**
     * @test
     */
    public function addTwoNumbers_1要素と2要素で繰り上げなし()
    {
        $l1 = new ListNode(1);
        $l2 = new ListNode(1, new ListNode(2));
        $resultListNode = $this->solution->addTwoNumbers($l1, $l2);

        $this->assertSame($resultListNode->val, 2);
        $this->assertSame($resultListNode->next->val, 2);
        $this->assertNull($resultListNode->next->next);
    }

    /**
     * @test
     */
    public function addTwoNumbers_1要素と2要素で繰り上げあり()
    {
        $l1 = new ListNode(9);
        $l2 = new ListNode(1, new ListNode(2));
        $resultListNode = $this->solution->addTwoNumbers($l1, $l2);

        $this->assertSame($resultListNode->val, 0);
        $this->assertSame($resultListNode->next->val, 3);
        $this->assertNull($resultListNode->next->next);
    }

    /**
     * @test
     */
    public function addTwoNumbers_2要素と1要素で繰り上げなし()
    {
        $l1 = new ListNode(1, new ListNode(2));
        $l2 = new ListNode(1);
        $resultListNode = $this->solution->addTwoNumbers($l1, $l2);

        $this->assertSame($resultListNode->val, 2);
        $this->assertSame($resultListNode->next->val, 2);
        $this->assertNull($resultListNode->next->next);
    }

    /**
     * @test
     */
    public function addTwoNumbers_2要素と1要素で繰り上げあり()
    {
        $l1 = new ListNode(1, new ListNode(2));
        $l2 = new ListNode(9);
        $resultListNode = $this->solution->addTwoNumbers($l1, $l2);

        $this->assertSame($resultListNode->val, 0);
        $this->assertSame($resultListNode->next->val, 3);
        $this->assertNull($resultListNode->next->next);
    }

    /**
     * @test
     */
    public function addTwoNumbers_2要素で繰り上げ()
    {
        $l1 = new ListNode(5, new ListNode(3, new ListNode(1)));
        $l2 = new ListNode(6, new ListNode(6, new ListNode(1)));
        $resultListNode = $this->solution->addTwoNumbers($l1, $l2);

        $this->assertSame($resultListNode->val, 1);
        $this->assertSame($resultListNode->next->val, 0);
        $this->assertSame($resultListNode->next->next->val, 3);
        $this->assertNull($resultListNode->next->next->next);
    }

    /**
     * @test
     */
    public function addTwoNumbers_3要素以上ある場合()
    {
        $l1 = new ListNode(1, new ListNode(0, new ListNode(0, new ListNode(1))));
        $l2 = new ListNode(1, new ListNode(0));
        $resultListNode = $this->solution->addTwoNumbers($l1, $l2);

        $this->assertSame($resultListNode->val, 2);
        $this->assertSame($resultListNode->next->val, 0);
        $this->assertSame($resultListNode->next->next->val, 0);
        $this->assertSame($resultListNode->next->next->next->val, 1);
        $this->assertNull($resultListNode->next->next->next->next);
    }
}
