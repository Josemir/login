<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Produto</title>
</head>
<body>
    <h1>Criar Produto</h1>
    
    <?php echo form_open('loginController/store'); ?>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required></textarea>
        
        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" required>
        
        <label for="data">Data:</label>
        <input type="date" name="data" id="data" required>
        
        <input type="submit" value="Criar">
    <?php echo form_close(); ?>
</body>
</html>
