# monitorin-server

Projeto para disciplina de "Mobile" ("Dispositivos móveis"). Consiste em um app para estudantes conferirem sua performance acadêmica e saberem em que disciplinas devem concentrar mais esforços para ter o melhor desempenho geral no semestre. Professores registram o desempenho dos estudantes. Dentre outras funcionalidades.

O aplicativo segue uma arquitetura cliente-servidor, sendo que esse repositório se refere a parte servidor do Monitorin. Mais especificamente consiste em uma API baseada no Laravel Framework, seguindo o padrão REST e retornando para o app-cliente uma resposta JSON via AJAX conforme as requisições do usuário.

Dentre as funcionalidades do Laravel utilizadas inclui-se o Eloquent ORM, QueryBuilder, Factories para seeding do banco com a biblioteca third-party Faker, dentre outras.
