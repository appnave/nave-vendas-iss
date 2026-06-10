# nave-vendas-iss

Pacote privado da Nave para integração com o serviço Vendas ISS. O consumo é feito por projetos Laravel via Composer com repositório VCS.

## Visão geral

- Provider: `Bildvitta\IssVendas\IssVendasServiceProvider`
- Alias disponível: `vendas`
- Configuração publicada em `config/iss-vendas.php`
- Conexão de banco auxiliar: `iss-vendas`

## Requisitos

- PHP `^8.1`
- Laravel `8` a `12`
- Composer 2
- Acesso ao GitHub privado do pacote e das dependências privadas

## Acesso aos Repositórios Privados

No projeto cliente, adicione o repositório VCS em `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/appnave/nave-vendas-iss"
    }
  ]
}
```

Instale o pacote:

```bash
composer require appnave/nave-vendas-iss
```

Se o pacote ou suas dependências forem privados, o Composer precisa estar autenticado com um token que tenha acesso de leitura aos repositórios envolvidos.

Autenticação local:

```bash
composer config -g github-oauth.github.com <YOUR_TOKEN>
```

GitHub Actions:

```yaml
env:
  COMPOSER_AUTH: >-
    {"github-oauth":{"github.com":"${{ secrets.GH_TOKEN }}"}}
```

## Instalação Local

No projeto cliente:

```bash
php artisan vendor:publish --tag="vendas-config"
```

Configure as variáveis conforme o ambiente:

```env
MS_VENDAS_BASE_URI=https://api-dev-vendas.nave.dev
MS_VENDAS_FRONT_URI=https://develop.vendas.nave.dev
MS_VENDAS_API_PREFIX=/api

MS_VENDAS_DB_URL=
MS_VENDAS_DB_HOST=
MS_VENDAS_DB_PORT=
MS_VENDAS_DB_DATABASE=
MS_VENDAS_DB_USERNAME=
MS_VENDAS_DB_PASSWORD=
```

Exemplo de uso:

```php
use Bildvitta\IssVendas\Facades\IssVendas;

$sale = IssVendas::programmatic()->sale()->find($id);
```

## Comandos Úteis

```bash
php artisan vendor:publish --tag="vendas-config"
composer test
composer analyse
composer check-style
composer fix-style
```

## Convenções

- O arquivo de configuração principal é `config/iss-vendas.php`.
- A trait `Bildvitta\IssVendas\Traits\UsesVendasDB` registra a conexão `iss-vendas` com as credenciais em `MS_VENDAS_DB_*`.
- O histórico de mudanças está em `CHANGELOG.md`.
