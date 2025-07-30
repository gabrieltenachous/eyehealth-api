---

````md
# 👁️ Eyehealth API

API para cadastro e gerenciamento de exames e pacotes de exames.

> Laravel 12 + Docker + DDD Light + Swagger + UUID + Testes automatizados.

---

## ✅ Requisitos

- Docker + Docker Compose
- PHP 8.3 (para uso local, se quiser rodar sem container)
- Composer

---

## 🚀 Rodando com Docker

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/eyehealth-api.git
cd eyehealth-api
````

### 2. Copie o `.env`

```bash
cp .env.example .env
```

> Certifique-se de que a variável `API_TOKEN` está definida (usada para autenticação nas rotas da API).

---

### 3. Suba os containers

```bash
docker-compose up -d --build
```

---

### 4. Instale as dependências PHP no container

```bash
docker exec -it php-fpm composer install
```

---

### 5. Gere a chave da aplicação

```bash
docker exec -it php-fpm php artisan key:generate
```

---

### 6. Rode as migrations + seeders

```bash
docker exec -it php-fpm php artisan migrate:fresh --seed
```

---

## 🧪 Rodando os testes

```bash
docker exec -it php-fpm php artisan test
```

> Testes unitários e de endpoints cobrem `Exams` e `Packages`.

---

## 🧾 Documentação da API (Swagger)

Acesse:

```
http://localhost:8000/api/documentation
```

---

## 🔐 Autenticação via Token

Todas as rotas exigem um token fixo no header:

```http
Authorization: wQ8ehU2x4gj93CH9lMTnelQO3GcFvLzyqn8Fj3WA0ffQy57I60
```

Você pode alterar o token via `.env`:

```env
API_TOKEN="seu-token-personalizado"
```

---

## 📁 Estrutura (DDD Light)

```
app/Domains/Exams/
├── Actions/
├── DTOs/
├── Events/
├── Models/
├── Repositories/
├── Resources/
└── Services/
```

---

## 🐳 Atalhos úteis

```bash
# Acessar o container
docker exec -it php-fpm bash

# Rodar migrations
docker exec -it php-fpm php artisan migrate

# Atualizar Swagger
docker exec -it php-fpm php artisan l5-swagger:generate
```
 