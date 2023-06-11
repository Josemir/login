<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<!-- http://[::1]/login/index.php/loginController/autenticar-->
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
        </tr>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?php echo $produto->id; ?></td>
                <td><?php echo $produto->nome; ?></td>
                <td><?php echo $produto->descricao; ?></td>
                <td><?php echo $produto->preco; ?></td>
                <td><?php echo $produto->data; ?></td>
            <td>
        <a href="">
            Edit
        </a>
                </td>
                <td>
            <a href="">
            Delete    
            </a> 
                </td>
                
            </tr>
    <!-- <tr> Representa uma linha na tabela. -->
    <!-- <th> define cabeçalho. -->
    <!-- <td> representa uma celula. -->
        <?php endforeach; ?>
    </table>
    <a href="<?php echo ('autenticar'); ?>">Logout</a>
    
</body>
</html>
