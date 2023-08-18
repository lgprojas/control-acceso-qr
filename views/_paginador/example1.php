<?php if(isset($this->_paginacion)): ?>
<nav aria-label=""  style="display: flex;justify-content: center;">
    <ul class="pagination" style="">
<?php if($this->_paginacion['primero']): ?>
	
        <li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="getPaginacion(<?php echo $this->_paginacion['primero']; ?>, 1);">&Lt;</a></li>
	
<?php else: ?>
	
        <li class="page-item disabled"><span class="page-link">&Lt;</span></li>

<?php endif; ?>

<?php if($this->_paginacion['anterior']): ?>
	
	<li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="getPaginacion(<?php echo $this->_paginacion['anterior']; ?>, 1);">&lt;</a></li>
	
<?php else: ?>
	
	<li class="page-item disabled"><span class="page-link">&lt;</span></li>

<?php endif; ?>


<!-- -------- paginas ---------------- -->

<?php for($i = 0; $i < count($this->_paginacion['rango']); $i++): ?>
	
	<?php if($this->_paginacion['actual'] == $this->_paginacion['rango'][$i]): ?>
	
		<li class="page-item active"><span class="page-link"><?php echo $this->_paginacion['rango'][$i]; ?></span></li>
	
	<?php else: ?>
                <li class="page-item">
		<a class="page-link" href="javascript:void(0);" onclick="getPaginacion(<?php echo $this->_paginacion['rango'][$i]; ?>, 1);">
			<?php echo $this->_paginacion['rango'][$i]; ?>
		</a>&nbsp;
                </li>
	<?php endif; ?>
	
<?php endfor; ?>

        

<!-- -------- siguiente y ultimo ---------------- -->

<?php if($this->_paginacion['siguiente']): ?>
	
    <li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="getPaginacion(<?php echo $this->_paginacion['siguiente']; ?>, 1);">&gt;</a></li>
	
<?php else: ?>
	
	<li class="page-item disabled"><span class="page-link">&gt;</span></li>

<?php endif; ?>


<?php if($this->_paginacion['ultimo']): ?>
	
    <li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="getPaginacion(<?php echo $this->_paginacion['ultimo']; ?>, 1)">&Gt;</a></li>
	
<?php else: ?>
	
	<li class="page-item disabled"><span class="page-link">&Gt;</span></li>

<?php endif; ?>
    </ul>
</nav>
<?php endif; ?>