<?php

declare(strict_types=1);

namespace shelly7w7\HealthTag;

use pocketmine\scheduler\Task;

class TagTask extends Task{

	public function onRun(int $tick) : void{
		foreach(Main::getInstance()->getServer()->getOnlinePlayers() as $player) {
            $player->setNameTagVisible(true);
            if(Main::getInstance()->getConfig()->get("type") === "custom"){
		$startinghp = $player->getHealth
		$customhp = $startinghp(round($startinghp, 2, PHP_ROUND_HALF_UP));		    
                $player->setScoreTag(str_replace(["{health}", "{maxhealth}"], [$customhp, $player->getMaxHealth()], Main::getInstance()->getConfig()->getNested("customformat")));
            }else if(Main::getInstance()->getConfig()->get("type") === "bar"){
                $player->setScoreTag(str_repeat("§a|", (int) round($player->getHealth(), 0)).str_repeat("§c|", (int) round($player->getMaxHealth() - $player->getHealth(), 0)));
            }else{
                $player->setScoreTag("Invalid type chosen for healthtag");
            }
        }
	}
}
