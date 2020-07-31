<?php
include("session.php");
?>
<body>
	<input type="checkbox" id="check" onclick="onClick()">
	<label for="check" id="icone"><svg class="bi bi-card-list" width="4em" height="4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
			<path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
			<circle cx="3.5" cy="5.5" r=".5" />
			<circle cx="3.5" cy="8" r=".5" />
			<circle cx="3.5" cy="10.5" r=".5" />
		</svg>
	</label>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<input type="checkbox" id="check">
		<label for="check" id="icone"><svg class="bi bi-card-list" width="4em" height="4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
				<path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
				<circle cx="3.5" cy="5.5" r=".5" />
				<circle cx="3.5" cy="8" r=".5" />
				<circle cx="3.5" cy="10.5" r=".5" />
			</svg>
		</label>
		<div class="principal">
			<div>
				<nav class="navigation-bar">
					<ul>
                    <?php if(!isset($_SESSION['logado'])) {?>
                        <li><a href="login.php">
								<div class="link">EFETUAR LOGIN</div>
                            </a></li>
                    <?php } else { ?>
						<li><a href="index.php">
								<div class="link">PÁGINA DE INÍCIO</div>
							</a></li>
						<li><a href="registrar-ocorrencia.php">
								<div class="link">REGISTRAR OCORRÊNCIA</div>
							</a></li>
						<li><a href="listar-ocorrencias.php">
								<div class="link">LISTAR OCORRÊNCIAS</div>
                            </a></li>
						<li><a href="logout.php">
								<div class="link">SAIR</div>
                            </a></li>
                    <?php } ?>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="container" id="container">

		<script>
			document.getElementById('check').checked = false;
			function onClick() {
				if (document.getElementById('check').onclick)
					if (document.getElementById('check').checked === true) {
						document.getElementById("container").style.opacity = 0.5;
					} if (document.getElementById('check').checked === false) {
					document.getElementById("container").style.opacity = 1;
				}
			}
		</script>
