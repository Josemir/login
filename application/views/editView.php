<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto</h1>
    
    <?php echo form_open('loginController/update/'.$produto->id); ?>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $produto->nome; ?>" required>
        
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required><?php echo $produto->descricao; ?></textarea>
        
        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" value="<?php echo $produto->preco; ?>" required>
        
        <label for="data">Data:</label>
        <input type="date" name="data" id="data" value="<?php echo $produto->data; ?>" required>
        
        <input type="submit" value="Atualizar">
    <?php echo form_close(); ?>
</body>
</html>
