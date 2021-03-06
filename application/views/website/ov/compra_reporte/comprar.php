<link href="/cart/HTML/assets/css/style.css" rel="stylesheet">
<link href="/cart/HTML/assets/css/skin-3.css" rel="stylesheet">

<!-- css3 animation effect for this template -->
<link href="/cart/HTML/assets/css/animate.min.css" rel="stylesheet">

<!-- styles needed by carousel slider -->
<link href="/cart/HTML/assets/css/owl.carousel.css" rel="stylesheet">
<link href="/cart/HTML/assets/css/owl.theme.css" rel="stylesheet">

<!-- styles needed by checkRadio -->
<link href="/cart/HTML/assets/css/ion.checkRadio.css" rel="stylesheet">
<link href="/cart/HTML/assets/css/ion.checkRadio.cloudy.css"
	rel="stylesheet">

<!-- styles needed by mCustomScrollbar -->
<link href="/cart/HTML/assets/css/jquery.mCustomScrollbar.css"
	rel="stylesheet">
<div id="content" class="container main-container"
	style="background-color: #fff; min-height: auto ! important; padding-top: 5rem; padding-bottom: 10rem;">
	<div class="navbar navbar-tshop navbar-fixed-top megamenu"
		role="navigation" id="cart_cont"
		style="background: #2980b9 ! important;">
		<div class="navbar-header">
			<a style="color: #fff; margin-left: 4rem;"
				class="navbar-brand titulo_carrito" href="/ov/compras/carrito"> <i
				class="fa fa-arrow-circle-left"></i> Atras &nbsp;
			</a>

			<!-- this part for mobile -
      <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
        <div class="input-group">
          <button class="btn btn-nobg getFullSearch" type="button"> <i class="fa fa-search"> </i> </button>
        </div>
        <! /input-group >
        
      </div> -->
		</div>

		<!-- this part is duplicate from cartMenu  keep it for mobile -->
		<div class="navbar-cart  collapse">
			<!--/.cartMenu-->
		</div>
		<!--/.navbar-cart-->

		<div class="navbar-collapse collapse"></div>
		<!--/.nav-collapse -->
	</div>
	<div class="padding-10">

		<div class="row">

			<div class="pull-left">

				<img style="height: 8em; padding: 1rem;" src="/logo.png" alt="">
				
			</div>

			<div class="pull-right">

				<h1 class="font-400">Recibo de pago</h1>
				<br/>
				<a href="mailto:soporte@franchiseone.net">soporte@franchiseone.net</a>
			</div>


		</div>



		<div class="row">
		
		
<hr class="col-md-11" />





			

<div class="col-md-8">


				<address>
					<strong>Facturar a:</strong> <br> <strong>Señor (a). <?php echo $datos_afiliado[0]->nombre." ".$datos_afiliado[0]->apellido;?></strong>

				</address>
			</div>


			
<div class="col-md-4">



				<div>
					<div class="font-md">

						<abbr title="Phone"><strong>Fecha de expedición:</strong></abbr><span
							class="pull-right"> <i></i> <?php echo date("Y-m-d");?> </span> <br>
						<br> <abbr title="Phone"><strong>Fecha de vencimiento:</strong></abbr><span
							class="pull-right"> <i></i> <?php echo date("Y-m-d");?> </span>
					</div>

				</div>

			</div>


		</div>

		<div class="clearfix"></div>
		<br>
		<div class="row"></div>
		<div class="panel panel-default">
			<div class="panel-body">
				<span class="center"> <?php echo $empresa[0]->resolucion;?> </span>
			</div>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th class="text-center">Cantidad</th>
					<th>ITEM</th>
					<th>DESCRIPCION</th>
					<th>PUNTOS</th>
					<th>PRECIO</th>
					<th>IMPUESTO</th>
					<th>SUBTOTAL</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
												 <?php
            
            $contador = 0;
            $total = 0;
            
            if ($this->cart->contents()) {
                foreach ($this->cart->contents() as $items) {
                    
                    $costoImpuesto = 0;
                    $nombreImpuestos = "";
                    $precioUnidad = 0;
                    $cantidad = $items['qty'];
                    
                    $precioUnidad = $compras[$contador]['costos'][0]->costo;
                    
                    foreach ($compras[$contador]['costos'] as $impuesto) {
                        $costoImpuesto += $impuesto->costoImpuesto;
                        $nombreImpuestos .= "" . $impuesto->nombreImpuesto . "<br>";
                    }
                    
                    if ($compras[$contador]['costos'][0]->iva != 'MAS') {
                        $precioUnidad -= $costoImpuesto;
                    }
                    
                    $img_item = $compras[$contador]['imagen'];
                    
                    if (! file_exists(getcwd() . $img_item))
                        $img_item = "/template/img/favicon/favicon.png";
                    
                    $descripcion_item = $compras[$contador]['descripcion'];
                    
                    if (strlen($descripcion_item) > 125)
                        $descripcion_item = substr($descripcion_item, 0, 125) . "...";
                    
                    echo '<tr> 
																	<td class="text-center"><strong>' . $items['qty'] . '</strong></td>
																	<td class="miniCartProductThumb"><img style="width: 8rem;" src="' . $img_item . '" alt="img"><br/>' . $compras[$contador]['nombre'] . '</td>
																	<td style="max-width: 25rem;"><a  title="' . $compras[$contador]['descripcion'] . '");">' . $descripcion_item . '</a></td>
																	<td>
												                        <span> ' . ($compras[$contador]['puntos'] * $cantidad) . ' </span>
																	</td>
      																<td>
												                        <span> ' . ($precioUnidad * $cantidad) . '  <i class="fa fa-bitcoin"></i> </span>
																	</td>
																	<td>
																	' . ($costoImpuesto * $cantidad) . ' <i class="fa fa-bitcoin"></i> 
        															<br>' . $nombreImpuestos . '
      																<br>
																	</td>
																	<td><strong>' . number_format(($precioUnidad * $cantidad) + ($costoImpuesto * $cantidad), 2) . ' <i class="fa fa-bitcoin"></i></strong></td>
												                    <td  style="width:5%" class="delete"><a onclick="quitar_producto(\'' . $items['rowid'] . '\')"> <i class="txt-color-red fa fa-trash-o fa-3x "></i> </a></td>
																</tr>';
                    $total += round(($precioUnidad * $cantidad) + ($costoImpuesto * $cantidad), 2);
                    $contador ++;
                }
            }
            
            ?>
											<!--	<tr>
														<td></td>
														<td></td>
														<td></td>
														<td colspan="2">Total</td>
														<td><strong>$ </strong></td>
													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td colspan="2">HST/GST</td>
														<td><strong>13%</strong></td>
													</tr>   -->
			</tbody>
		</table>
		<div class="panel panel-default">
			<div class="panel-body">
				<abbr title="Phone">Observaciones:</abbr><span class="center"> <?php echo $empresa[0]->comentarios;?> </span>
			</div>
		</div>
		<div class="invoice-footer">

			<div class="row">

				<div class="col-sm-8">

					<p class="note">**Para evitar cargos por exceso de penalización ,
						por favor, hacer pagos dentro de los 30 días siguientes a la
						fecha de vencimiento. Habrá un cargo de interés del 2 % mensual
						sobre todas las facturas finales.</p>

				</div>

				<div class="col-sm-4">
					<div class="invoice-sum-total pull-right">
						
				<div class="col-md-12 well well-sm  bg-color-green txt-color-white no-border">
					<div class="fa-lg">
						<h3 style="padding: 0">Total a pagar : <strong> <?php echo $total; ?> </strong><i
							class="fa fa-bitcoin"></i></h3>
					</div>
				</div>
					
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="payment-methods pull-right">
						<a onclick="consignacion()"
							style="margin-left: 1rem; font-size: 32px"
							class="btn btn-success"><strong>Confirmar</strong></a>

					</div>
				</div>
			</div>

		</div>

	</div>
</div>

<script>
    paceOptions = {
      elements: true
    };

	function quitar_producto(id)
	{
		
		$.ajax({
			type: "POST",
			url: "/auth/show_dialog",
			data: {message: '¿ Esta seguro que desea Eliminar la mercancia ?'},
		})
		.done(function( msg )
		{
			bootbox.dialog({
				message: msg,
				title: 'Eliminar Mercancia',
				buttons: {
					success: {
					label: "Aceptar",
					className: "btn-success",
					callback: function() {
						
							$.ajax({
								type: "POST",
								url: "/ov/compras/quitar_producto",
								data: {id:id}
							})
							.done(function( msg )
							{
								window.location.href='/ov/compras/comprar'
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
		
	}

	function consignacion(){
		
		$.ajax({
				data:{
					/*id_mercancia : id,
					cantidad : cant*/
				},
					type:"post",
					url:"/ov/compras/compraBitcoin",
		}).done(function(msg){
							
							bootbox.dialog({
								message: msg,
								title: "Confirmando...",
								className: "",
								buttons: {
									success: {
									label: "Aceptar",
									className: "btn-success",
									callback: function() {
										 window.location="/ov/dashboard";
										}
									}
								}
							})
						}
					);
					
	}

	function compropago(){
		//alert('Medio de Pago en Desarrollo');
		iniciarSpinner();
		$.ajax({
			type:"post",
			url:"Compropago",
			success: function(msg){
				FinalizarSpinner();
				bootbox.dialog({
					message: msg,
					title: "Pago Via Compropago",
					className: "",
					buttons: {
						success: {
						label: "Cancelar",
						className: "btn-danger",
						callback: function() {
							}
						}
					}
				})
			}
		});	
	}


	function tucompra(){
		//alert('Medio de Pago en Desarrollo');
		iniciarSpinner();
		$.ajax({
			type:"post",
			url:"pagarVentaTucompra",
			success: function(msg){
				FinalizarSpinner();
				bootbox.dialog({
					message: msg,
					title: "Pago Tu Compra",
					className: "",
					buttons: {
						success: {
						label: "Cancelar",
						className: "btn-danger",
						callback: function() {
							}
						}
					}
				})
			}
		});	
	}

	function payuLatam(){
		iniciarSpinner();
		$.ajax({
			type:"post",
			url:"pagarVentaPayuLatam",
			success: function(msg){
				FinalizarSpinner();
				bootbox.dialog({
					message: msg,
					title: "Pago PayuLatam",
					className: "",
					buttons: {
						success: {
						label: "Cancelar",
						className: "btn-danger",
						callback: function() {
							}
						}
					}
				})
			}
		});	
	}

	function payPal(){
		iniciarSpinner();
		$.ajax({
			type:"post",
			url:"pagarVentaPayPal",
			success: function(msg){
				FinalizarSpinner();
				bootbox.dialog({
					message: msg,
					title: "Pago PayPal",
					className: "",
					buttons: {
						success: {
						label: "Cancelar",
						className: "btn-danger",
						callback: function() {
							}
						}
					}
				})
			}
		});	
	}
</script>

