# 📦 Sistema de Entidades – Backend (Laravel 5.4)

Este projeto é uma API desenvolvida em Laravel 5.4, configurada para rodar em ambiente Docker. Ele fornece endpoints autenticados via token, CRUD de entidades, e utiliza seeders para popular os dados iniciais.

---

## 🚀 Tecnologias Utilizadas

- [PHP 7.0 ]
- [Laravel 5.4]
- [MySQL]
- [Docker & Docker Compose]
- [Seeders ]

---

## ⚙️ Pré-requisitos

Certifique-se de ter as seguintes ferramentas instaladas:

- [Docker instalado]
- [Docker Compose instalado]

---

## 💻 Instalação

1. **Clone o repositório**

```bash
git clone https://github.com/lucaasbritto/amorsaude_back.git
cd backend/src
```

2. **Copie o arquivo .env e configure com os dados do seu banco**
cp .env.example .env

3. **Suba os containers com Docker**
docker-compose up -d

4. **Instale as dependências do PHP**
docker exec -it exec app bash
composer install

5. **Gere a chave da aplicação**
php artisan key:generate

6. **Rode as migrações e os seeders**
php artisan migrate --seed

## 🔐 Autenticação

1. **Login**
POST /api/login
{
  "email": "amorsaude@teste.com",
  "password": "123456"
}

## 📬 Endpoints principais
| Método | Rota                             | Descrição                  |
|--------|----------------------------------|----------------------------|
| POST   | /api/login                       | Login do usuário           |
| GET    | /api/entidades                   | Lista de entidades         |
| POST   | /api/entidades                   | Cria uma nova entidade     |
| GET    | /api/entidades/busca/{id}        | Detalhes de uma entidade   |
| PUT    | /api/entidades/{id}              | Atualiza entidade          |
| DELETE | /api/entidades/{id}              | Exclui entidade            |
| GET    | /api/entidades/regionais         | Lista de regionais         |
| GET    | /api/entidades/especialidades    | Lista de especialidades    |

## 🧪 Dados de exemplo
O sistema já vem com dados de teste criados via seeders. Eles incluem usuários, regionais, especialidades e algumas entidades.