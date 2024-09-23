<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Asesor/Head/head.php");
require_once("c://xampp/htdocs/proyectotls/controlador/BeneficiarioControlador.php");

$obj = new BeneficiarioControlador();
$date = $obj->Mostrar($_GET['id']);
   
?>
<center><form action="index.php"><button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z"/>
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708z"/>
                    </svg>
                    Beneficiarios
                </button></form></center>
<thead>
        <tr>
            <th scope="col">NumeroIdentificacion</th> 
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">TipoIdentificacion</th>
            <th scope="col">Parentesco</th>
            <th scope="col">NumIdentificacionAfiliado</th>
            
        </tr>
    </thead>

    <tbody>
                        
        <tr>
            <td scope="col"><?= $date[0]?>
            <td scope="col"><?= $date[1]?>
            <td scope="col"><?= $date[2]?>
            <td scope="col"><?= $date[3]?>
            <td scope="col"><?= $date[4]?>
            <td scope="col"><?= $date[5]?>        
        </tr>
                        
    </tbody>

    
<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Asesor/Head/footer.php");
?>
