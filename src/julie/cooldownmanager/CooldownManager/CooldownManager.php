<?php

namespace julie\cooldownmanager\CooldownManager;

use julie\cooldownmanager\Main;
use pocketmine\player\Player;

class CooldownManager
{
    public static array $cooldownManagers = [];
    public static function register():void
    {
        self::$cooldownManagers = Main::getInstance()->getConfigFile("cooldown")->getAll();
    }
    public static function save(): void
    {
        $config = (Main::getInstance()->getConfigFile("cooldown"));
        $config->setAll(self::$cooldownManagers);
        $config->save();
    }
    public static function addCooldown(Player $player, string $type, int $seconde): void
    {
        self::$cooldownManagers[$player->getName()][$type] = time()+$seconde;
    }
    public static function isCooldown(Player $player, string $type): bool
    {
        if (isset(self::$cooldownManagers[$player->getName()][$type])) {
            return (self::$cooldownManagers[$player->getName()][$type] > time());
        }
        return false;
    }
    public static function getCooldown(Player $player, string $type): int
    {
        if (isset(self::$cooldownManagers[$player->getName()][$type])) {
            return self::$cooldownManagers[$player->getName()][$type] - time();
        }
        return 0;
    }
    public static function removeCooldown(Player $player, string $type): void
    {
        if (isset(self::$cooldownManagers[$player->getName()][$type])) {
            unset(self::$cooldownManagers[$player->getName()][$type]);
        }
    }
}