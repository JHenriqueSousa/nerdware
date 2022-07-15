<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Utilizadores
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/users">Utilizadores</a></li>
    <li class="active"><a href="/admin/users/create">Criar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php if( $errorRegister != '' ){ ?>
  <div class="alert alert-danger">
      <?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </div>
  <?php } ?>
  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Utilizador</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/users/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="desperson">Nome</label>
              <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Adiciona o nome." value="<?php echo htmlspecialchars( $registerValues["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="deslogin">Login</label>
              <input type="text" class="form-control" id="deslogin" name="deslogin" placeholder="Adiciona o login." value="<?php echo htmlspecialchars( $registerValues["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="nrphone">Telefone</label>
              <input type="tel" class="form-control" id="nrphone" name="nrphone" placeholder="Adiciona o telefone." value="<?php echo htmlspecialchars( $registerValues["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="desemail">E-mail</label>
              <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Adiciona o e-mail." value="<?php echo htmlspecialchars( $registerValues["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="despassword">Palavra-Passe</label>
              <input type="password" class="form-control" id="despassword" name="despassword" placeholder="Palavra-Passe">
            </div>
            <div class="checkbox">
             <label>
              <input type="checkbox" id="showpass" onclick="myFunction()">Mostrar Palavra-Passe
              <label>
                &nbsp&nbsp<input type="checkbox" name="inadmin" value="1"> Acesso de Administrador
              </label>
              </div>
            </label>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Criar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<script>
  function myFunction() {
var x = document.getElementById("despassword");
if (x.type === "password") {
  x.type = "text";
} else {
  x.type = "password";
}
}
</script>
<!-- /.content-wrapper -->