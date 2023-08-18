<div class="container">
    <h2>Activaci&oacute;n de Cuenta</h2>
    <br>
    <p><h1>Cuenta Activada Correctamente!</h1></p>

    <a href="{$_layoutParams.root}">Ir a Inicio</a>

    {if !Session::get('autenticado')}

            | <a href="{$_layoutParams.root}usuario/login">Iniciar Sesi&oacute;n</a>

    {/if}
</div>