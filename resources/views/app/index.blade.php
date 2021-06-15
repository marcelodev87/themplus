<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Uena - Restaurant Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url(asset('backend/images/favicon.png')) }}">


    <link rel="stylesheet" href="{{ url('backend/vendor/sweetalert2/dist/sweetalert2.min.css')}}"/>
    <link rel="stylesheet" href="{{ url('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}"/>
    <link rel="stylesheet" href="{{ url('backend/css/style.css')}}"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
	<div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
		<div class="login-aside text-center  d-flex flex-column flex-row-auto">
			<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
				<div class="text-center mb-4 pt-5">
					<img src="{{ url(asset('backend/images/logo-full.png')) }}" alt="">
				</div>
				<h3 class="mb-2">Welcome back!</h3>
				<p>User Experience & Interface Design <br>Strategy SaaS Solutions</p>
			</div>
			<div class="aside-image" style="background-image:url(backend/images/background/pic1.svg);"></div>
		</div>
        <div class="ajax_response"></div>
		<div class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
			<div class="d-flex justify-content-center h-100 align-items-center">
				<div class="authincation-content style-2">


					<div class="row no-gutters">
						<div class="col-xl-12 tab-content">
							<div id="sign-up" class="auth-form tab-pane fade form-validation">
{{--------------------------------------- FORM CRIE SUA CONTA ------------------------------------------}}
								<form id="dz_login_signup_form" class="form-validate">
									<h3 class="text-center mb-4 text-black">Crie sua Conta</h3>
									<div class="form-group">
										<label class="mb-1 text-black"   for="val-username"><strong>Seu nome</strong></label>
										<div>
											<input type="text" class="form-control" id="val-username" name="val-username" placeholder="digite o usuário..">
										</div>
									</div>
									<div class="form-group">
										<label class="mb-1 text-black"  for="val-email"><strong>Email</strong></label>
										<div>
											<input type="email" class="form-control" id="val-email" name="val-email" placeholder="email@exemplo.com">
										</div>
									</div>
									<div class="form-group">
										<label class="mb-1 text-black"  for="val-password"><strong>Senha</strong></label>
										<div>
											<input type="password" class="form-control"  id="val-password" name="val-password" value="senha">
										</div>
									</div>
									<div class="form-group text-center mt-4">
										<button type="submit" class="btn btn-primary btn-block" id="dz-signup-submit" >Entrar</button>
									</div>
								</form>
								<div class="new-account mt-3">
									<p>Já possui cadastro? <a class="text-primary" href="#sign-in" data-toggle="tab">Entrar</a></p>
								</div>
							</div>
							<div id="sign-in" class="auth-form tab-pane fade show active form-validation">
{{--------------------------------------- FORM CRIE SUA CONTA ------------------------------------------}}
								<form action="{{ route('app.login.do') }}" name="login" method="POST">
									<h3 class="text-center mb-4 text-black">Entrar em sua conta</h3>
									<div class="form-group">
										<label class="mb-1"  for="val-email"><strong>Email</strong></label>
										<div>
											<input type="email" class="form-control" name="email" >
										</div>
									</div>
									<div class="form-group">
										<label class="mb-1"><strong>Senha</strong></label>
										<input type="password" name="password_check" class="form-control" value="Password">
									</div>
									<div class="form-row d-flex justify-content-between mt-4 mb-2">
										<div class="form-group">
										   <div class="custom-control custom-checkbox ml-1">
												<input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
												<label class="custom-control-label" for="basic_checkbox_1">Salvar meus dados</label>
											</div>
										</div>
										<div class="form-group">
											<a href="#forgot-password" data-toggle="tab">Esqueceu sua senha?</a>
										</div>
									</div>
									<div class="text-center form-group">
										<button type="submit" class="btn btn-primary btn-block"  id="dz-signin-submit">Entrar</button>
									</div>
								</form>
								<div class="new-account mt-3">
									<p>Não possui uma conta? <a class="text-primary"  href="#sign-up" data-toggle="tab">Entrar</a></p>
								</div>
							</div>
							<div id="forgot-password" class="auth-form tab-pane fade form-validation">
								<form id="dz_login_forgot_form">
									<h3 class="text-center mb-4 text-black">Esqueceu sua senha</h3>
									<div class="form-group">
										<label class="mb-1"  for="val-password"><strong>Digite sua senha</strong></label>
										<div>
											<input type="password" class="form-control"  id="val-password" name="val-password" >
										</div>
									</div>
									<div class="text-center form-group">
										<button type="submit"  class="btn btn-primary btn-block">Enviar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--**********************************
	Scripts
***********************************-->
	<!-- Required vendors -->


{{--
    <script src="{{ url('backend/vendor/global/global.min.js')}}"></script>
    <script src="{{ url('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ url('backend/js/custom.min.js')}}"></script>
    <script src="{{ url('backend/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ url('backend/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ url('backend/js/login-form.js')}}"></script>
    <script src="{{ url('backend/js/deznav-init.js')}}"></script> --}}

    <script src="{{ url('backend/js/jquery.min.js') }}"></script>
    <script src="{{ url('backend/js/login.js') }}"></script>
    <script src="{{ url('backend/js/scripts.js')}}"></script>

</body>
</html>
