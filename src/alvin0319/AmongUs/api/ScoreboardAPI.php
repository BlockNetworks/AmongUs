<?php

/*
 *      _                                _   _
 *    / \   _ __ ___   ___  _ __   __ _| | | |___
 *   / _ \ | '_ ` _ \ / _ \| '_ \ / _` | | | / __|
 *  / ___ \| | | | | | (_) | | | | (_| | |_| \__ \
 * /_/   \_\_| |_| |_|\___/|_| |_|\__, |\___/|___/
 *                                |___/
 *
 * A PocketMine-MP plugin that implements AmongUs
 *
 * Copyright (C) 2020 alvin0319
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * @author alvin0319
 */

declare(strict_types=1);

namespace alvin0319\AmongUs\api;

use pocketmine\Player;

final class ScoreboardAPI{
	/** @var Scoreboard[] */
	private static $scoreBoards = [];

	public static function addPlayer(Player $player, string $title, array $lines = []){
		self::$scoreBoards[$player->getName()] = new Scoreboard($player);
		self::$scoreBoards[$player->getName()]->sendLine($title, $lines);
	}

	public static function removePlayer(Player $player) : void{
		unset(self::$scoreBoards[$player->getName()]);
	}

	public static function getScoreboard(Player $player) : ?Scoreboard{
		return self::$scoreBoards[$player->getName()];
	}
}