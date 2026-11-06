<?php // -*-mode: PHP; coding:utf-8;-*-
declare(strict_types=1);
namespace MRBS;

/**************************************************************************
 * MRBS Configuration File - Docker Dev Environment - Crea-DF
 * Conselho Regional de Engenharia e Agronomia do Distrito Federal
 * Sistema de Reserva de Salas
 **************************************************************************/

/**********
 * Timezone
 **********/
$timezone = $_ENV['MRBS_TIMEZONE'] ?? "America/Sao_Paulo";


/*******************
 * Database settings
 ******************/
$dbsys = $_ENV['MRBS_DB_SYSTEM'] ?? "mysql";
$db_host = $_ENV['MRBS_DB_HOST'] ?? "db";
$db_database = $_ENV['MRBS_DB_DATABASE'] ?? "mrbs";
$db_login = $_ENV['MRBS_DB_USER'] ?? "mrbs";
$db_password = $_ENV['MRBS_DB_PASSWORD'] ?? "mrbs";
$db_tbl_prefix = $_ENV['MRBS_DB_TBL_PREFIX'] ?? "mrbs_";
$db_persist = false;


/**************************************************
 * Identidade Institucional - Crea-DF
 **************************************************/
$mrbs_company = "Crea-DF";
$mrbs_company_more_info = "Conselho Regional de Engenharia e Agronomia do Distrito Federal";
$mrbs_company_url = "https://www.crea-df.org.br/";
$mrbs_company_logo = "images/crea-df-logo.svg";

// Tema e Folha de Estilos Customizada
$theme = "crea";
$custom_css_url = "css/custom.css";


/**************************************************
 * Controle de Acesso e Autenticação Obrigatória
 **************************************************/
// Exigir login obrigatório: bloqueia acesso público.
// Visitantes não autenticados são direcionados imediatamente para a tela de login.
$auth['deny_public_access'] = true;

// Proibir agendamento anônimo
$auth['allow_anonymous_booking'] = false;

// Tipo de autenticação: 'db' (banco de dados interno do MRBS)
$auth['type'] = "db";

// Esquema de sessão via PHP com cookie seguro
$auth['session'] = "php";
$auth['session_php']['session_name'] = "CREADF_SESSID";


/**************************************************
 * Localização e Idioma
 **************************************************/
$default_language_tokens = "pt-br";
$disable_automatic_language_changing = false;
$override_locale = "pt_BR.utf-8";

// Personalização de textos institucionais
$vocab_override['pt-br']['mrbs'] = "Reserva de Salas - Crea-DF";
$vocab_override['pt-br']['please_login'] = "Identificação de Usuário";
$vocab_override['pt-br']['users.name'] = "Usuário / Matrícula";
$vocab_override['pt-br']['users.password'] = "Senha";
$vocab_override['pt-br']['login'] = "Entrar no Sistema";
$vocab_override['pt-br']['unknown_user'] = "Usuário ou senha inválidos. Em caso de dúvidas, procure a Gerência de TI do Crea-DF.";
