# Opgave 3 – LAMP i Azure

## Formål

I denne opgave har jeg designet, deployet, sikret og testet en LAMP-løsning i Microsoft Azure.

Løsningen består af Linux, Apache, MariaDB og PHP. Applikationen kører i Docker-containere på en Azure Linux VM.

Azure-infrastrukturen bliver oprettet med Terraform, og VM'en bliver automatisk konfigureret med Cloud-init.


# 1. Projektets formål

Formålet er at udvikle en funktionel LAMP-løsning, som kan køre i Azure og samtidig være:

- Funktionel
- Testbar
- Sikker
- Reproducerbar
- Dokumenteret
- Mulig at fjerne igen med Infrastructure as Code

Derudover er der fokus på cloud-økonomi, da løsningen skal kunne køre så længe som muligt inden for opgavens budget på 200 USD.

Projektet undersøger derfor blandt andet:

- Valg af Azure-region
- Valg af VM-størrelse
- Pris pr. dag
- Pris pr. måned
- Pris for længere drift
- Netværksdesign
- Sikkerhed
- Docker-containerisering
- Infrastructure as Code
- Automatiseret deployment
- Automatiseret test
## Cloud-økonomi

Azure Pricing Calculator er brugt til at beregne prisen på den VM, der faktisk blev deployet.

- Region: Sweden Central
- VM: Standard_B2s_v2
- OS: Linux / Ubuntu
- Drift: 730 timer pr. måned
- Månedlig beregnet pris: 63,07 USD
- Årlig beregnet pris: 756,86 USD
- Beregnet pris pr. dag: ca. 2,07 USD
- Beregnet pris for 100 dage: ca. 207,36 USD

Opgaven arbejder med et budget på 200 USD. Med denne konfiguration er 100 dages konstant drift derfor lige over budgettet. 200 USD svarer til omkring 96 dages drift ud fra den beregnede VM-pris.

Den valgte B2s v2 blev brugt, fordi den var tilgængelig i Sweden Central, hvor løsningen blev deployet.
---
## Teknologier

- Ubuntu Linux
- Apache
- PHP
- MariaDB
- Docker
- Docker Compose
- Nginx
- Varnish
- Terraform
- Cloud-init
- Azure Virtual Network
- Azure Subnet
- Azure Network Security Group
- Azure Public IP
- Azure Linux VM
- Playwright

## Arkitektur

Løsningen består af to dele:

1. Azure-infrastrukturen
2. Applikationen, som kører i Docker på Azure VM'en

Azure-infrastrukturen bliver oprettet med Terraform.

VM'en bliver automatisk konfigureret med Cloud-init.

Inde på VM'en kører Docker Compose, som starter de forskellige containere.

Den overordnede trafik ser sådan ud:

````
Internet
   |
   v
Azure Public IP
51.12.53.10
   |
   v
Azure Network Security
Group (NSG)
   |
   +---- SSH 22 (kun administrativ IP)
   |
   +---- HTTP 80
   |
   +---- HTTPS 443
   |
   v
Nginx
Reverse Proxy / TLS
   |
   v
Varnish
Cache
   |
   v
Apache + PHP
WeB
   |
   v
MariaDB
Database
