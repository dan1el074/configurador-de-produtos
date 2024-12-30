<section class="login">
    <a href="home"><p class="home"><img src="<?= INCLUDE_PATH_FULL ?>assets/images/arrow.svg">Voltar para home</p></a>
    <div class="container" id="container">
        <div class="form-container sign-up-container mobile">
            <form method="POST"> 
                <h1>Solicitar Acesso</h1>
                
                <input type="text" placeholder="Nome" name="nomeAcesso" required />
                <input type="email" placeholder="Email" name="emailAcesso" required />
                <button class="space" name="requisicao">Solicitar</button>
            </form>
        </div>
        
        <div class="form-container sign-in-container">
            <form method="POST">
                <h1>Acessar Conta</h1>
                <input type="text" name="user" placeholder="Usuário" class="<?= $atributes['login'] ? "error" : "" ?>" value="<?= isset($_POST['user']) ? $_POST['user'] : "" ?>" required />
                <input type="password" name="password" placeholder="Senha" class="<?= $atributes['login'] ? "error" : "" ?>" required />
                <div class="erro-senha"><span><?= $atributes['login'] ? "Usuário ou senha incorretos!" : "" ?></span></div>
                <span>Esqueceu sua senha?</span>
                <button name="action">Entrar</button>
            </form>
        </div>
        <div class="overlay-container mobile">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <a href="home"><img src="<?= INCLUDE_PATH_FULL ?>assets/images/logo-metaro-full-white.svg" class="img-logo"></a>
                    <p>Já tem uma conta? Clique aqui em baixo para acessa-la.</p>
                    <button class="ghost" id="signIn">Entrar</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <a href="home"><img src="<?= INCLUDE_PATH_FULL ?>assets/images/logo-metaro-full-white.svg" class="img-logo"></a>
                    <p>Ainda não tem uma conta? Clique aqui em baixo para solicitar um acesso.</p>
                    <button class="ghost" id="signUp">Inscrever-se</button>
                </div>
            </div>
        </div>
    </div>
</section>
