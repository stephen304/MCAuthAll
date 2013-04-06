MCAuthAll
=========

About
-----

MCAuthAll aims to provide a method of authentication that allows non-premium minecraft players to be authenticated with the official minecraft servers using a custom launcher while still allowing premium players to play without any modifications or extra effort.

Install - Server
----------------

1. Download the latest MCAuthAll and host it on a server that can be accessed by all players and the server.

2. One of these 2 options is required
  * Add this line to the hosts file of the server machine:
  `ip.of.your.server session.minecraft.net`
      * If this method is used, MCAuthAll CANNOT be hosted on the same machine (the scripts must be able to access the official servers)
  * Hex edit the server jg.class to redirect to your server. (The better option)

3. Edit the options.php to your liking. (Full auth mode will require mysql)

Install - Clients
-----------------

* Premium clients can play on the server like normal

* Non-Premium players must use a launcher that is modified to log in to your server
  * As of 1.3 this means hex-editing kn.class (1.5.1, login.minecraft.net) for the client's built in server and bdl.class and jg.class (1.5.1, session.minecraft.net, for joining) in mc.jar in addition to the launcher.
      * A video will soon be made explaining this.

Upcoming Features / To Do
-------------------------

1. Fix non-premium login check bug
2. Make tutorials on hex editing