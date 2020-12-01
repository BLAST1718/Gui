<?php

namespace Gui\TheBlast;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info("Gui Transfer Enable");
        if(InvMenuHandler::isRegistered()){
            InvMenuHandler::register($this);
        }
    }

    public function onDisable(){
        $this->getLogger()->info("Gui Transfer Disable");
    }

    public function onCommand(CommandSender $player, Command $cmd, string $label, array $args) : bool{
        switch($cmd->getName()){
            case "tgui":
             if($sender instanceof Player){
                $menu = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);
                $inv = $menu->getInventory();
                $inv->addItem(Item::get(160:7, 0, 1));
                $inv->addItem(Item::get(160:7, 0, 1));
                $menu->setListener(function (Player $player, Item $item, Item $itemClickedWith, SlotChangeAction $action){
                    if($item->getId() == 160:7){
                        $player->removeWindow($action->getInventory());
                        $player->sendCommand
                    }
                });
                
