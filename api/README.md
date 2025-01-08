# ToDo List (api)

Uma Api-Rest desenvolvida em laravel, um framework PHP que fornece as funcionalidades de gerenciamento de tarefas para a aplicação ToDo List.

## Rotas da api

A seguir, as principais rotas disponíveis na API:

| **Rota**                    | **Método** | **Descrição**                     |
| --------------------------- | ---------- | --------------------------------- |
| `api/category`              | `POST`     | Cria uma nova categoria.          |
| `api/category`              | `GET`      | Retorna todas as categorias.      |
| `api/category/{id}`         | `PATCH`    | Atualiza uma categoria existente. |
| `api/category/{id}`         | `DELETE`   | Deleta uma categoria existente.   |
| `api/task`                  | `POST`     | Cria uma nova tarefa.             |
| `api/task?order=desc / asc` | `GET`      | Retorna todas as tarefas.         |
| `api/task/{id}`             | `PATCH`    | Atualiza uma tarefa existente.    |
| `api/task/{id}`             | `DELETE`   | Deleta uma tarefa existente.      |

## 📦 Como rodar o projeto

1. Acesse o diretório da API

```bash
 cd softpar/api
```

2. Instale as dependências do Laravel

```bash
 composer install
```

3. Crie o arquivo .env a partir do arquivo .env.example

```bash
 cp .env.example .env
```

4. Gere a chave da aplicação

```bash
 php artisan key:generate
```

5. Inicie o banco de dados utilizando o docker

```bash
docker compose up -d
```

6. Rode as migrações para c riar as tabelas no banco de dados

```bash
 php artisan migrate
```

7. Crie o Seed das categorias

```bash
 php artisan db:seed --class=CategorySeeder
```

8: Inicie o servidor de Desenvolvimento

```bash
 php artisan serve
```
