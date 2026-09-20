# Opgave 3 – LAMP i Azure

## Formål

I denne opgave har jeg lavet en LAMP-løsning i Azure. Formålet er at få en webserver med Apache og PHP til at køre sammen med en MariaDB-database.

Jeg har brugt Docker til at køre webserveren og databasen som separate containere. Azure-delen er lavet med Terraform, så infrastrukturen kan oprettes automatisk.

Jeg har brugt:

- Ubuntu Linux
- Apache
- PHP
- MariaDB
- Docker
- Docker Compose
- Terraform
- Cloud-init
- Azure Virtual Network
- Azure Network Security Group
- Azure Public IP
- Playwright til automatiske tests

## Arkitektur

Jeg har lavet et arkitekturdiagram, som viser hvordan de forskellige dele hænger sammen.

[Se arkitekturdiagrammet](docs/architecture.md)

Azure VM'en kører Ubuntu og Docker. Inde i Docker kører Apache/PHP og MariaDB i hver sin container.

Websiden kan tilgås udefra gennem port 80. MariaDB er derimod kun tilgængelig internt mellem Docker-containerne.

## Projektstruktur

```text
opgave3/
├── src/
│   └── index.php
├── web/
│   └── Dockerfile
├── terraform/
│   ├── main.tf
│   ├── variables.tf
│   └── cloud-init/
│       └── cloud-init.yaml
├── playwright/
│   ├── tests/
│   │   └── app.spec.js
│   ├── playwright.config.js
│   ├── package.json
│   └── package-lock.json
├── docs/
│   └── architecture.md
├── docker-compose.yml
├── .gitignore
└── README.md

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

