# 🛍️ VarejoAqui

**VarejoAqui** é uma plataforma web desenvolvida com Laravel, focada em conectar microempreendedores locais com consumidores. O objetivo é facilitar a venda e compra de produtos de forma acessível, rápida e funcional.

---

## 🚀 Funcionalidades

- 🛒 Catálogo de produtos com imagens e categorias
- ❤️ Sistema de favoritos (usuário pode favoritar produtos)
- 🔎 Filtro por categorias e busca por palavra-chave
- 📥 Carrinho de compras com quantidade e valor total
- ✅ Finalização de pedidos (checkout) e armazenamento de histórico
- 🧾 Página de **Meus Pedidos**
- 📬 Sistema de mensagens com visualização e badge de novas mensagens
- 🔐 Autenticação de usuários com login/registro
- 📱 Interface responsiva com Bootstrap 5
- 🌙 Suporte a modo escuro automático

---

## 🧑‍💻 Tecnologias Utilizadas

- Laravel 10+
- PHP 8.1+
- Bootstrap 5
- MySQL
- Blade Templates
- SweetAlert2 (para feedbacks visuais)
- Eloquent ORM

---

## 📦 Instalação Local

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/varejoaqui.git
cd varejoaqui
```

### 2. Instale as dependências

```bash
composer install
npm install && npm run dev # se usar Vite
```

### 3. Configure o `.env`

Crie um arquivo `.env` com base no `.env.example` e configure seu banco de dados local:

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Rode as migrations

```bash
php artisan migrate
```

### 5. Inicie o servidor local

```bash
php artisan serve
```

---

## 🌐 Página Inicial

A aplicação já inclui uma **landing page** moderna e responsiva, acessível em `/`, com informações sobre o projeto e navegação para produtos.

---

## 📬 Mensagens

O sistema de contato está integrado à tabela `contacts` e permite:
- Envio de mensagens rápidas
- Visualização no painel `/contato`
- Marcação automática de mensagens como lidas
- Contador de mensagens não lidas com badge na navbar

---

## 📷 Imagens

As imagens dos produtos são armazenadas via sistema de upload com `Storage::disk('public')`. Certifique-se de rodar:

```bash
php artisan storage:link
```

---

## ✅ Deploy

O projeto pode ser facilmente implantado no:

- **Render.com** (recomendado gratuito)
- **Laravel Forge + VPS**
- **cPanel** (tradicional)

---

## 👨‍🎓 Autor

**Frank Oliveira**  
Estudante de Engenharia da Computação & Desenvolvimento de Software  
GitHub: [github.com/Frank1br](https://github.com/Frank1br)

---

## 📄 Licença

Este projeto está licenciado sob a **MIT License** — sinta-se livre para usar, adaptar ou contribuir!
