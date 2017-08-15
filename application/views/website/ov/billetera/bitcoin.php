
			<!-- MAIN CONTENT -->
			<div id="content">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<h1 class="page-title txt-color-blueDark">
							<a class="backHome" href="/bo"><i class="fa fa-home"></i> Menu</a>
							<span>
							<a href="/ov/billetera2/index"> > Billetera</a>
							 > Pedir Plata</span>
							
						</h1>
					</div>
				</div>
				<!-- row -->
				<div class="row">

					
				</div>
				<!-- end row -->

				<!-- row -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="well">

							<section id="widget-grid" class="">
							
								<!-- row -->
								<div class="row">
							
									<!-- NEW WIDGET START -->
									<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

										<!-- Widget ID (each widget will need unique ID)-->
										<div class="jarviswidget jarviswidget-color-purity" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="true">
											<!-- widget options:
											usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
							
											data-widget-colorbutton="false"
											data-widget-editbutton="false"
											data-widget-togglebutton="false"
											data-widget-deletebutton="false"
											data-widget-fullscreenbutton="false"
											data-widget-custombutton="false"
											data-widget-collapsed="true"
											data-widget-sortable="false"
							
											-->
																							<!-- widget content -->
												<div class="widget-body" style="padding : 0;">
													<div id="myTabContent1" class="col-md-6 tab-content ">
													
													<div class="table-responsive">
													<table class="table">
													<thead>
														<tr>
															<th> <i class="fa fa-sitemap"></i> Red</th>
															<th> <i class="fa fa-money"></i> Comision</th>
														</tr>
													</thead>
													<tbody>
												<?php 
													$total = 0; 
													$i = 0;
													$total_transact = 0;
//var_dump($comision_todo);
													
													for ($i = 0 ; $i<sizeof($comision_todo["redes"]);$i++){
														
														$totales = (intval($comision_todo["ganancias"][$i][0]->valor)<>0||sizeof($comision_todo["bonos"][$i])<>0) ? 0 : 'FAIL';													
														
														//echo $totales."|";
														
														if($totales!=='FAIL'){
															echo '<tr class="success" >
																<td colspan="2"><b>'.$comision_todo["redes"][$i]->nombre.'</b></td>
															</tr>';
														}
														
														
														if($comision_todo["ganancias"][$i][0]->valor<>0){
															echo '<tr class="success" >
																<td colspan="2"><i class="fa fa-money"></i>Comisiones</td>
															</tr>';
														
															echo '<tr class="success">
															<td>&nbsp;&nbsp;Comisiones Directas</td>
																<td>$ '.number_format($comision_todo["directos"][$i][0]->valor,2).'</td>
															</tr>';
														
															echo '<tr class="success">
															<td>&nbsp;&nbsp;Comisiones Indirectas</td>
																<td>$ '.number_format($comision_todo["ganancias"][$i][0]->valor - $comision_todo["directos"][$i][0]->valor,2).'</td>
															</tr>';
														
															if($comision_todo["ganancias"][$i][0]->valor){
																$totales += ($comision_todo["ganancias"][$i][0]->valor);
															}
														
															
														}
														
														if($comision_todo["bonos"][$i]){
															echo '<tr class="success" >
																<td colspan="2"><i class="fa fa-gift"></i>Bonos</td>
															</tr>';
															for ($k=0;$k<sizeof($comision_todo["bonos"][$i]);$k++){
																if($comision_todo["bonos"][$i][$k]->valor<>0){
																	$totales += ($comision_todo["bonos"][$i][$k]->valor);
																	echo '<tr class="success">
																<td>&nbsp;&nbsp;'.$comision_todo["bonos"][$i][$k]->nombre.'</td>
																	<td>$ '.number_format($comision_todo["bonos"][$i][$k]->valor,2).'</td>
																</tr>';
																}
															}
														}
														
														if($totales<>0){
															echo '<tr class="warning">
																<td>&nbsp; Total </td>
																<td>$ '.number_format($totales,2).'</td>
															</tr>';
															$total += ($totales);
														}
														
													}

													?>  
													<tr class="success">
														<td><h4><b>TOTAL</b></h4></td>
														<td>
														<div class="col-md-4">
															<h4><b>$ <?php echo number_format($total,2);?></b></h4>
														</div>
														<?php if($total !== 0){?>
														<div class="col-md-1">
															<a title='Ver detalles' style='cursor: pointer;' class='txt-color-green' onclick='ventas(<?=$id?>);'>
																<i class='fa fa-eye fa-3x'></i>
															</a>
														</div>		
														<?php }?>																										
														</td>
													</tr>
													
													<?php if ($transaction) { ?>	
														<tr class="warning">
															<td colspan="2"><b>TRANSACCIONES EMPRESA</b></td>
														</tr>
													<?php if ($transaction['add']) {
															$total_transact+=$transaction['add'];
														?>
														<tr class="warning">
															<td ><b>Total Agregado</b></td>
															<td ><b style="color: green">$ <?php echo number_format($transaction['add'],2);?></b></td>
														</tr>
													<?php } 
													if ($transaction['sub']) {
														$total_transact-=$transaction['sub'];
														?>
														<tr class="warning" >
															<td ><b>Total Quitado</b></td>
															<td ><b style="color: red">$ <?php echo number_format($transaction['sub'],2);?></b></td>
														</tr>
													<?php } ?>
														<tr class="warning">
															<td ><b>TOTAL:</b></td>
															<td ><h4><b >$ <?php echo number_format($total_transact,2);?></b></h4></td>
														</tr>
													<?php	} ?>
													
													</tbody>
													</table>
														
													</div>

													
															<table id="dt_basic" class="table table-striped table-bordered table-hover">
																
																	<?php 
																	$retenciones_total=0;
																	foreach ($retenciones as $retencion) {?>
																	<tr class="danger">
																		<td><b>Retencion por <?php echo $retencion['descripcion']; ?></b></b></td>
																		<td></td>
																		<td>$ <?php 
																		$retenciones_total+=$retencion['valor'];
																		echo number_format($retencion['valor'],2); ?></td>
																	</tr>
																	<?php $total;
																	} ?>
																
																	<tr class="danger">
																		<td><b>Cobros Pendientes</b></td>
																		<td></td>
																		<td>$ <?php 
																		if($cobroPendientes==null)
																			echo "0";
																		else
																			echo number_format($cobroPendientes,2);
																		?></td> 
																	</tr>
																
																	<?php foreach ($cobro as $cobros){
																	?>
																	<tr class="danger">
																		<td><b>Cobros Pagos</b></td>
																		<td></td>
																		<td>$ 
																		<?php 
																		if($cobros->monto==null){
																		  echo '0';
																		  $cobro=0;
																		}
																		else {
																		  echo number_format($cobros->monto,2);
																		  $cobro=$cobros->monto;
																		}
																		?></td>
																	</tr>
																	<?php 
																	}?>
																	<tr class="info">
																		<td><h4><b>Saldo Neto</b></h4>
																		<td></td>
																		<td><h4><b>
																		$ 
																		<?php 
																		$saldo_neto=($total-($cobro+$retenciones_total+$cobroPendientes)+($total_transact));
																		if($saldo_neto<0)
																			echo 0;
																		else
																			echo number_format($saldo_neto,2)
																		?></b></h4></td>
																	</tr>
																</table>
														
													</div>
													
													
													<div id="myTabContent2" class="col-md-6 tab-content ">
													
													<legend> Indicador de Progreso </legend>
													
    													<?php if(!$bitcoin){?>
													
														<div class="row well" style="border: none">													
    														<div class="label label-default" style="font-size: 2rem;width: <?=$bitcoin["membresia"]["rango"];?>% !important; display:block;">
    													 		
    														</div>		
    														<div class="pull-left">MEMBRESIA </div>		
    														<div class="pull-right"> <strong><i class="fa fa-times"></i>  |  Por Renovar </strong> </div>													
    													</div>												
    													
    													
													
														<?php }else{?>
														
														<div class="row well" style="border: none">													
    														<div class="label label-success" style="font-size: 2rem;width: 100% !important; display:block;">
    													 		
    														</div>		
    														<div class="pull-left">MEMBRESIA </div>		
    														<div class="pull-right"> <?=$bitcoin["membresia"]["nombre"];?> | <strong> <?=$bitcoin["membresia"]["costo"];?> <i class="fa fa-bitcoin"></i> </strong> </div>													
    													</div>												
    													
    													<div class="row well" style="border: none">													
    														<div class="label label-warning" style="font-size: 2rem;width: <?=$bitcoin["compensacion"]["rango"];?>% !important; display:block;">
    													 		 
    														</div>		
    														<div class="pull-left">COMPENSACION</div>		
    														<div class="pull-right"> <i class="fa fa-exclamation-circle "> |  </i> <strong>lleva <?=$bitcoin["compensacion"]["valor"];?>% </strong></div>											
    													</div>
    													<?php 
    													
    													   $percent = $bitcoin["duplicado"]["rango"];
    													   $valor = $bitcoin["duplicado"]["valor"];
    													   $label = "danger";
    													   $duplica = " No ha cubierto la membresia";
    													   if($percent==0){
    													       $percent = 100;
    													       $label = "default";
    													   }else if($valor==0){
    													       $duplica = "Completado";
														   }else{
    													       $duplica = "Falta ".$valor."%";
    													   }
    													   
    													?>
    													<div class="row well" style="border: none">													
    														<div class="label label-<?=$label?>" style="font-size: 2rem;width: <?=$percent?>% !important; display:block;">
    													 		
    														</div>		
    														<div class="pull-left">DUPLICAR </div>		
    														<div class="pull-right"><i class="fa fa-exclamation-triangle"> |  </i> <strong> <?=$duplica?> </strong> </div>		
    																									
    													</div>
    													
    													<?php } ?>
																											
													</div>	

													
												</div>
							

											<!-- end widget div -->
										</div>
										<!-- end widget -->
							
									</article>
								</div>
							</section>
						<!-- end widget grid -->
						</div>
					</div>
				<!-- row -->
				</div>
				<div class="row">
			        <div class="col-sm-12">
			            <br />
			            <br />
			        </div>
		        </div>
				<!-- end row -->

			</div>
			<!-- END MAIN CONTENT -->

		<!-- PAGE RELATED PLUGIN(S) 
		<!-- Morris Chart Dependencies -->
		<script src="/template/js/plugin/morris/raphael.min.js"></script>
		<script src="/template/js/plugin/morris/morris.min.js"></script>

		<script src="/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

		<script type="text/javascript">
			// PAGE RELATED SCRIPTS

			/*
			 * Run all morris chart on this page
			 */
			$(document).ready(function() {
				
				// DO NOT REMOVE : GLOBAL FUNCTIONS!
				pageSetUp();

				$("#cobro").keyup(CalcularSaldo);
				$('#enviar').attr("disabled", true);
					});

			//setup_flots();
			/* end flot charts */
			
function CalcularSaldo(evt){
				
				var saldo = <?=$saldo_neto?> /*$("#saldo").val()+ (String.fromCharCode(evt.charCode)*/;
				var pago = $("#cobro").val() ;
				var neto = saldo-pago;
				$("#neto").val(neto);
				if(neto > 0){
					$('#enviar').attr("disabled", false);
					}else{
						$('#enviar').attr("disabled", true);
					}
			}

function ventas(id){
	$.ajax({
		type: "POST",
		url: "/ov/billetera2/ventas_comision",
		data: {id: id}
	})
	.done(function( msg )
	{					
		bootbox.dialog({
			message: msg,
			title: 'Detalles de la Comisiones',
			buttons: {
				danger: {
					label: "Cerrar",
					className: "btn-danger",
					callback: function() {

						}
			}
		}})//fin done ajax
	});//Fin callback bootbox
}

function cobrar() {

	if(validarCampos()){
	$.ajax({
		type: "POST",
		url: "/auth/show_dialog",
		data: {message: '¿ Esta seguro que desea Pedir el pago con los datos que se acabaron de ingresar ?'},
	})
	.done(function( msg )
	{
		
		bootbox.dialog({
		message: msg,
		title: 'Transacion',
		buttons: {
			success: {
			label: "Aceptar",
			className: "btn-success",
			callback: function() {
					iniciarSpinner();
					$.ajax({
						type: "POST",
						url: "/ov/billetera2/cobrar",
						data: $('#contact-form1').serialize()
					})
					.done(function( msg )
					{
						FinalizarSpinner();
						bootbox.dialog({
						message: msg,
						title: '',
						buttons: {
							success: {
							label: "Aceptar",
							className: "btn-success",
							callback: function() {
								location.href='historial';
								}
							}
						}
					})//fin done ajax
					});//Fin callback bootbox

				}
			},
				danger: {
				label: "Cancelar!",
				className: "btn-danger",
				callback: function() {

					}
			}
		}
	})
	});
	}else {
		alert("Los datos de la cuenta o el cobro estan incompletos o erroneos");
	}
}
function validarCampos(){

	if($('#cobro').val()<=0)
		return false;
	
	if($('#ctitular').val()=="")
		return false;
			
	if($('#ncuenta').val()=="")
		return false;
	
	if($('#cbanco').val()=="")
		return false;

	return true;
}
	</script>
