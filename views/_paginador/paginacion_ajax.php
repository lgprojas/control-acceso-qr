<?php if(isset($this->_paginacion)): ?>

<div aria-label=""  style="display: flex;justify-content: center;">
    <ul class="pagination">
        <?php if($this->_paginacion['primero']): ?>

        <li class="page-item"><a class="pagina page-link" pagina="<?php echo $link . $this->_paginacion['primero']; ?>" href="javascript:void(0);">&Lt;</a></li>

        <?php else: ?>

            <li class="disabled page-item"><span class="page-link">&Lt;</span></li>

        <?php endif; ?>

        <?php if($this->_paginacion['anterior']): ?>

            <li class="page-item"><a class="pagina page-link" pagina="<?php echo $link . $this->_paginacion['anterior']; ?>" href="javascript:void(0);">&lt;</a></li>

        <?php else: ?>

            <li class="disabled page-item"><span class="page-link">&lt;</span></li>

        <?php endif; ?>

        <?php for($i = 0; $i < count($this->_paginacion['rango']); $i++): ?>

            <?php if($this->_paginacion['actual'] == $this->_paginacion['rango'][$i]): ?>

                <li class="active page-item"><span class="page-link"><?php echo $this->_paginacion['rango'][$i]; ?></span></li>

            <?php else: ?>

                <li class="page-item">
                    <a class="pagina page-link" pagina="<?php echo $link . $this->_paginacion['rango'][$i]; ?>" href="javascript:void(0);">
                        <?php echo $this->_paginacion['rango'][$i]; ?>
                    </a>
                </li>

            <?php endif; ?>

        <?php endfor; ?>

        <?php if($this->_paginacion['siguiente']): ?>

            <li class="page-item"><a class="pagina page-link" pagina="<?php echo $link . $this->_paginacion['siguiente']; ?>" href="javascript:void(0);">&gt;</a></li>

        <?php else: ?>

            <li class="disabled page-item"><span class="page-link">&gt;</span></li>

        <?php endif; ?>

        <?php if($this->_paginacion['ultimo']): ?>

            <li class="page-item"><a class="pagina page-link" pagina="<?php echo $link . $this->_paginacion['ultimo']; ?>" href="javascript:void(0);">&Gt;</a></li>

        <?php else: ?>

            <li class="disabled page-item"><span class="page-link">&Gt;</span></li>

        <?php endif; ?>
    </ul>
</div>

<?php endif; ?>
