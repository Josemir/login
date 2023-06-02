<!-- cadastroView.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Cadastro</title>
</head>
<body>
    <h2>Formulário de Cadastro</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('cadastroController/cadastrar'); ?>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br>

        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <?php echo anchor('loginController/autenticar','Voltar');
 ?>
</body>
</html>
