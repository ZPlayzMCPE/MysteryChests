<?php
namespace ImagicalGamer\MysteryChest;

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
    @mkdir($this->getDataFolder());
    $config = new Config($this->getDataFolder() . "/config.yml", Config::YAML);
    $config->save();
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    //$this->economy = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
    //$this->api = EconomyAPI::getInstance ();
  }

  public function onDeath(PlayerDeathEvent $event){
    $entity = $event->getEntity();
    $cause = $entity->getLastDamageCause();
    if($entity instanceof Player){
       if($cause instanceof Player){
        $killer->getInventory()->addItem(Item::get(388,0,1));
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
          $inventory->addItem(Item::get(293,0,1));
        break;
        case 2:
          $inventory->addItem(Item::get(293,0,1));
        break;   
        case 3:
          $inventory->addItem(Item::get(293,0,1));
        break;   
        case 4:
          $inventory->addItem(Item::get(293,0,1));
        break;      
        case 5:
          $inventory->addItem(Item::get(293,0,1));
        break;     
        case 6:
          $inventory->addItem(Item::get(293,0,1));  
        break;
    }
  }
}
}
}
