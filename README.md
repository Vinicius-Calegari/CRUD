# Gestão de Clientes — PHP & MySQL

CRUD web para gerenciamento de clientes, usado para demonstrar integração entre PHP, MySQL e interface web.

[![Demo](https://img.shields.io/badge/DEMO-ABRIR-2563EB?style=for-the-badge&logo=github)](https://vinicius-calegari.github.io/CRUD/)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white)
![CI](https://img.shields.io/github/actions/workflow/status/Vinicius-Calegari/CRUD/php-quality.yml?label=PHP%20syntax)

## Demo pública

O repositório inclui uma demonstração interativa em `demo/`, preparada para GitHub Pages. Ela reproduz criação, busca, edição e exclusão de clientes usando `localStorage`, permitindo testar a experiência sem provisionar um servidor PHP/MySQL.

**Importante:** a demo é exclusivamente front-end e mantém os dados no navegador. O backend PHP/MySQL original continua neste repositório e é a implementação usada para demonstrar persistência em banco, prepared statements e integração servidor/banco.

## Funcionalidades do projeto PHP/MySQL

- cadastro, listagem, edição e exclusão de clientes
- validação básica de entrada
- prepared statements nas operações que recebem dados do usuário
- escaping de saída HTML para reduzir risco de XSS
- configuração de banco via variáveis de ambiente

## Executar localmente

1. Importe `barbearia.sql` no MySQL.
2. Defina as variáveis conforme `.env.example` no ambiente do servidor PHP.
3. Inicie o projeto em PHP 8+.

Variáveis esperadas:

```text
DB_HOST
DB_USER
DB_PASSWORD
DB_NAME
```

Há valores locais de desenvolvimento como fallback, mas credenciais reais não devem ser commitadas.

## Estrutura

```text
index.php       # interface e listagem
cadastrar.php   # criação
editar.php      # atualização
excluir.php     # exclusão
db.php          # conexão
barbearia.sql   # schema
demo/           # versão demonstrativa para GitHub Pages
```

## Segurança e qualidade

As consultas de escrita usam prepared statements e a interface escapa dados vindos do banco antes de renderizá-los. O GitHub Actions executa `php -l` sobre os arquivos PHP em pushes e pull requests.

> Este projeto é deliberadamente pequeno. Para produção, exclusões devem usar POST + proteção CSRF, além de autenticação/autorização e testes automatizados.

---

Desenvolvido por [Vinícius Calegari](https://github.com/Vinicius-Calegari).
