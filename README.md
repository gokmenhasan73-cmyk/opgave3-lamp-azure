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
