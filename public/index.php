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
        $query_insert = "INSERT INTO tb_atendente (nm_atendente, nm_funcao, nm_email, cd_senha) VALUES ('$nomeAtendente', '$funcaoAtendente', '$emailAtendente', '$senhaAtendente')";

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
        $query_insert = "INSERT INTO tb_cliente (nm_cliente, nm_email, cd_senha, nm_departamento, cd_telefone) VALUES ('$nomeCliente', '$emailCliente', '$senhaCliente', '$nomeDepartamento', '$telefoneCliente')";

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
            $response->getBody()->write('Atendente atualizado com sucesso! "' . $nome . '"');
        } else {
            $response->getBody()->write('Nenhum campo foi atualizado para o Atendente "' . $nome . '"');
        }
    } else {
        $response->getBody()->write('Usuário não existe, para inserir vá para a rota Atendentes/salvar');
    }

    $db = null;
    return $response;
});

// Criando uma rota para editar situação do cliente
$app->post('/clientes/situacao', function (Request $request, Response $response) {

    //Corpo da Requisição - Body 
    $dados = $request->getParsedBody();
    $id = $dados["cd_cliente"];
    $statusCliente    =  $dados["st_cliente"];

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
    $statusAtendente    =  $dados["st_atendente"];

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


$app->get('/info', function (Request $request, Response $response) {
    $response->getBody()->write('ELA v.1.0');
    return $response;
});

$app->run();

// cd\projetos\ultra-api 

// php -S localhost:8888 -t public 

//http://localhost:8888/

//http://localhost:8888/info