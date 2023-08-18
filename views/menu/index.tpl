<h3>Ejemplo menu</h3>
<div class="">						
        <ul class="nav">
           {foreach item=it from=$menu}
               <li class="dropdown">
                   <a  href="{$it.enlace}"><i class="{$it.imagen}"> </i>{$it.titulo}</a>
                </li>
           {/foreach}
              
        </ul>
</div>