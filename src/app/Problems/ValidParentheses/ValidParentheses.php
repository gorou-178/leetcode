<?php

namespace App\Problems\ValidParentheses;

class ValidParentheses {

    /** @var int スタックがない状態 */
    const MODE_NONE = 0;
    /** @var int スタックに開始カッコがある状態 */
    const MODE_START = 1;

    /** @var array 開始カッコ定義 */
    private $startChars = ["(", "[", "{"];
    /** @var array 終了カッコ定義 */
    private $endChars = [")", "]", "}"];
    /** @var array カッコペア定義 */
    private $charPares = [
        "(" => ")",
        "{" => "}",
        "[" => "]",
    ];
    /** @var int スタックモード（デフォルト: MODE_NONE） */
    private $mode = self::MODE_NONE;
    /** @var array スタック */
    private $stacks = [];

    /**
     * @param string $s
     * @return boolean
     */
    public function isValid($s)
    {
        $length = strlen($s);
        if ($length === 0) {
            return true;
        }
        if ($length % 2 !== 0) {
            return false;
        }

        for ($i = 0; $i < $length; ++$i) {
            $this->updateMode();
            if ($this->isModeNone()) {
                if ($this->isStartChar($s[$i])) {
                    $this->stackPush($s[$i]);
                    continue;
                }
                return false;
            }
            if ($this->isModeStart()) {
                if (!$this->isPares($this->getLastStack(), $s[$i])) {
                    if ($this->isEndChar($s[$i])) {
                        return false;
                    }
                    $this->stackPush($s[$i]);
                    continue;
                }
                $this->stackPop();
            }
        }

        $this->updateMode();
        if ($this->isModeStart()) {
            return false;
        }
        return true;
    }

    /**
     * 対象文字がカッコペアであるかチェック
     *
     * @param string $stack
     * @param string $char
     * @return boolean
     */
    private function isPares($stack, $char): bool
    {
        return $this->charPares[$stack] === $char;
    }

    /**
     * スタックモードがMODE_NONEかどうか確認
     *
     * @return boolean
     */
    private function isModeNone(): bool
    {
        return $this->mode === self::MODE_NONE;
    }

    /**
     * スタックモードがMODE_STARTかどうか確認
     *
     * @return boolean
     */
    private function isModeStart(): bool
    {
        return $this->mode === self::MODE_START;
    }

    /**
     * スタックモード更新
     *
     * @return void
     */
    private function updateMode()
    {
        if (count($this->stacks) === 0) {
            $this->mode = self::MODE_NONE;
        } else {
            $this->mode = self::MODE_START;
        }
    }

    /**
     * スタックにpushする
     *
     * @param string $char
     * @return void
     */
    private function stackPush($char)
    {
        array_push($this->stacks, $char);
    }

    /**
     * スタックの最後を取得
     *
     * @return string
     */
    private function getLastStack(): string
    {
        $length = count($this->stacks);
        if ($length === 0 ) {
            return '';
        }
        return $this->stacks[$length - 1];
    }

    /**
     * スタックをpop
     *
     * @return void
     */
    private function stackPop()
    {
        array_pop($this->stacks);
    }

    /**
     * 開始カッコかどうか確認
     *
     * @param string $char
     * @return boolean
     */
    private function isStartChar($char): bool
    {
        return in_array($char, $this->startChars);
    }

    /**
     * 終了カッコか確認
     *
     * @param string $char
     * @return boolean
     */
    private function isEndChar($char): bool
    {
        return in_array($char, $this->endChars);
    }
}
