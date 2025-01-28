<?php

namespace julie\cooldownmanager;

use julie\cooldownmanager\CooldownManager\CooldownManager;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase
{
    use SingletonTrait;
    protected function onLoad(): void
    {
        self::setInstance($this);
    }

    protected function onEnable(): void { CooldownManager::register(); }
    protected function onDisable(): void { CooldownManager::save(); }
    public function getConfigFile(string $file): Config {
        return new Config($this->getDataFolder() . $file . ".yml", Config::YAML);
    }
}