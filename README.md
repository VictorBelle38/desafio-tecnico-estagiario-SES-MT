# Desafio Técnico - Estágio SES-MT 🛠️

Este projeto é uma aplicação web de **gestão de tarefas (To-Do List)** desenvolvida com o framework **Laravel 12**, utilizando **Blade** como engine de templates e **Bootstrap 5** para a interface responsiva. A aplicação foi criada para atender ao desafio técnico da vaga de estágio como desenvolvedor PHP/Laravel da SES-MT.

---

## 🔧 Tecnologias Utilizadas

- **Laravel 12** – Backend PHP
- **Blade** – Engine de templates do Laravel
- **Bootstrap 5** – Framework de estilização CSS
- **Laravel Breeze** – Autenticação com Login/Registro
- **MySQL/SQLite** – Banco de dados
- **Git** – Versionamento

---

## ✅ Funcionalidades

- [x] Cadastro e login de usuários
- [x] CRUD de tarefas (criar, editar, concluir e excluir)
- [x] Cada usuário visualiza apenas suas tarefas
- [x] Interface responsiva com menu fixo e logout
- [x] Filtro por status (pendentes, concluídas, todas)
- [x] Paginação de tarefas

---

## 🚀 Como rodar o projeto localmente

```bash
# Clone o repositório
git clone https://github.com/VictorBelle38/desafio-tecnico-estagiario-SES-MT.git
cd desafio-tecnico-estagiario-SES-MT

# Instale as dependências
composer install
npm install && npm run build

# Copie o arquivo de ambiente
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate

# Configure o banco de dados no arquivo .env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

# Rode as migrations
php artisan migrate

# Inicie o servidor
php artisan serve

```
👨‍💻 Autor
Victor Bellé
Estudante de Engenharia da Computação

📄 Licença
Este projeto está sob a licença MIT.
