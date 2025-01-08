# Todo List com Laravel e Quasar Framework

Esse é um projeto de uma ToDo-list desenvolvida para um processo seletivo. Aonde o foco foi a Criação, Busca, Edição e Deletar uma tarefa.

## 🚀 Tecnologias Utilizadas

- **Backend**: Laravel na versão 5.10 com o PHP na versão 8.4.1

  - Framework PHP robusto para criação de APIs RESTful e manipulação de banco de dados.

- **FrontEnd**: Quasar Framework

  - Framework baseado em Vue.js que facilita a criação de interfaces de usuário responsivas e performáticas.

- **Banco de Dados**: PostgreSQL na versão 17.2.0
  - Sistema de gerenciamento de banco de dados utilizado para armazenar as tarefas e informações do usuário.

## 📋 Funcionalidades Desenvolvidas

- **Cadastro de Tarefas**
- **Listagem de Tarefas**
- **Edição de Tarefas**
- **Exclusão de Tarefas**

## 🛠️ Funcionalidades Incompletas

Devido à limitação de tempo por causa do fim das minhas ferias.

1. **Ordenação das Tarefas**

- Fiz o sistema de buscar as tarefas de forma decrescente ou crescente conforme a data de criação, mas não consegui implementar completamento no Front-End. Mas a rota para essa funcionalidade é a **api/task?order=desc | asc**.

2. **Categoria das Tarefas**

- Comecei a fazer o sistema de categorias aonde relacionava com a tabela de tarefas, mas faltou a implementação do sistema de cores personalizadas de acordo com cada categoria.

## Pastas de Estrutura

- **API**: Está localizada dentro da pasta API, onde você encontrará tudo a respeito ao backend em Laravel. contendo um Readme com as instruções para configurar e rodar a API.

- **WEB**: A pasta WEB contém o frontend que foi desenvolvido utilizando o Quasar Framework. aonde contem um Readme com as instruções para configurar e iniciar o servidor de frontend

## 📦 Como rodar o projeto

1. Clone o repositório:

```bash
git clone https://github.com/diovanealves/softpar
```

2. Agora o projeto sera divido em duas partes: **API** e **WEB**

- Para acessar o README com as instruções detalhadas de como rodar a API, clique [aqui](./api//README.md)

- Para acessar o README com as instruções detalhadas de como rodar o Front-End, clique [aqui](./web/README.md)
