<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

			<?php
            $item="id_usuario";
            $valor=$_SESSION["id"];
            $permisos=ControladorUsuarios::ctrMostrarUsuariosPermisos($item,$valor);
            $valores= array();
            foreach ($permisos as $key => $value) {
                array_push($valores,$value["id_permiso"]);
            }
            in_array(1,$valores)?$_SESSION['usuarios']=1:$_SESSION['usuarios']=0;
            in_array(2,$valores)?$_SESSION['empresas']=1:$_SESSION['empresas']=0;
            in_array(3,$valores)?$_SESSION['redes']=1:$_SESSION['redes']=0;
            in_array(4,$valores)?$_SESSION['miembros']=1:$_SESSION['miembros']=0;
            in_array(5,$valores)?$_SESSION['membresias']=1:$_SESSION['membresias']=0;
            in_array(6,$valores)?$_SESSION['apuestas']=1:$_SESSION['apuestas']=0;
			in_array(6,$valores)?$_SESSION['dashboard']=1:$_SESSION['dashboard']=0;

            ?>

			<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<?php
            if($_SESSION["usuarios"] == 1){
            ?>


			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>
			<?php
			}
            if($_SESSION["empresas"] == 1){
            ?>

			<li>

				<a href="empresas">

					<i class="fa fa-building"></i>
					<span>Empresas</span>

				</a>

			</li>

			<?php
			}
            if($_SESSION["redes"] == 1){
            ?>

			<li>

				<a href="social">

					<i class="fa fa-globe"></i>
					<span>Red Social</span>

				</a>

			</li>

			<?php
			}
            if($_SESSION["miembros"] == 1){
            ?>

			<li>

				<a href="miembros">

					<i class="fa fa-users"></i>
					<span>Miembros</span>

				</a>

			</li>

			<?php
			}
            if($_SESSION["membresias"] == 1){
            ?>

			<li class="treeview">

				<a href="#">

					<i class="fa fa-credit-card-alt"></i>
					
					<span>Membresias</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="membresias">
							
							<i class="fa fa-circle-o"></i>
							<span>Membresias</span>

						</a>

					</li>

					<li>

						<a href="preciomembresias">
							
							<i class="fa fa-circle-o"></i>
							<span>Precio de membresias</span>

						</a>

					</li>

					<li>

						<a href="tipomembresias">
							
							<i class="fa fa-circle-o"></i>
							<span>Tipo membresias</span>

						</a>

					</li>

				</ul>

			</li>

			<?php
			}
            if($_SESSION["apuestas"] == 1){
			?>
	
			<li>

				<a href="apuestas">

					<i class="fa fa-area-chart"></i>
					<span>Apuestas</span>

				</a>

			</li>

			<?php
			}
			?>

		</ul>

	 </section>

</aside>