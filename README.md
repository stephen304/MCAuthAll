MCAuthAll
=========

About
-----

MCAuthAll aims to provide a method of authentication that allows non-premium minecraft players to be authenticated with the official minecraft servers using a host file addition while still allowing premium players to play without any modifications or extra effort.

An interesting side effeect of using this system, when using the host file mod, allows non-premium users to play minecraft using official launchers as if they owned minecraft. In fact, those using the cracked launcher will not be able to join unless the server accepts unsecure non-premium players and the cracked launcher is accompanied by a client mod.

Install - Server
----------------

1. Download the latest MCAuthAll and host it on a server that can be accessed by all players and the server. Do not host MCAuthAll on the same machine as the server, or the requests will loop around forever.

2. Add this line to the hosts file of the server machine:
`pathto.yourserver.com session.minecraft.net`

3. Edit the options.php (Coming soon) to your liking. (Full auth mode will require mysql)

Install - Clients
-----------------

* Premium clients can play on the server like normal

* Non-Premium players must use one of the following methods to play:
  1. Add these 2 following lines to the hosts file. This method only works when you have a dedicated IP on your login server:
`pathto.yourserver.com login.minecraft.net`
`pathto.yourserver.com session.minecraft.net`

  2. Use a launcher that is modified to log in to your server

Upcoming Features / To Do
-------------------------

1. Test Code
2. Add in credential check for non-premium players