<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuario conectado</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <h2>Produtos cadastrados no sistema</h2>
    <h3>Ae, conseguiu acesso \o/</h3>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Data</th>
            <!-- apresentada em inglês-->
            <th>Ações</th>
        </tr>
        
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?php echo $produto->id; ?></td>
                <td><?php echo $produto->nome; ?></td>
                <td><?php echo $produto->descricao; ?></td>
                <td><?php echo $produto->preco; ?></td>
                <td><?php echo $produto->data; ?></td>
                <!-- edit funcionando-->
                <td>
                    <a href="<?php echo base_url('index.php/loginController/edit/'.$produto->id); ?>">Edit</a>
            
            
                    <a href="<?php echo base_url('index.php/loginController/delete/'.$produto->id); ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <!-- outra alternativa-->
    <table>
        <th>
    <a href="<?php echo base_url('index.php/loginController/autenticar'); ?>">Sair</a>
    </th>
    <th></th>

    <a href="<?php echo base_url('index.php/loginController/create'); ?>">Criar item</a>

    <th></th>
    <th>
        <?php echo anchor('/', 'Página inicial'); ?>
    
    </th>
    </table>
</body>
</html>
