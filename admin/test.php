<?php 
require_once ('../sistema.class.php');
$app = new Sistema;
$roles = $app->getRol('21030246@itcelaya.edu.mx');
print_r($roles);
$privilegios = $app->getPrivilegios('21030246@itcelaya.edu.mx');
print_r($privilegios);
?> 