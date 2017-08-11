<?php

if (isset($banco[0]->id_banco)) {
    ?><div class="jumbotron">
	<h1>Felicitaciones!</h1>
	<p>La transacción ha finalizado con éxito.</p>
	<p class="text-danger">
		Para terminar tu compra debes enviar un correo electrónico con el
		comprobante de pago al departamento de Pagos(<b><?=$emailPagos[0]->email?></b>)
	</p>
	<p></p>
	<div class="alert alert-success alert-block">
		<p>
			<b>Nombre de Banco</b> : <?=$banco[0]->descripcion?></p>
		<p>
			<b>Numero de Cuenta</b>: <?=$banco[0]->cuenta?></p>
			<?php
    
    if ($banco[0]->swift) {
        ?>
				<p>
			<b>SWIFT</b> :<?=$banco[0]->swift?></p>
				<?php
    }
    if ($banco[0]->otro) {
        ?>
				<p>
			<b>Titular</b> :<?=$banco[0]->otro?></p>
				<?php
    }
    if ($banco[0]->dir_postal) {
        ?>
				<p>
			<b>Dirección postal</b>  :<?=$banco[0]->dir_postal?></p>
				<?php
    }
    if ($banco[0]->clave) {
        ?>
				<p>
			<b>CLABE</b> :<?=$banco[0]->clave?></p>
				<?php
    }
    ?><p></p>
	</div><?php
} ?>