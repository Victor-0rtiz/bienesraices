<?php 
require_once __DIR__. "/../includes/app.php";

use Controllers\PaginasControllers;
use Controllers\PropiedadControllers;
use Controllers\VendedoresControllers;
use Controllers\LoginControllers;
use MVC\Router;


$routers = new Router();
// a-------------------------------------------------
//propiedades
$routers->get("/admin", [PropiedadControllers::class, "index"]);
$routers->get("/propiedades/actualizar", [PropiedadControllers::class, "actualizar"]);
$routers->post("/propiedades/actualizar", [PropiedadControllers::class, "actualizar"]);
$routers->get("/propiedades/crear", [PropiedadControllers::class, "crear"]);
$routers->post("/propiedades/crear", [PropiedadControllers::class, "crear"]);
$routers->post("/propiedades/eliminar", [PropiedadControllers::class, "eliminar"]);
// a------------------------------------------------
//vendedores

$routers->get("/vendedores/actualizar", [VendedoresControllers::class, "actualizar"]);
$routers->post("/vendedores/actualizar", [VendedoresControllers::class, "actualizar"]);
$routers->get("/vendedores/crear", [VendedoresControllers::class, "crear"]);
$routers->post("/vendedores/crear", [VendedoresControllers::class, "crear"]);
$routers->post("/vendedores/eliminar", [VendedoresControllers::class, "eliminar"]);
//a------------------------------------------------------------
//paginas publicas

$routers->get("/", [PaginasControllers::class, "index"]);
$routers->get("/nosotros", [PaginasControllers::class, "nosotros"]);
$routers->get("/propiedades", [PaginasControllers::class, "propiedades"]);
$routers->get("/propiedad", [PaginasControllers::class, "propiedad"]);
$routers->get("/blog", [PaginasControllers::class, "blog"]);
$routers->get("/entrada", [PaginasControllers::class, "entrada"]);
$routers->get("/contacto", [PaginasControllers::class, "contacto"]);
$routers->post("/contacto", [PaginasControllers::class, "contacto"]);

//a------------------------------------------------------------
//paginas login
$routers->get("/login", [LoginControllers::class, "login"]);
$routers->post("/login", [LoginControllers::class, "login"]);
$routers->get("/logout", [LoginControllers::class, "logout"]);

$routers->comprobarRutas();

?>
