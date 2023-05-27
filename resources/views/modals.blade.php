<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
	<form action="{{ $router->route('login') }}" method="post" class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<h1 class="modal-title fs-5" id="loginModalLabel">Iniciar Sessão</h1>
			</div>

			<div class="modal-body">
				<div class="mb-3">
					<label class="col-12">
						<span>E-mail</span>
						<input type="text" name="username" class="form-control" />
					</label>
				</div>

				<div>
					<label class="col-12">
						<span>Senha</span>
						<input type="password" name="password" class="form-control" />
					</label>
				</div>
			</div>

			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
		</div>
	</form>
</div>



<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
	<form action="{{ $router->route('register') }}" method="post" class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<h1 class="modal-title fs-5" id="registerModalLabel">Criar conta</h1>
			</div>

			<div class="modal-body">
				<div class="mb-3">
					<label class="col-12">
						<span>Nome</span>
						<input type="text" name="name" class="form-control" />
					</label>
				</div>

				<div class="mb-3">
					<label class="col-12">
						<span>E-mail</span>
						<input type="text" name="email" class="form-control" />
					</label>
				</div>

				<div class="mb-3">
					<label class="col-12">
						<span>Senha</span>
						<input type="password" name="password" class="form-control" />
					</label>
				</div>

				<div>
					<label class="col-12">
						<span>Confirme a senha</span>
						<input type="password" name="confirm_password" class="form-control" />
					</label>
				</div>
			</div>

			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
		</div>
	</form>
</div>