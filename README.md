MCAuthAll
=========

About
-----

MCAuthAll aims to provide a method of authentication that allows non-premium minecraft players to be authenticated with the official minecraft servers using a host file addition while still allowing premium players to play without any modifications or extra effort.

An interesting side effeect of this system allows non-premium users to play minecraft using official launchers as if they owned minecraft. In fact, those using the cracked launcher will not be able to join unless the server accepts unsecure non-premium players and the cracked launcher is accompanied by a client mod.

Install
-------

1. Download the latest MCAuthAll and host it on a server that can be accessed by all players and the server. Do not host MCAuthAll on the same machine as the server, or the requests will loop around forever.

2. Add this line to the hosts file of the server machine:
pathto.yourserver.com session.minecraft.net

3. Edit the options.php (Coming soon) to your liking. (Full auth mode will require mysql)

Clients
-------

*Premium clients can play on the server like normal

*Non-Premium players must use an official launcher and add these 2 lines to the hosts file:
pathto.yourserver.com login.minecraft.net
pathto.yourserver.com session.minecraft.net

Upcoming Features / To Do
-------------------------

1. Add in credential check for non-premium players
2. Add in joinserver/checkserver and a jsp->php rewrite htaccess