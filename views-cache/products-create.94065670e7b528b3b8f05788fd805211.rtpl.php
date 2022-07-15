<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de Produtos
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/admin/categories">Categorias</a></li>
      <li class="active"><a href="/admin/categories/create">Criar</a></li>
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
            <h3 class="box-title">Novo Produto</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/products/create" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="desproduct">Nome do produto</label>
                <input type="text" class="form-control" id="desproduct" name="desproduct" placeholder="Escreva aqui o nome do produto" value="<?php echo htmlspecialchars( $registerValues["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="vlprice">Preço</label>
                <input type="number" class="form-control" id="vlprice" name="vlprice" step="0.01" placeholder="0.00" value="<?php echo htmlspecialchars( $registerValues["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="vlwidth">Largura</label>
                <input type="number" class="form-control" id="vlwidth" name="vlwidth" step="0.01" placeholder="0.00" value="<?php echo htmlspecialchars( $registerValues["vlwidth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="vlheight">Altura</label>
                <input type="number" class="form-control" id="vlheight" name="vlheight" step="0.01" placeholder="0.00" value="<?php echo htmlspecialchars( $registerValues["vlheight"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="vllength">Profundidade</label>
                <input type="number" class="form-control" id="vllength" name="vllength" step="0.01" placeholder="0.00" value="<?php echo htmlspecialchars( $registerValues["vllength"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="vlweight">Peso</label>
                <input type="number" class="form-control" id="vlweight" name="vlweight" step="0.01" placeholder="0.00" value="<?php echo htmlspecialchars( $registerValues["vlweight"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="desurl">Link</label>
                <input type="text" class="form-control" id="desurl" name="desurl" value="<?php echo htmlspecialchars( $registerValues["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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
  <!-- /.content-wrapper -->