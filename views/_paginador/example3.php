<?php if(isset($this->_paginacion)): ?>
<div class="col-lg-12" style="text-align: center;">
    <ul class="pagination  pagination-sm" style="text-align: center;">
<?php if($this->_paginacion['primero']): ?>
	
        <li><a href="javascript:void(0);" onclick="getPaginacion(<?php echo $this->_paginacion['primero']; ?>, 3);">&Lt;</a></li>
	
<?php else: ?>
	
        <li class="disabled"><span>&Lt;</span></li>

<?php endif; ?>

<?php if($this->_paginacion['anterior']): ?>
	
	<li><a href="javascript:void(0);" onclick="getPaginacion(<?php echo $this->_paginacion['anterior']; ?>, 3);">&lt;</a></li>
	
<?php else: ?>
	
	<li class="disabled"><span>&lt;</span></li>

<?php endif; ?>


<!-- -------- paginas ---------------- -->

<?php for($i = 0; $i < count($this->_paginacion['rango']); $i++): ?>
	
	<?php if($this->_paginacion['actual'] == $this->_paginacion['rango'][$i]): ?>
	
		<li class="active"><span><?php echo $this->_paginacion['rango'][$i]; ?></span></li>
	
	<?php else: ?>
                <li>
		<a href="javascript:void(0);" onclick="getPaginacion(<?php echo $this->_paginacion['rango'][$i]; ?>, 3);">
			<?php echo $this->_paginacion['rango'][$i]; ?>
		</a>&nbsp;
                </li>
	<?php endif; ?>
	
<?php endfor; ?>

        

<!-- -------- siguiente y ultimo ---------------- -->

<?php if($this->_paginacion['siguiente']): ?>
	
    <li><a href="javascript:void(0);" onclick="getPaginacion(<?php echo $this->_paginacion['siguiente']; ?>, 3);">&gt;</a></li>
	
<?php else: ?>
	
	<li class="disabled"><span>&gt;</span></li>

<?php endif; ?>


<?php if($this->_paginacion['ultimo']): ?>
	
    <li><a href="javascript:void(0);" onclick="getPaginacion(<?php echo $this->_paginacion['ultimo']; ?>, 3)">&Gt;</a></li>
	
<?php else: ?>
	
	<li class="disabled"><span>&Gt;</span></li>

<?php endif; ?>
    </ul>
</div>
<?php endif; ?>