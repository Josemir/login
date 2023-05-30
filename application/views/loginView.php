<?php echo form_open('loginController/autenticar'); ?>

<h1 style="display: flex; justify-content: left;">PORTAL DO USUÁRIO</h1>

    <label for="username">Nome de usuário:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Senha:</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" value="Entrar">
<?php echo form_close(); ?>
<a href="<?php echo ('registration/'); ?>">cadastrar</a>


