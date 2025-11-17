---
category: Overview
nav_order : 5
layout : default
title : FAQ
---

# Frequently Asked Questions

*Common questions about AetherGrid and the Distributed Computing Project.*

<br>

## General Questions

### What are Aether tokens?

Aether is the native cryptocurrency that powers the AetherGrid network. Contributors earn Aether tokens by sharing their computing resources, while users spend Aether tokens to access distributed computing power for their projects.

### Is AetherGrid free to use?

AetherGrid operates on a pay-per-use model using Aether tokens. However, if you contribute computing resources to the network, you earn Aether tokens that can be used to run your own computations or traded.

### What kind of tasks can run on AetherGrid?

AetherGrid is designed for parallelizable computational tasks including scientific simulations, data analysis, machine learning training, rendering, cryptographic operations, and other CPU-intensive workloads. Efffectively any task can be run using AetherGrid, but the most optimized ones would be those that are naturally parallel.

<br>

## Technical Questions

### What are the system requirements?

- **Operating System**: Linux (Windows via WSL, native support in progress)
- **Dependencies**: OpenSSL, Curl
- **CPU**: Any CPU, even of relatively low power
- **RAM**: At least 256 MB of free capacity

### Is my data secure?

Yes. All communications are encrypted, and computational tasks are cryptographically verified. Your contributed computing power only processes the specific tasks you accept, and you maintain full control over your system.

### Can I run AetherGrid alongside other applications?

Absolutely. AetherGrid is designed to use idle computing resources without interfering with your regular workflow. You can configure resource allocation to ensure your primary tasks always have priority.

### What happens if my computer goes offline?

No problem. The network automatically redistributes tasks to other available nodes. There's no penalty for disconnecting, though consistent uptime increases your contribution rewards.

<br>

<!----------------------------------------------------------------------------->

[Installation]: installation.html
[Usage]: usage.html
[Contact]: contact.html
