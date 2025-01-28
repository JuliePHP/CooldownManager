# CooldownManager
PMMP cooldown manager 


## Set cooldown:
```php
        CooldownManager::addCooldown($player, "chat", "3");
```



## get cooldown:
```php
        CooldownManager::getCooldown($player, "chat");
```

## show if player is cooldowned:
```php
        CooldownManager::isCooldown($player, "chat");
```

## Complete tutorial:
```php
if (!CooldownManager::isCooldown($player, "chat")){
    CooldownManager::addCooldown($player, "chat", 3);
}else{
    $event->cancel();
    $player->sendMessage("You are cooldowned for " . CooldownManager::getCooldown($player, "chat"));
}
```

Discord: juli3.php
