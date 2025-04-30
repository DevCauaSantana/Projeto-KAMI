# 💇‍♀️ KAMI - Sistema de Agendamento para Salões de Beleza

**KAMI** é uma plataforma desenvolvida como Projeto Integrador no 2º ano do Ensino Médio em 2023 por Cauã Santana e Julia Bispo. O sistema tem como objetivo facilitar o agendamento de horários em salões de cabeleireiro, proporcionando uma experiência prática tanto para os clientes quanto para os profissionais do salão.

## ✨ Funcionalidades

- 📅 **Agendamento Online:** Clientes podem reservar horários de forma rápida e intuitiva.
- 🧑‍💼 **Gestão de Atendimentos:** Os salões conseguem visualizar, organizar e controlar seus agendamentos.
- 🛠️ **Cadastro de Serviços:** Possibilidade de adicionar e editar as informações do salão.
- 📊 **Visualização de Agenda:** Interface clara para visualização de horários disponíveis e agendados.

## 🧪 Tecnologias Utilizadas

- **Frontend:**
  - HTML
  - CSS
  - Bootstrap
  - JavaScript

- **Backend:**
  - PHP
  - Java

- **Banco de Dados:**
  - PostgreSQL

---

# 🛠️ Instalação

## ✅ Pré-requisitos

- [Docker](https://www.docker.com/) instalado  
- [Docker Compose](https://docs.docker.com/compose/install/) instalado  
- [Git](https://git-scm.com/downloads) (para clonar o repositório)

## 🚀 Passos para rodar o projeto

### 1. Clone o repositório

```bash
git clone https://github.com/DevCauaSantana/Projeto-KAMI.git
cd Projeto-KAMI/KAMI\ WEB/
```

### 2. Suba os containers

```bash
docker compose up -d
```

### 3. Acesse o projeto

- Acesse no navegador:  
  👉 [`http://localhost:9000`](http://localhost:9000)

---

## 🗃️ Informações do Banco de Dados

| Variável        | Valor           |
|----------------|-----------------|
| Host           | `localhost`     |
| Porta          | `5433`          |
| Usuário        | `postgres`      |
| Senha          | `postdba`       |
| Banco          | `projeto_kami`  |

- Caso deseje alterar alguma informação, edite os arquivos:
  - `config.ini`
  - `docker-compose.yml`

Exemplo de configuração:
```ini
driver = "pgsql"
server = "postgres"
user = "postgres"
password = "postdba"
database = "projeto_kami"
port = "5432"
debug = "false"
```

```yaml
POSTGRES_USER: postgres
POSTGRES_PASSWORD: postdba
POSTGRES_DB: projeto_kami
```

---

### 4. Derrubar os containers

```bash
docker compose down
```