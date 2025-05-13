
<div align="center">

![Contatos](image/banner.png)

</div>

# Sistema para Controle de Contatos

Este repositório contém um projeto simples para controle de contatos desenvolvido com foco em boas práticas, utilizando **PHP**, **PostgreSQL**, **Doctrine ORM**, **padrão MVC** e **Docker**.

> Ideal para estudos, testes técnicos ou como base para novos projetos PHP com arquitetura limpa e separação de responsabilidades.

---

## ⚙️ Tecnologias utilizadas

- PHP 8.x
- PostgreSQL
- Doctrine ORM
- Docker e Docker Compose
- Composer

---

## 🚀 Como executar o projeto

### ✅ Pré-requisitos

Certifique-se de que você tem instalado em sua máquina:

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- [Git](https://git-scm.com/) (opcional)

---

### 📦 Passo a passo

1. **Clone o repositório**

```bash
git clone https://github.com/seu-usuario/seu-repo.git
cd seu-repo
```

2. **Copie o arquivo `.env` de exemplo**

```bash
cp .env.example .env
```

Verifique se os dados estão corretos:

```env
DB_DRIVER=pdo_pgsql
DB_HOST=db
DB_PORT=5432
DB_NAME=contatos=db
DB_USER=postgres
DB_PASSWORD=postgres
```

3. **Suba os containers com Docker**

```bash
docker-compose up -d --build
```

4. **Acesse o container do PHP e instale as dependências**

```bash
docker-compose exec app bash
composer install
```

5. **Gere as tabelas no banco de dados**

```bash
php vendor/bin/doctrine orm:schema-tool:update --force
```

6. **Acesse o sistema**

Abra seu navegador e acesse:

[http://localhost:8000](http://localhost:8080/public/)

---

## 🛠️ Comandos úteis

| Comando                                | Descrição                        |
|----------------------------------------|----------------------------------|
| `docker-compose up -d --build`         | Sobe os containers               |
| `docker-compose down`                  | Para os containers               |
| `docker-compose exec app bash`         | Acessa o container da aplicação  |
| `composer install`                     | Instala dependências PHP         |
| `php vendor/bin/doctrine orm:schema-tool:update --force` | Gera o schema do banco de dados |

---

## 📁 Estrutura do projeto

```
├── .docker/
├── image/
├── public/
├── src/
│   ├── Controller/
│   ├── Model/
│   ├── View/
├── vendor/
├── .env.example
├── bootstrap.php
├── cli-config.php
├── composer.json
├── composer.lock
├── docker-compose.yml
├── Dockerfile
└── README.md
```

---

## 📚 Documentação das ferramentas

- [Composer](https://getcomposer.org/)
- [Doctrine ORM](https://www.doctrine-project.org/projects/doctrine-orm/en/current/)
- [Docker](https://www.docker.com/)
- [PostgreSQL](https://www.postgresql.org/)

---

## 📩 Contato

Em caso de dúvidas, sugestões ou contribuições, sinta-se à vontade para abrir uma issue ou enviar um pull request.

---
