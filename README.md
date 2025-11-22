---
category: Overview
permalink : /
nav_order : 0
layout : default
---

<div align=center style="align-content:center">
<img style="width:90%" src="https://github.com/The-Distributed-Computing-Project/AetherGrid/blob/dev/Media/aethergrid-solid-high.png?raw=true"/>
</div>

<br>

[![Badge License]][License]   [![Button Discord]][Discord Server]      [![Badge Blockchain]][Blockchain]

<br>

## Overview

A unique P2P blockchain built in C++, with a trading client and a miner. This crypto can be bought, traded, sold, mined, or used just like any other.

What sets it apart though is how it can be used, and the technique for mining. It is based on sharing mining computing hardware with developers to run their programs better and compute a large amount of data quickly, using Distributed Computing.

Anybody can submit code using the client to be run across the peer-to-peer network, and will pay for that using this crypto. [What sets this crypto apart?](./#condensing)

<div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap; justify-content:center">
  <a href="join_waitlist.html" style="display: inline-block; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 8px; font-weight: 600; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: transform 0.2s, box-shadow 0.2s;">Join the Waitlist</a>
</div>

<br>


## Condensing

The idea of the Distributed Computing Network likely seems a little backwards to begin with. *Why use your computer to run others' programs to save up AetherGrid tokens to run your own, when you can just run it on your own PC?*

The answer to this is simple: when you use and run AetherGrid, it is **not** an exchange. Rather, it is a ***condensing*** of your computing power, to be used on-demand at a later date.

### The Problem: Idle Computing Power

Most of the worlds computers run at a capacity far below their maximum, because of *idling*. When you are not running your program, your computer has nothing to do, right? And you only utilize that maximum it can reach sparsely, when you need something more demanding done. So most of the time, the power of your computer goes to waste.

### The Solution: Condense and Utilize

Instead of allowing this to happen, AetherGrid allows you to **condense** this idle computing time (***condensing** is comparable to mining in other cryptocurrencies*), storing it physically in the form of AetherGrid tokens, and letting you use it at a later time to exhert far more computing power than you could originally utilize, in far lower time.

With this system, each client will receive an amount of AetherGrid tokens proportionally to their hardware, and more efficiently utilize hardware world-wide.

### The Possibilities

Imagine an Artificial Intelligence model, that can be trained an equivilant of centuries in a matter of 5 minutes. Or protein folding and other medical computations. Or an accurate simulation of atoms, to a macroscopic scale. Or the simulation of a brain.

Supercomputers are expensive to build, and equally as expensive for institutions to rent. Distributed Supercomputing is far cheaper, and actually contains enough power to out-compete even the best supercomputers. Although it has existed for some time, most implementations are through the process of volunteering, and a centralized developer and goal. AetherGrid will bring supercomputing to the people, for a low price.

<br>


<!-- Dynamic blockchain length update -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $.get("tools/blockchainlength.php", function(data, status){
    var badgeElement = document.querySelector('img[alt="Badge Blockchain"]');
    var newSrc = "https://img.shields.io/badge/blockchain_length-"+data+"_blocks-blue";
    badgeElement.src = newSrc;
  });
});
</script>

<!----------------------------------------------------------------------------->

[Installation Page]: installation.html
[Blockchain]: ./tools/Blockchain_Viewer.html

[License]: LICENSE
[Discord Server]: https://discord.gg/9p82dTEdkN


<!----------------------------------[ Badges ]--------------------------------->

[Badge License]: https://img.shields.io/badge/license-DCP--GPL-purple
[Badge Blockchain]: https://img.shields.io/badge/blockchain_length-0_blocks-blue

<!---------------------------------[ Buttons ]--------------------------------->

[Button Documentation]: https://img.shields.io/badge/Documentation-008FC7?style=flat-square&logoColor=white&logo=GitBook
[Button Video]: https://img.shields.io/badge/Video-c91111?style=flat-square&logoColor=white&logo=YouTube
[Button Discord]: https://img.shields.io/badge/Discord_Server-573f75.svg?style=social&logo=Discord
