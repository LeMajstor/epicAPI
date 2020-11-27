# Epic_API

A Epic_API é uma API REST que possibilita o gerenciamento de usuários, sendo possível adicionar, editar e excluir novos registros.Também contempla a criação automática de logs de alterações para cada usuário.

A documentação completa pode ser encontrada na minha [conta do Postman](https://www.postman.com/explore/template/14708/epicapi) A Collection está publicada neste repositório.

## Getting started

A Epic_API foi desenvolvida usando PHP 7.4 e MySql v8.0.22 portanto certifique-se de configurar seu ambiente de acordo.

O projeto pode ser encontrado no GitHub. No seu terminal digite para copiar o projeto para o seu computador.

```
git init 
git clone https://github.com/LeMajstor/epicAPI
cd epicAPI
```

Para gerar o arquivo .env em seu ambiente execute o comando a seguir:

```
php artisan key:generate
```

Por fim, para preparar as tabelas do banco para receber os dados execute os migrations com o seguinte comando:

```
php artisan migrate
```

## Contact Support

* Name: Edinaldo Ribeiro
* Email: [edinaldoprofi99@gmail.com](mailto:edinaldoprofi99@gmail.com)