
# Vajero Aqui

## 🚀 Plataforma de Microempreendedores Locais

### 💡 Sobre o Projeto

VarejoAqui é uma plataforma web que conecta microempreendedores locais (artesãos, confeiteiros, costureiras, entre outros) a clientes da sua própria cidade. Através do sistema, os empreendedores podem criar contas, cadastrar seus produtos, gerenciar suas vendas e receber mensagens de clientes interessados, facilitando a divulgação e comercialização online de forma acessível e simples.

---

### 🎯 Problema que Resolve

Muitos microempreendedores enfrentam dificuldade para divulgar e vender seus produtos pela internet, seja por falta de conhecimento técnico, recursos financeiros ou acesso a plataformas de vendas locais.

---

### 💼 Solução

VarejoAqui oferece uma solução integrada para cadastro, gerenciamento e exposição dos produtos, além de um canal direto de comunicação entre clientes e vendedores. O sistema também possui uma área administrativa para gestão dos usuários, contatos e produtos.

---

### 📌 Funcionalidades

#### Área Pública

- Página Home com missão do projeto e destaques para empreendedores em alta e categorias.
- Página Sobre com informações do projeto e equipe.
- Página Produtos com listagem e filtros por categoria.
- Página Contato com formulário para mensagens (salvas no banco).

#### Área Autenticada (Empreendedores)

- Dashboard personalizado para cada usuário.
- Cadastro de produtos com upload de imagem, descrição e preço.
- Listagem dos próprios produtos com opções de editar e excluir.
- Visualização das mensagens recebidas dos clientes.

#### Área Administrativa (opcional)

- Visualização geral de usuários e gerenciamento.
- Moderação de mensagens.
- Banimento de usuários ou destaque de produtos.

---

### 🛠 Tecnologias Utilizadas

- Backend: Laravel PHP Framework
- Banco de Dados: MySQL
- Frontend: Blade Templates com Bootstrap/Tailwind CSS
- Autenticação: Laravel Breeze / Laravel UI
- Controle de Versão: Git e GitHub

---

### 📁 Estrutura do Projeto

```
resources/views/
├── layouts/
│   └── app.blade.php           # Template base com navbar
├── home.blade.php              # Página inicial
├── about.blade.php             # Página sobre
├── contact.blade.php           # Página contato
├── products.blade.php          # Listagem pública de produtos
└── dashboard/
    ├── index.blade.php        # Dashboard do usuário
    ├── create_product.blade.php # Formulário cadastro produto
    └── my_products.blade.php  # Listagem de produtos do usuário
```

---

### 📦 Migrações e Models Principais

- Tabela `users`: Cadastro e autenticação de usuários.
- Tabela `products`: Produtos cadastrados pelos usuários.
- Tabela `categories`: Categorias para classificação de produtos.
- Tabela `contacts`: Mensagens enviadas via formulário de contato.

---

### 🔧 Próximos Passos / Escalabilidade

- Implementar sistema de busca e filtros por localização.
- Adicionar sistema de avaliações e comentários.
- Criar painel de analytics simples para empreendedores.
- Permitir funcionalidade para favoritar produtos.
- Integrar sistema de pagamentos (ex: Stripe, PagSeguro).
- Adicionar responsividade aprimorada e animações.

---

### 🤝 Como Contribuir

Contribuições são bem-vindas! Para contribuir:

1. Faça um fork do projeto.
2. Crie uma branch com a feature: `git checkout -b feature/nome-da-feature`
3. Faça commit das suas alterações: `git commit -m 'Add nova feature'`
4. Push para a branch: `git push origin feature/nome-da-feature`
5. Abra um Pull Request.

---

### 📞 Contato

Caso queira entrar em contato, envie uma mensagem através da página Contato do sistema ou diretamente pelo email: seuemail@exemplo.com

---

### 📄 Licença

Este projeto está licenciado sob a MIT License - veja o arquivo [LICENSE](LICENSE) para detalhes.
