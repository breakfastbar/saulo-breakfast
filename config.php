<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', '/breakfast/');
define('LIBS', 'libs/');
define('MODS', 'models/');

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
define('MSG1','As senhas não coincidem confirme as e tente novamente');
define('MSG2','Usuário adicionado com sucesso');
define('MSG3','Erro ao adicionar usuário');
define('MSG4','Usuário excluido com sucesso!');

