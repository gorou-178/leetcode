<?php

namespace App\Problems\CatAndMouse;

use App\Logger;

class CatAndMouse {

    const DRAW = 0;
    const MOUSE_WIN = 1;
    const CAT_WIN = 2;

    const MODE_START = 1;
    const MODE_END = 2;

    const TURN_NONE = 0;
    const TURN_MOUSE = 1;
    const TURN_CAT = 2;
    const TURN_NAMES = [
        self::TURN_MOUSE => 'マウスのターン',
        self::TURN_CAT => 'ネコのターン',
    ];

    private $mode;
    private $turn;

    private $logger;

    /**
     * 913. Cat and Mouse
     *
     * array|int[][]
     * @return int
     */
    public function catMouseGame($graph)
    {
        $this->logger = new Logger();
        $this->mode = self::MODE_START;
        $this->turn = self::TURN_NONE;

        $result = self::DRAW;
        $gameCount = 1;
        while($this->mode !== self::MODE_END) {
            $this->logger->info('game: ' . $gameCount);

            $this->nextTurn();
            $mouseNode = $this->turnMouse();

            $this->nextTurn();
            $catNode = $this->turnCat();

            if ($mouseNode->equals($catNode)) {
                $result = self::CAT_WIN;
            }
            if ($mouseNode->isHole()) {
                $result = self::MOUSE_WIN;
            }
            if ($mouseNode->position === $beforeMouseNode->position
                && $catNode->position === $beforeCatNode->position) {
                $result == self::DRAW;
            }

            ++$gameCount;
            if ($gameCount === 3) {
                $this->mode === self::MODE_END;
            }
        }

        return -1;
    }

    private function turnMouse()
    {
        $this->logger->info('Mouse move to: 1');
    }

    private function turnCat()
    {
        $this->logger->info('Cat move to: 1');
    }

    private function nextTurn()
    {
        ++$this->turn;
        if ($this->turn > self::TURN_CAT) {
            $this->turn = self::TURN_MOUSE;
        }
        $this->logger->info('turn ' . self::TURN_NAMES[$this->turn]);
    }
}
