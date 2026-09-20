# Arkitekturdiagram

```mermaid
flowchart LR
    User[Bruger / Internet]

    PublicIP[Azure Public IP<br/>135.116.192.145]
    NSG[Network Security Group<br/>HTTP 80<br/>SSH 22 fra admin-IP]
    NIC[Network Interface]
    VM[Ubuntu Linux VM<br/>Standard_B2s_v2]

    Web[Docker: Apache + PHP<br/>TCP 80]
    DB[Docker: MariaDB<br/>TCP 3306 internt]

    User -->|HTTP :80| PublicIP
    PublicIP --> NSG
    NSG --> NIC
    NIC --> VM

    VM --> Web
    VM --> DB

    Web -->|Docker network :3306| DB
