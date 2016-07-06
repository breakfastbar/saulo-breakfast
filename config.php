<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://localhost/BreakFast/');
define('LIBS', 'libs/');
define('MODS', 'models/');

//define('DB_TYPE', 'mysql');
//define('DB_HOST', 'mysql.hostinger.com.br');
//define('DB_NAME', 'u374874655_break');
//define('DB_USER', 'u374874655_break');
//define('DB_PASS', 'breakfastbar1');


define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'breakfast');
define('DB_USER', 'root');
define('DB_PASS', '');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');

//Mensagens do sistema
define('MSG1', 'As senhas não coincidem confirme as e tente novamente');
define('MSG2', 'Usuário adicionado com sucesso');
define('MSG3', 'Erro ao adicionar usuário');
define('MSG4', 'Usuário excluido com sucesso!');


define('MSG001', 'A descrição e categoria condiz com um produto já existente no sistema, verifique os dados do produto a ser cadastrado e tente novamente!');
define('MSG002', 'O produto não pode ser excluído pois existe pedidos pendentes que o contém. Finalize todos os pedidos com o referenciado produto e tente novamente!');
define('MSG003', 'O produto não pode excluído pois existe pedidos pendentes que o contém. Finalize todos os pedidos com o referenciado produto e tente novamente!');
define('MSG004', 'O CPF condiz com um usuário já cadastrado no sistema, verifique as informações do novo usuário e tente novamente!');
define('MSG005', 'Deseja realmente atualizar o status do pedido?');
define('MSG006', 'O status do pedido foi atualizado com sucesso!');
define('MSG007', 'Deseja realmente atualizar a quantidade do produto disponível em estoque?');
define('MSG008', 'O valor em caixa é menor que o espero para o dia, confirmando o fechamento o caixa ficará com saldo divergente com o lucro esperado para o dia!');
define('MSG009', 'O valor em caixa é maior que o espero para o dia, confirmando o fechamento o caixa ficará com saldo divergente com o lucro esperado para o dia!');
define('MSG010', 'O fechamento da comanda foi realizado com sucesso!');
define('MSG011', 'Valor fornecido pelo cliente é menor que o valor total da comanda! Verifique o valor pago pelo cliente ou realize o fechamento da comanda gerando desconto!');
define('MSG012', 'Ainda possui comanda aberta, para fechar o caixa é necessario que todas as comandas estejam fechadas!');
define('MSG013', 'Fechamento de caixa realizado com sucesso');
define('MSG014', 'O usuário de acesso condiz com um usuário já cadastrado no sistema, verifique as informações do novo usuário e tente novamente!');
define('MSG015', 'As senhas não coincidem, confirme as e tente novamente!');
define('MSG016', 'Usuário cadastrado com sucesso!');
define('MSG017', 'Erro ao cadastrar usuário!');
define('MSG018', 'Usuário excluído com sucesso!');
define('MSG019', 'Erro ao excluir usuário!');
define('MSG020', 'Produto cadastrado com sucesso!');
define('MSG021', 'Erro ao cadastrar produto!');
define('MSG022', 'Produto excluído com sucesso!');
define('MSG023', 'Erro ao excluir produto!');
define('MSG024', 'Categoria cadastrada com sucesso!');
define('MSG025', 'Erro ao cadastrar categoria!');
define('MSG026', 'Categoria excluída com sucesso!');
define('MSG027', 'Erro ao excluir categoria!');
define('MSG028', 'Setor cadastrado com sucesso!');
define('MSG029', 'Erro ao cadastrar setor!');
define('MSG030', 'Setor excluído com sucesso!');
define('MSG031', 'Erro ao excluir setor!');


define('MSG032', 'Mesa cadastrada com sucesso!');
define('MSG033', 'Erro ao cadastrar mesa!');
define('MSG034', 'Mesa excluída com sucesso!');
define('MSG035', 'Erro ao excluir mesa!');


define('MSG036', 'Pedido cadastrado com sucesso!');
define('MSG037', 'Erro ao cadastrar pedido!');
define('MSG038', 'Pedido excluído com sucesso!');
define('MSG039', 'Erro ao excluir pedido !');




define('C_ABERTA', 1);
define('C_FECHADA', 2);
define('C_EM_FECHAMENTO', 3);

define('P_PENDENTE', 1);
define('P_EM_PRODUÇÃO', 2);
define('P_FINALIZADO', 3);
define('P_ENTREGUE', 4);
define('P_CANCELADO', 5);

define('M_DISPONIVEL', 1);
define('M_OCUPADA', 2);
define('M_EM_FECHAMENTO', 3);
