<?php

use Illuminate\Support\Facades\Route;




Auth::routes();

// route::get('/', 'main-page\InicioController@index')->name('inicio');

route::get('/', 'InicioController@index')->name('inicio');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/servicios', 'InicioController@services')->name('servicios');

Route::get('/Sobre-Nosotros', 'InicioController@about')->name('about');

Route::get('/donacion', 'DonacionController@index')->name('donacion');

Route::post('/donacion/guardar', 'DonacionController@guardar_donacion')->name('donacion.guardar');

// Route::resource('post', 'Dashboard\-UserController');
// Route::resource('user', 'UserController');


////////////////////////////////// RUTAS DE USUARIO ///////////////////////////////

Route::get('/usuarios', 'UserController@formulario_registrar')->name('usuarios');

Route::post('/usuarios/guardar', 'UserController@guardar_usuario')->name('usuarios.guardar');

Route::get('/usuarios/buscar', 'UserController@buscar_usuario')->name('usuarios.buscar');

Route::get('/usuarios/registrados', 'UserController@mostrar_tabla')->name('usuarios.registrados');

Route::get('/usuarios/{id}/eliminar', 'UserController@elimina_usuario')->name('usuarios.eliminar');

Route::get('/editar/{id}', 'UserController@editar')->name('editar');

Route::post('/actualizar/{id}', 'UserController@actualizar')->name('actualizar');

Route::get('/buscarUsuario', 'UserController@buscarUsuario')->name('buscar-usuario');


////////////////////////////////// RUTAS DE INVENTARIO ///////////////////////////////

Route::get('/inventario', 'InventarioController@formulario_inventario')->name('inventario');

Route::post('/inventario/guardar', 'InventarioController@guardar_inventario')->name('inventario.guardar');

Route::get('/inventario/registrados', 'InventarioController@tabla_inventarios')->name('inventario.registrados');

Route::get('/editar/inventario/{id}', 'InventarioController@editar')->name('editar.iventario');

Route::post('/actualizar/inventario/{id}', 'InventarioController@actualizar')->name('actualizar.inventario');

Route::post('/eliminar/{id}/inventario', 'InventarioController@elimina_inventario')->name('eliminar.inventario');

////////////////////////////////// RUTAS DE TIPO KIT ///////////////////////////////

Route::get('/kit', 'KitController@mostrar_formulario')->name('kit');

Route::post('/kit/guardar', 'KitController@guardar_kit')->name('kit.guardar');

Route::get('/kit/registrados', 'KitController@tabla_kit')->name('kit.registrados');

Route::get('/kit/editar/{id}', 'KitController@editar_kit')->name('kit.editar');

Route::post('/actualizar/kit/{id}', 'KitController@actualizar_kit')->name('kit.actualizar');

Route::post('/kit/{id}/eliminar', 'KitController@elimininar_kit')->name('kit.eliminar');

////////////////////////////////// RUTAS DE PRODUCTOS ///////////////////////////////

Route::get('/producto', 'ProductController@index')->name('producto');

Route::post('/producto/guardar', 'ProductController@create')->name('producto.guardar');

Route::get('/producto/registrados', 'ProductController@tabla_producto')->name('producto.registrados');

Route::get('/producto/{id}/editar', 'ProductController@editar_producto')->name('producto.editar');

Route::post('/producto/actualizar/{id}', 'ProductController@actualizar_producto')->name('producto.actualizar');

Route::post('/producto/{id}/eliminar', 'ProductController@elimininar_producto')->name('producto.eliminar');

////////////////////////////////// RUTAS DEl carrito de compras ///////////////////////////////

Route::get('/borrarItem/{id}', 'ProductController@borrarItem')->name('delete-cart');

Route::get('/carrito', 'ProductController@carrito')->name('carrito');

Route::get('/detalle/{id}', 'ProductController@detalles')->name('detalle');

Route::get('/agregar-al-carrito/{id}', 'ProductController@addTocart')->name('cart');

Route::get('/Descontar-de-carrito/{id}', 'ProductController@descontaritem')->name('cartDescon');

Route::get('/Aumentar-de-carrito/{id}', 'ProductController@aumentaritem')->name('cartAument');

Route::get('/productos-tienda', 'ProductController@index2')->name('productos-tienda');



//////////////////////////////// DOM PDF ///////////////////////////////

Route::get('/pdf-de-productos', 'PDFController@PDFproducto')->name('pdf-producto');

Route::get('/pdf-de-Usuarios', 'PDFController@PDFuser')->name('pdf-user');

Route::get('/pdf-de-donaciones', 'PDFController@PDFdonation')->name('pdf-donacion');

Route::get('/pdf-de-kit', 'PDFController@PDFkit')->name('pdf-kit');

Route::get('/pdf-de-inventario', 'PDFController@PDFinventary')->name('pdf-inventario');

Route::get('/PDF-De-todos-los-informes', 'PDFController@todos')->name('allinformes');



/////////////////////////////imagenes////////////////////////////////////////

Route::get('/imagenes-uploader', 'ProductController@storage')->name('images');

Route::post('/imagenes-uploader-store/{id}', 'ProductController@store')->name('image.store');


/////////////////////////////RUTAS PARA LA AGENDA ////////////////////////////////////////

Route::get('/agenda', 'AgendaController@index')->name('agenda');

Route::get('/agenda-Registradas', 'AgendaController@registroCitas')->name('agenda.regis');

Route::post('/agenda/guardar', 'AgendaController@guardar');

Route::get('/agenda/listar', 'AgendaController@listar');

Route::get('/agenda/{id}/borrar', 'AgendaController@eliminar')->name('borrar.cita');

