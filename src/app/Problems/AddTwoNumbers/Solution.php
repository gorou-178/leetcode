<?php

namespace App\Problems\AddTwoNumbers;

/**
 * ListNodeクラス
 * （実際のleetcodeではclassではなくobjectとして渡されている）
 */
class ListNode {
    /** @var int $val */
    public $val = 0;
    /** @var ListNode|null $next */
    public $next = null;
    /**
     * ListNode constract
     * @param integer $val
     * @param ListNode|null $next
     */
    public function __construct(int $val = 0, ?ListNode $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

/**
 * AddTwoNumbers Solution
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers(ListNode $l1, ListNode $l2) {
        $node1 = $l1;
        $node2 = $l2;
        $carryValue = 0;
        $resultNode = $currentNode = new ListNode(0);
        while (true) {
            $totalValue = $this->getNodeValue($node1) + $this->getNodeValue($node2) + $currentNode->val;
            $currentNode->val = (int)($totalValue % 10);
            $carryValue = (int)($totalValue / 10);

            $node1 = $this->getNextNode($node1);
            $node2 = $this->getNextNode($node2);
            if ($node1 !== null || $node2 !== null) {
                $currentNode->next = new ListNode($carryValue);
                $currentNode = $currentNode->next;
            }
            if ($node1 === null && $node2 === null) {
                if ($carryValue > 0) {
                    $currentNode->next = new ListNode($carryValue);
                    $currentNode = $currentNode->next;
                }
                break;
            }
        }
        return $resultNode;
    }

    /**
     * 次のnodeを返す
     * @param ListNode|null $node
     * @return ListNode|null
     */
    private function getNextNode(?ListNode $node): ?ListNode
    {
        if ($node === null) {
            return null;
        }
        return $node->next;
    }

    /**
     * nodeの値を返す。nullの場合０を返す
     * @param ListNode|null $node
     * @return integer
     */
    private function getNodeValue(?ListNode $node): int
    {
        if ($node === null) {
            return 0;
        }
        return $node->val;
    }
}
