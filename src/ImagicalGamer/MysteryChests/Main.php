<?php
namespace ImagicalGamer;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerInteractEvent;

use pocketmine\utils\Config;

use pocketmine\item\Item;
use pocketmine\item\Emerald;
use pocketmine\block\Block;

use pocketmine\utils\TextFormat as C;

use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\level\particle\DustParticle;

/* Copyright (C) ImagicalGamer - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Jake C <imagicalgamer@outlook.com>, May 2016
 */

class Main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }

  public function onDeath(PlayerDeathEvent $event){
    $entity = $event->getEntity();
    $cause = $entity->getLastDamageCause();
    if($entity instanceof Player){
       if($cause instanceof Player){
        $killer->getInventory()->addItem(Item::get(388,0,1));
        $killer->sendMessage(C::GREEN . "You have 1 Gamelet");
    }
  }
}
  public function onInteract(PlayerInteractEvent $event){
    $block = $event->getBlock();
    $player = $event->getPlayer();
    $inventory = $player->getInventory();       
      if($block->getId() === Block::CHEST){     
        if($inventory->contains(new Emerald(0,1))) {
        $event->setCancelled();
        $player->sendMessage(C::GREEN . "Opening a MysteryChest...");
        sleep(1);
        $player->sendMessage(C::RED . C::BOLD . "3");
        sleep(1);
        $player->sendMessage(C::RED . C::BOLD . "2");
        sleep(1);
        $player->sendMessage(C::RED . C::BOLD . "1");
        $level = $player->getLevel();
        $x = $block->getX();
        $y = $block->getY();
        $z = $block->getZ();
        $r = 0;
        $g = 255;
        $b = 255;
        $center = new Vector3($x+1, $y, $z);
        $radius = 0.5;
        $count = 100;
        $particle = new DustParticle($center, $r, $g, $b, 1);
          for($yaw = 0, $y = $center->y; $y < $center->y + 4; $yaw += (M_PI * 2) / 20, $y += 1 / 20){
              $x = -sin($yaw) + $center->x;
              $z = cos($yaw) + $center->z;
              $particle->setComponents($x, $y, $z);
              $level->addParticle($particle);
}
        $prize = rand(1,6);
        switch($prize){
        case 1:
          EconomyAPI::getInstance()->addMoney($player, "50");
          $player->sendMessage(C::RED . C::BOLD . "You won 50$");
        break;
        case 2:
          EconomyAPI::getInstance()->addMoney($player, "150");
          $player->sendMessage(C::RED . C::BOLD . "You won 150$");
        break;   
        case 3:
          EconomyAPI::getInstance()->addMoney($player, "200");
          $player->sendMessage(C::RED . C::BOLD . "You won 200$");
        break;   
        case 4:
          EconomyAPI::getInstance()->addMoney($player, "100");
          $player->sendMessage(C::RED . C::BOLD . "You won 100$");
        break;      
        case 5:
          EconomyAPI::getInstance()->addMoney($player, "25");
          $player->sendMessage(C::RED . C::BOLD . "You won 25$");
        break;     
        case 6:
          EconomyAPI::getInstance()->addMoney($player, "500"); 
          $player->sendMessage(C::RED . C::BOLD . "You won 500$");
        break;
    }
  }
}
}
}
