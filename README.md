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
      * If this method is used, MCAuthAll CANNOT be hosted on the same machine
  * Hex edit the server class to redirect to your server. (I don't have details yet, but this is a better option)

3. Edit the options.php to your liking. (Full auth mode will require mysql)

Install - Clients
-----------------

* Premium clients can play on the server like normal

* Non-Premium players must use a launcher that is modified to log in to your server
  * As of 1.3 this means hex-editing 2 occurrences of session.minecraft.net in gx and asu class.
      * A video will soon be made explaining this.

Upcoming Features / To Do
-------------------------

1. Test Code