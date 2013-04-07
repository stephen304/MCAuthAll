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

4. Perform the "Install" for clients. Place modded files in "MinecraftDownload" as described in the about file (in that directory)

Install - Clients
-----------------

* Premium clients can play on the server like normal

* Non-Premium players must use a launcher that is modified to log in to your server
  * Modding the launcher is more difficult:
      * Remove SSL Cert verification
      * Remove META-INF
      * Hex edit login.minecraft.net to yiour server IP
      * Hex edit the AmazonAWS download to your MinecraftDownload folder
      * These edits are done on the ".jar" launcher. (for linux) Convert this modded .jar into mac by replacing the launcher jar in the mac package contents. For windows, use "Launch4j" to convert it into an executable.
  * As of 1.5.1 minecraft.jar edits include hex-editing kn.class (1.5.1, login.minecraft.net for an unknown purpose) and bdl.class and jg.class (1.5.1, session.minecraft.net, for joining) in minecraft.jar.
      * A video will soon be made explaining this.

Upcoming Features / To Do
-------------------------

1. Make tutorials on hex editing
2. Figure out how mojang account authing works
