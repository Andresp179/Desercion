<div class="container">
   <h2>Lista Beneficios</h2>
   <form class="form-inline" action="?controller=BeneficioBienestar&action=search" method="post">
		<div class="form-group row">
			<div class="col-xs-4">
				<input class="form-control" id="id" name="id" type="text" placeholder="Busqueda por ID">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-search"> </span> Buscar</button>
			</div>
		</div>
	</form>
    <div class="table-responsive">
            <table class="table table-hover">
                 <thead>
                    <tr>
					   <th>Id</th>
					   <th>Descripcion</th>
					</tr>
                    <tbody>
                      <?php foreach ($listaBeneficios as$beneficio) {?>
                        <tr>
                         <td> <a href="?controller=BeneficioBienestar&&action=updateshow&&idbenef=<?php  echo $beneficio->getidbenef()?>"> <?php echo $beneficio->getdescripcion(); ?></a> </td>
						 <td><?php echo $beneficio->getidbenef(); ?></td>
                         <td><?php echo $beneficio->getdescripcion(); ?></td>
                         <td><a href="?controller=BeneficioBienestar&&action=delete&&idbenef=<?php echo $beneficio->getidbenef() ?>">Eliminar</a> </td>
                        </tr>
                      <?php } ?>
                     </tbody>
                </thead>
             </table>
     </div>
</div>