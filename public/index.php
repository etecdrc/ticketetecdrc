<?php

// Importando bibliotecas
use App\Models\DB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

//Indicando para ser carregado uma única vez o script de autoload, 
//que possui todas as dependências técnicas do projeto da nossa API
require_once __DIR__ . '/../vendor/autoload.php';

//Criando usando o Pattern Factory - a nossa API com o SLIM 
$app = AppFactory::create();

//Adicionando um Middleware que fará o parse (validação e separação) do body (corpo) da requisição recebida. 
$app->addBodyParsingMiddleware();

//Configurando o servidor Middleware que fará a intermediação. 
$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
$app->addErrorMiddleware(true, true, true);

//Criando uma ROTA da nossa aplicação 
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('Seja bem vindo ao ELA');
    return $response;
});

<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
//Criando uma ROTA da nossa aplicação 
$app->get('/clientes/listar', function (Request $request, Response $response) {
    $sql = "select * from tb_cliente";
    try {
        $db = new DB();
        $conn = $db->connect();
        $stmt = $conn->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        $response->getBody()->write(json_encode($users));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus(200);
    } catch (PODException $e) {
        $error = array(
            "message" => $e->getMessage()
        );
    }

    $response->getBody()->write(json_encode($error));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(500);
});

//Criando uma ROTA da nossa aplicação 
$app->get('/atendentes/listar', function (Request $request, Response $response) {
    $sql = "select * from tb_atendente";
    try {
        $db = new DB();
        $conn = $db->connect();
        $stmt = $conn->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        $response->getBody()->write(json_encode($users));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus(200);
    } catch (PODException $e) {
        $error = array(
            "message" => $e->getMessage()
        );
    }

    $response->getBody()->write(json_encode($error));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(500);
});

//Criando uma ROTA para Salvar as informações de um atendente 
$app->post('/atendentes/salvar', function (Request $request, Response $response) {

    //Corpo da Requisição - Body 
    $dados = $request->getParsedBody();

    $cd_atendente    =  $dados["cd_atendente"];
    $nomeAtendente   =  $dados["nm_atendente"];
    $funcaoAtendente =  $dados["nm_funcao"];
    $emailAtendente  =  $dados["nm_email"];
    $senhaAtendente  =  $dados["cd_senha"];
<<<<<<< Updated upstream
=======
    $stAtendente  =  $dados["st_atendente"];
>>>>>>> Stashed changes

    // Verificar se o registro já existe
    $query_select = "SELECT * FROM tb_atendente WHERE cd_atendente = '$cd_atendente'";
    $db = new DB();
    $conn = $db->connect();
    $stmt_select = $conn->query($query_select);
    $registro_existente = $stmt_select->fetch(PDO::FETCH_OBJ);

    if ($registro_existente) {
        // Registro já existe
        $response->getBody()->write('Erro ao salvar atendente! Registro já existe para o login "' . $cd_atendente . '"');
    } else {

        // Registro não existe, realizar a inserção
<<<<<<< Updated upstream
        $query_insert = "INSERT INTO tb_atendente (nm_atendente, nm_funcao, nm_email, cd_senha) VALUES ('$nomeAtendente', '$funcaoAtendente', '$emailAtendente', '$senhaAtendente')";
=======
        $query_insert = "INSERT INTO tb_atendente (nm_atendente, nm_funcao, nm_email, cd_senha, st_atendente) VALUES ('$nomeAtendente', '$funcaoAtendente', '$emailAtendente', '$senhaAtendente', '$stAtendente')";
>>>>>>> Stashed changes

        $stmt_insert = $conn->query($query_insert);

        // Verificar se a consulta foi executada com sucesso
        if ($stmt_insert->rowCount() > 0) {
            $response->getBody()->write('Atendente salvo com sucesso! "' . $nomeAtendente . '"');
        } else {
            $response->getBody()->write('Erro ao salvar atendente! -> "' . $nomeAtendente . '"');
        }
    }

    $db = null;
    return $response;
});

//Criando uma ROTA para Salvar as informações de um cliente 
$app->post('/clientes/salvar', function (Request $request, Response $response) {

    //Corpo da Requisição - Body 
    $dados = $request->getParsedBody();

    $cdCliente        =  $dados["cd_cliente"];
    $nomeCliente      =  $dados["nm_cliente"];
    $emailCliente     =  $dados["nm_email"];
    $senhaCliente     =  $dados["cd_senha"];
    $nomeDepartamento =  $dados["nm_departamento"];
    $telefoneCliente  =  $dados["cd_telefone"];
<<<<<<< Updated upstream
=======
    $st_cliente  =  $dados["st_cliente"];
>>>>>>> Stashed changes

    // Verificar se o registro já existe
    $query_select = "SELECT * FROM tb_cliente WHERE cd_cliente = '$cdCliente'";
    $db = new DB();
    $conn = $db->connect();
    $stmt_select = $conn->query($query_select);
    $registro_existente = $stmt_select->fetch(PDO::FETCH_OBJ);

    if ($registro_existente) {
        // Registro já existe
        $response->getBody()->write('Erro ao salvar cliente! Registro já existe para o login "' . $cdCliente . '"');
    } else {

        // Registro não existe, realizar a inserção
<<<<<<< Updated upstream
        $query_insert = "INSERT INTO tb_cliente (nm_cliente, nm_email, cd_senha, nm_departamento, cd_telefone) VALUES ('$nomeCliente', '$emailCliente', '$senhaCliente', '$nomeDepartamento', '$telefoneCliente')";
=======
        $query_insert = "INSERT INTO tb_cliente (nm_cliente, nm_email, cd_senha, nm_departamento, cd_telefone, st_cliente) VALUES ('$nomeCliente', '$emailCliente', '$senhaCliente', '$nomeDepartamento', '$telefoneCliente', '$st_cliente')";
>>>>>>> Stashed changes

        $stmt_insert = $conn->query($query_insert);

        // Verificar se a consulta foi executada com sucesso
        if ($stmt_insert->rowCount() > 0) {
            $response->getBody()->write('Atendente salvo com sucesso! "' . $nomeCliente . '"');
        } else {
            $response->getBody()->write('Erro ao salvar atendente! -> "' . $nomeCliente . '"');
        }
    }

    $db = null;
    return $response;
});

<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
//Criando uma ROTA para editar as informações de um atendente
$app->post('/atendentes/editar', function (Request $request, Response $response) {

    //Corpo da Requisição - Body 
    $dados = $request->getParsedBody();

    $id   =  $dados["cd_atendente"];
    $nomeAtendente   =  $dados["nm_atendente"];
    $funcaoAtendente =  $dados["nm_funcao"];
    $emailAtendente  =  $dados["nm_email"];
    $senhaAtendente  =  $dados["cd_senha"];

    // Verificar se o registro já existe
    $query_select = "SELECT * FROM tb_atendente WHERE cd_atendente = '$id'";
    $db = new DB();
    $conn = $db->connect();
    $stmt_select = $conn->query($query_select);
    $registro = $stmt_select->fetch(PDO::FETCH_OBJ);

    // Registro já existe, realizar a atualização
    if ($registro) {
        $atualizou = false;

        if ($nomeAtendente !== $registro->nm_atendente || $funcaoAtendente !== $registro->nm_funcao || $emailAtendente !== $registro->nm_email || $senhaAtendente !== $registro->cd_senha) {
            $query_update = "UPDATE tb_atendente SET nm_atendente='$nomeAtendente', nm_funcao = '$funcaoAtendente', nm_email='$emailAtendente', cd_senha = '$senhaAtendente' WHERE cd_atendente='$id'";
            $stmt_update = $conn->query($query_update);
            if ($stmt_update->rowCount() > 0) {
                $atualizou = true;
            }
        }

        if ($atualizou) {
<<<<<<< Updated upstream
            $response->getBody()->write('Atendente atualizado com sucesso! "' . $nome . '"');
        } else {
            $response->getBody()->write('Nenhum campo foi atualizado para o Atendente "' . $nome . '"');
=======
            $response->getBody()->write('Atendente atualizado com sucesso! "' . $nomeAtendente . '"');
        } else {
            $response->getBody()->write('Nenhum campo foi atualizado para o Atendente "' . $nomeAtendente . '"');
>>>>>>> Stashed changes
        }
    } else {
        $response->getBody()->write('Usuário não existe, para inserir vá para a rota Atendentes/salvar');
    }

    $db = null;
    return $response;
});

<<<<<<< Updated upstream
=======
//Criando uma ROTA para editar as informações de um atendente
$app->post('/clientes/editar', function (Request $request, Response $response) {

    //Corpo da Requisição - Body 
    $dados = $request->getParsedBody();

    $id               =  $dados["cd_cliente"];
    $nomeCliente      =  $dados["nm_cliente"];
    $nomeDepartamento =  $dados["nm_departamento"];
    $emailCliente     =  $dados["nm_email"];
    $senhaCliente     =  $dados["cd_senha"];
    $telefoneCliente  =  $dados["cd_telefone"];

    // Verificar se o registro já existe
    $query_select = "SELECT * FROM tb_cliente WHERE cd_cliente = '$id'";
    $db = new DB();
    $conn = $db->connect();
    $stmt_select = $conn->query($query_select);
    $registro = $stmt_select->fetch(PDO::FETCH_OBJ);

    // Registro já existe, realizar a atualização
    if ($registro) {
        $atualizou = false;

        if ($nomeCliente !== $registro->nm_cliente || $nomeDepartamento !== $registro->nm_departamento || $emailCliente !== $registro->nm_email || $senhaCliente !== $registro->cd_senha || $telefoneCliente !== $registro->cd_telefone) {
            $query_update = "UPDATE tb_cliente SET nm_cliente='$nomeCliente', nm_departamento = '$nomeDepartamento', nm_email='$emailCliente', cd_senha = '$senhaCliente', cd_telefone = '$telefoneCliente' WHERE cd_cliente='$id'";
            $stmt_update = $conn->query($query_update);
            if ($stmt_update->rowCount() > 0) {
                $atualizou = true;
            }
        }

        if ($atualizou) {
            $response->getBody()->write('Cliente atualizado com sucesso! "' . $nomeCliente . '"');
        } else {
            $response->getBody()->write('Nenhum campo foi atualizado para o cliente "' . $nomeCliente . '"');
        }
    } else {
        $response->getBody()->write('Usuário não existe, para inserir vá para a rota Clientes/salvar');
    }

    $db = null;
    return $response;
});

>>>>>>> Stashed changes
// Criando uma rota para editar situação do cliente
$app->post('/clientes/situacao', function (Request $request, Response $response) {

    //Corpo da Requisição - Body 
    $dados = $request->getParsedBody();
    $id = $dados["cd_cliente"];
<<<<<<< Updated upstream
    $statusCliente    =  $dados["st_cliente"];
=======
>>>>>>> Stashed changes

    // Verificar se o registro já existe
    $query_inativo = "SELECT st_cliente FROM tb_cliente WHERE cd_cliente = '$id'";

    $db = new DB();
    $conn = $db->connect();
    $stmt_inativo = $conn->query($query_inativo);
    $registroInativo = $stmt_inativo->fetch(PDO::FETCH_OBJ);

    if($registroInativo){
        $ativo = 1;
        $inativo = 0;
        if ($registroInativo->st_cliente == $inativo) {
        $update_ativo = "UPDATE tb_cliente SET st_cliente = $ativo where cd_cliente = '$id'";
        $stmt_update = $conn->query($update_ativo); 
    } else {
        $update_Inativo = "UPDATE tb_cliente SET st_cliente = $inativo where cd_cliente = '$id'";
        $stmt_update = $conn->query($update_Inativo); 
    }
      }
        $db = null;
        return $response;
    }
);

// Criando uma rota para editar situação do atendente
$app->post('/atendentes/situacao', function (Request $request, Response $response) {

    //Corpo da Requisição - Body 
    $dados = $request->getParsedBody();
    $id = $dados["cd_atendente"];
<<<<<<< Updated upstream
    $statusAtendente    =  $dados["st_atendente"];
=======
>>>>>>> Stashed changes

    // Verificar se o registro já existe
    $query_inativo = "SELECT st_atendente FROM tb_atendente WHERE cd_atendente = '$id'";

    $db = new DB();
    $conn = $db->connect();
    $stmt_inativo = $conn->query($query_inativo);
    $registroInativo = $stmt_inativo->fetch(PDO::FETCH_OBJ);

    if($registroInativo){
        $ativo = 1;
        $inativo = 0;
        if ($registroInativo->st_atendente == $inativo) {
        $update_ativo = "UPDATE tb_atendente SET st_atendente = $ativo where cd_atendente = '$id'";
        $stmt_update = $conn->query($update_ativo); 
    } else {
        $update_Inativo = "UPDATE tb_atendente SET st_atendente = $inativo where cd_atendente = '$id'";
        $stmt_update = $conn->query($update_Inativo); 
    }
      }
        $db = null;
        return $response;
    }
);

<<<<<<< Updated upstream
=======
// Rota para listar os tickets
$app->get('/tickets/listar', function (Request $request, Response $response) {
    $sql = "SELECT * FROM tb_ticket";
    try {
        $db = new DB();
        $conn = $db->connect();
        $stmt = $conn->query($sql);
        $tickets = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        $response->getBody()->write(json_encode($tickets));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus(200);
    } catch (PODException $e) {
        $error = array(
            "message" => $e->getMessage()
        );
    }

    $response->getBody()->write(json_encode($error));
    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(500);
});

// Rota para criar um novo ticket
$app->post('/tickets/salvar', function (Request $request, Response $response) {
    // Corpo da Requisição - Body 
    $dados = $request->getParsedBody();

    $dtTicketAbertura   = $dados["dt_ticket_abertura"];
    $dtTicketFechamento = $dados["dt_ticket_fechamento"];
    $dtAtendInicio      = $dados["dt_atend_inicio"];
    $dtAtendFinal       = $dados["dt_atend_final"];
    $qtAvaliacao        = $dados["qt_avaliacao"];
    $stTicket           = $dados["st_ticket"];
    $nvCriticidade      = $dados["nv_criticidade"];
    $dsTicket           = $dados["ds_ticket"];
    $nmTicket           = $dados["nm_ticket"];
    $cdAtendente        = $dados["cd_atendente"];
    $cdCliente          = $dados["cd_cliente"];

    // Verificar se o atendente existe
    $query_select_atendente = "SELECT * FROM tb_atendente WHERE cd_atendente = '$cdAtendente'";
    $db = new DB();
    $conn = $db->connect();
    $stmt_select_atendente = $conn->query($query_select_atendente);
    $atendente_existente = $stmt_select_atendente->fetch(PDO::FETCH_OBJ);

    // Verificar se o cliente existe
    $query_select_cliente = "SELECT * FROM tb_cliente WHERE cd_cliente = '$cdCliente'";
    $stmt_select_cliente = $conn->query($query_select_cliente);
    $cliente_existente = $stmt_select_cliente->fetch(PDO::FETCH_OBJ);

    if (!$atendente_existente || !$cliente_existente) {
        $response->getBody()->write('Erro ao salvar ticket! Atendente ou cliente não encontrado.');
    } else {
        // Registro não existe, realizar a inserção
        $query_insert = "INSERT INTO tb_ticket (dt_ticket_abertura, dt_ticket_fechamento, dt_atend_inicio, dt_atend_final, qt_avaliacao, st_ticket, nv_criticidade, ds_ticket, cd_atendente, cd_cliente, nm_ticket) VALUES ('$dtTicketAbertura', '$dtTicketFechamento', '$dtAtendInicio', '$dtAtendFinal', '$qtAvaliacao', '$stTicket', '$nvCriticidade', '$dsTicket', '$cdAtendente', '$cdCliente', '$nmTicket')";

        $stmt_insert = $conn->query($query_insert);

        // Verificar se a consulta foi bem-sucedida
        if ($stmt_insert) {
            $response->getBody()->write('Ticket criado com sucesso!');
        } else {
            $response->getBody()->write('Erro ao salvar ticket!');
        }
    }

    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});
>>>>>>> Stashed changes

$app->get('/info', function (Request $request, Response $response) {
    $response->getBody()->write('ELA v.1.0');
    return $response;
});

<<<<<<< Updated upstream
=======

// Rota para editar um ticket existente
$app->post('/tickets/editar', function (Request $request, Response $response) {

    // Corpo da Requisição - Body
    $dados = $request->getParsedBody();

    $id                 = $dados["cd_ticket"];
    $dtTicketAbertura   = $dados["dt_ticket_abertura"];
    $dtTicketFechamento = $dados["dt_ticket_fechamento"];
    $dtAtendInicio      = $dados["dt_atend_inicio"];
    $dtAtendFinal       = $dados["dt_atend_final"];
    $qtAvaliacao        = $dados["qt_avaliacao"];
    $stTicket           = $dados["st_ticket"];
    $nvCriticidade      = $dados["nv_criticidade"];
    $dsTicket           = $dados["ds_ticket"];
    $cdAtendente        = $dados["cd_atendente"];
    $cdCliente          = $dados["cd_cliente"];

    // Verificar se o ticket existe
    $query_select_ticket = "SELECT * FROM tb_ticket WHERE cd_ticket = '$id'";
    $db = new DB();
    $conn = $db->connect();
    $stmt_select_ticket = $conn->query($query_select_ticket);
    $ticket_existente = $stmt_select_ticket->fetch(PDO::FETCH_OBJ);

    if (!$ticket_existente) {
        $response->getBody()->write('Erro ao editar ticket! Ticket não encontrado.');
    } else {
        // Ticket existe, realizar a atualização
        $query_update = "UPDATE tb_ticket SET
            dt_ticket_abertura = '$dtTicketAbertura',
            dt_ticket_fechamento = '$dtTicketFechamento',
            dt_atend_inicio = '$dtAtendInicio',
            dt_atend_final = '$dtAtendFinal',
            qt_avaliacao = '$qtAvaliacao',
            st_ticket = '$stTicket',
            nv_criticidade = '$nvCriticidade',
            ds_ticket = '$dsTicket',
            cd_atendente = '$cdAtendente',
            cd_cliente = '$cdCliente'
            WHERE cd_ticket = '$id'";

        $stmt_update = $conn->query($query_update);

        // Verificar se a consulta foi bem-sucedida
        if ($stmt_update) {
            $response->getBody()->write('Ticket editado com sucesso!');
        } else {
            $response->getBody()->write('Erro ao editar ticket!');
        }
    }

    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});


// Rota para alterar o status de um ticket
$app->post('/tickets/alterar-status', function (Request $request, Response $response, $args) {

    // Corpo da Requisição - Body
    $dados = $request->getParsedBody();

    $id     = $dados["cd_ticket"]; // ID do ticket a ser alterado
    $status = $dados["st_ticket"]; // Novo status do ticket

    // Verificar se o ticket existe
    $query_select_ticket = "SELECT * FROM tb_ticket WHERE cd_ticket = '$id'";
    $db = new DB();
    $conn = $db->connect();
    $stmt_select_ticket = $conn->query($query_select_ticket);
    $ticket_existente = $stmt_select_ticket->fetch(PDO::FETCH_OBJ);

    if (!$ticket_existente) {
        $response->getBody()->write('Erro ao alterar status do ticket! Ticket não encontrado.');
    } else {
        // Ticket existe, realizar a atualização do status
        $query_update = "UPDATE tb_ticket SET st_ticket = '$status' WHERE cd_ticket = '$id'";
        $stmt_update = $conn->query($query_update);

        // Verificar se a consulta foi bem-sucedida
        if ($stmt_update) {
            $response->getBody()->write('Status do ticket alterado com sucesso!');
        } else {
            $response->getBody()->write('Erro ao alterar status do ticket!');
        }
    }

    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});


// Rota para adicionar um comentário a um ticket
$app->post('/tickets/comentarios/adicionar', function (Request $request, Response $response) {
    // Corpo da Requisição - Body
    $dados = $request->getParsedBody();

    $comentario = $dados["ds_comentario"];     // Comentário
    $atendente = $dados["cd_atendente"];       // ID do atendente
    $cliente = $dados["cd_cliente"];           // ID do cliente
    $dataComentario = $dados["dt_comentario"];     // Data do comentário
    $ticket = $dados["cd_ticket"];             // ID do ticket

    // Verificar se o ticket existe
    $db = new DB();
    $conn = $db->connect();

    $query_check_ticket = "SELECT * FROM tb_ticket WHERE cd_ticket = '$ticket'";
    $stmt_check_ticket = $conn->query($query_check_ticket);

    if ($stmt_check_ticket->rowCount() === 0) {
        // O ticket não existe
        $response->getBody()->write('Ticket não encontrado!');
        return $response->withStatus(404);
    }

    // Inserir o comentário na tabela tb_comentario
    $query_insert = "INSERT INTO tb_comentario (ds_comentario, cd_atendente, cd_cliente, dt_comentario, cd_ticket)
                     VALUES ('$comentario', '$atendente', '$cliente', '$dataComentario', '$ticket')";

    $stmt_insert = $conn->query($query_insert);

    // Verificar se a consulta foi bem-sucedida
    if ($stmt_insert) {
        $response->getBody()->write('Comentário adicionado com sucesso!');
    } else {
        $response->getBody()->write('Erro ao adicionar comentário!');
    }

    return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
});

$app->post('/tickets/comentarios/listar', function (Request $request, Response $response, $args) {

    $dados = $request->getParsedBody();

    // Consultar os comentários relacionados ao ticket
    $db = new DB();
    $conn = $db->connect();

    $ticketId = $dados["cd_ticket"];  

    $query = "SELECT * FROM tb_comentario WHERE cd_ticket = '$ticketId'";
    $stmt = $conn->query($query);
    $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($comentarios) > 0) {
        // Comentários encontrados
        $response->getBody()->write(json_encode($comentarios));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    } else {
        // Nenhum comentário encontrado
        $response->getBody()->write('Nenhum comentário encontrado para o ticket especificado.');
        return $response->withStatus(404);
    }
});

$app->post('/tickets/comentarios/apagar', function (Request $request, Response $response) {

    //Corpo da Requisição - Body 
    $dados = $request->getParsedBody();
    $id = $dados["cd_comentario"];

    // Verificar se o registro já existe
    $query_inativo = "SELECT * FROM tb_comentario WHERE cd_comentario = '$id'";

    $db = new DB();
    $conn = $db->connect();
    $stmt_inativo = $conn->query($query_inativo);
    $registroInativo = $stmt_inativo->fetch(PDO::FETCH_OBJ);

    if($registroInativo){
        
        $update_ativo = "DELETE FROM tb_comentario WHERE cd_comentario = '$id'";
        $stmt_update = $conn->query($update_ativo); 
        $response->getBody()->write('Comentário excluído com sucesso!');
        return $response->withStatus(200);
    } else {
        $response->getBody()->write('Erro ao excluir o comentário!');
        return $response->withStatus(500);
    }
        $db = null;
        return $response;
    }
);

>>>>>>> Stashed changes
$app->run();

// cd\projetos\ultra-api 

// php -S localhost:8888 -t public 

//http://localhost:8888/

//http://localhost:8888/info