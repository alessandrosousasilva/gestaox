# 📊 GestaoX — Tarefas & Frota

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Architecture](https://img.shields.io/badge/Architecture-MVC-0052CC?style=for-the-badge)](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller)
[![Design Patterns](https://img.shields.io/badge/Patterns-Singleton%20%7C%20Front%20Controller-Orange?style=for-the-badge)](https://en.wikipedia.org/wiki/Software_design_pattern)

Este sistema é um projeto prático desenvolvido para a disciplina de **Aplicações para a Internet**, do curso de **Sistemas de Informação** da **Universidade de Uberaba (Uniube)**. <br>
O **Gestaox** é uma aplicação web responsiva desenvolvida em **PHP Nativo (sem frameworks)** e **MySQL**. <br>
O código foi estruturado utilizando a arquitetura **MVC (Model-View-Controller)** e aplica padrões de projeto clássicos (_Design Patterns_) para garantir o isolamento completo de responsabilidades e a segurança no tratamento dos dados.

---

## 🚀 Funcionalidades

### 🔐 1. Controle de Acesso & Autenticação

- **Registo e Login:** Fluxo completo de autenticação de utilizadores com persistência em sessão (`$_SESSION`).
- **Segurança Criptográfica:** Armazenamento seguro de passwords utilizando hashing adaptativo com o **bcrypt** através da função nativa `password_hash()` do PHP.
- **Proteção de Rotas:** Bloqueio automático de acessos diretos às páginas internas para utilizadores não autenticados.

### 📝 2. Dashboard de Tarefas (CRUD Completo)

- **Create:** Adição rápida de novas tarefas associadas ao ID do utilizador logado.
- **Read:** Listagem dinâmica das tarefas no painel principal em formato de _Cards_.
- **Update:** Edição em tempo real do título da tarefa e alternância de estado instantânea (_Pendente_ em laranja / _Concluída_ em verde com efeito _strikethrough_).
- **Delete:** Remoção definitiva com gatilhos de confirmação.

### 🚚 3. Gestão de Frota Logística (Módulo Customizado — CRUD)

- **Create:** Cadastro de veículos informando Placa, Modelo.
- **Read:** Tabela estilizada com efeitos de _hover_, paginação visual.
- **Update:** Painel de edição que injeta os dados anteriores nos campos para atualização segura das informações.
- **Delete:** Exclusão lógica direta no banco de dados.

---

## 🔧 Instalação e Configuração

1. **Mover para o Servidor:**
   - Garanta que a pasta do projeto esteja com o nome exato de `GESTAOX` e mova-a para o diretório de leitura do seu servidor local (`C:\xampp\htdocs\GESTAOX`).

2. **Subir os Serviços:**
   - Abra o Painel de Controle do XAMPP e inicialize os módulos **Apache** e **MySQL**.

3. **Importar o Banco:**
   - Clique no botão **Shell** do painel do XAMPP e acesse o terminal do banco executando: `mysql -u root`
   - Crie a base de dados colando as instruções SQL.

4. **Rodar no Navegador:**
   - Acesse a URL:
     ```text
     http://localhost/GESTAOX/index.php
     ```

## 🗄️ Base de Dados (SQL)

Execute o script de modelagem relacional abaixo no console do seu servidor MySQL:

```sql
CREATE DATABASE IF NOT EXISTS sistema_frota_mvc;
USE sistema_frota_mvc;

-- Tabela de Utilizadores (Foco em segurança)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Tabela de Tarefas (Relacionamento 1:N com integridade referencial)
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    status ENUM('Pendente', 'Concluida') DEFAULT 'Pendente',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Tabela de Veículos Logísticos
CREATE TABLE vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    placa VARCHAR(20) NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    tipo ENUM('Frota Propria', 'Terceirizada', 'Entrega Direta') NOT NULL
);
```

---

## 📁 Estrutura do Projeto

```text
/GESTAOX
  /assets
    style.css               # Folha de estilos unificada (Design SaaS profissional)
  /config
    Database.php            # Conexão MySQL isolada via Singleton Pattern
  /controllers
    AuthController.php      # Controle de sessão, registo e login
    DashboardController.php # Lógica de processamento das Tarefas
    VehicleController.php   # Lógica do CRUD de Veículos
  /models
    User.php                # Modelo da entidade Utilizador (Bcrypt hashing)
    Task.php                # Modelo da entidade Tarefa (Queries PDO)
    Vehicle.php             # Modelo da entidade Veículo (Queries PDO)
  /views
    dashboard.php           # Painel de Tarefas estruturado em Cards
    login.php               # Tela de Login com fundo degradê centralizado
    register.php            # Tela de Registo com inputs modernos
    task_add.php            # Formulário elegante de adição de tarefas
    task_edit.php           # Formulário de modificação de títulos de tarefas
    vehicles.php            # Tabela analítica da Frota e formulário horizontal
    vehicle_edit.php        # Formulário dedicado de edição de veículos
  index.php                 # Ponto de entrada global e Roteador (Front Controller)

```
