<?php

namespace knife;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\entity\Entity;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\event\player\PlayerDeathEvent;

class kill extends PluginBase implements Listener {

public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents($this, $this);
}

public function lightningKill(PlayerDeathEvent $e){
  $player = $e->getEntity();
  $lk = new AddEntityPacket();
  $lk->type = 93;
  $lk->eid = Entity::$entityCount++;
  $lk->metadata = array();
  $lk->speedX = 0;
  $lk->speedY = 0;
  $lk->speedZ = 0;
  $lk->x = $player->x;
  $lk->y = $player->y;
  $lk->z = $player->z;
  $player->dataPacket($lk);
  }
}
?>
