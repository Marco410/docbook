<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* DB::listen(function($query){
echo "<pre>{$query->sql}</pre>";
});
 */
Auth::routes();

Route::get('/', 'IndexController@index')->name('page');
    
    Route::get('/home', function () {
        return view('index');
    })->name('page');

Route::get('/index', function () {
    return view('index');
})->name('page');

Route::get('/index-1', function () {
    return view('index-1');
})->name('index-1');
Route::get('/index-2', function () {
    return view('index-2');
})->name('index-2');
Route::get('/index-3', function () {
    return view('index-3');
})->name('index-3');
Route::get('/index-5', function () {
    return view('index-5');
})->name('index-5');

Route::get('/appointments', function () {
    return view('appointments');
});
Route::get('/schedule-timings', function () {
    return view('schedule-timings');
});

Route::get('/patient-profile', function () {
    return view('patient-profile');
});
Route::get('/chat-doctor', function () {
    return view('doctors.chat-doctor');
})->name('chat-doctor');
Route::get('/invoices', function () {
    return view('doctors.invoices');
});
Route::get('/config-perfil-doctor', function () {
    return view('doctors.doctor-profile-settings');
});

Route::get('/reviews', function () {
    return view('reviews');
});



Route::get('/doctor-register-step1', "DoctorController@register_step1")->name('doctor-register-step1');

Route::get('/doctor-register-step2', "DoctorController@register_step2")->name('doctor-register-step2');

Route::get('/doctor-register-step3', "DoctorController@register_step3")->name('doctor-register-step3');

###### RUTAS PACIENTE ######


Route::post('/login-paciente', 'Auth\LoginController@login_pa')->name('login-paciente');

Route::get('/registro-paciente', 'Auth\RegisterController@p_register')->name('registro-paciente');

Route::post('/guardar-paciente',"Auth\RegisterController@p_store" )->name('guardar-paciente');

Route::post('/pa-registro-paso1',"Auth\RegisterController@p_store_step_one" )->name('pa-registro-paso1');

Route::post('/pa-registro-paso2',"Auth\RegisterController@p_store_step_two" )->name('pa-registro-paso2');

Route::post('/pa-registro-paso3',"Auth\RegisterController@p_store_step_three" )->name('pa-registro-paso3');

Route::post('/pa-registro-paso4',"Auth\RegisterController@p_store_step_four" )->name('pa-registro-paso4');



Route::get('/paciente-inicio',"PacienteController@paciente_dashboard" )->name('paciente-inicio');


###### RUTAS DOCTOR ######

Route::post('/login-dr','Auth\LoginController@login_dr')->name('login-dr');

Route::get('/registro-doctor',"Auth\RegisterController@register_dr" )->name('registro-doctor');

Route::post('/registro-dr',"Auth\RegisterController@store_dr" )->name('registrodr.store');

Route::post('/registro-paso1',"Auth\RegisterController@store_step_one" )->name('registro-paso1');

Route::post('/registro-paso2',"Auth\RegisterController@store_step_two" )->name('registro-paso2');

Route::post('/registro-paso3',"Auth\RegisterController@store_step_three" )->name('registro-paso3');

Route::get('/doctor-inicio', 'DoctorController@doctor_dashboard')->name('doctor-inicio');

Route::post('/cambiar-clinica', 'DoctorController@change_clinic')->name('cambiar-clinica');

Route::get('/mis-pacientes', 'DoctorController@my_patients')->name('mis-pacientes');

Route::get('/historial/{paciente}', 'DoctorController@historial')->name('historial');

Route::get('/doctor-perfil', 'DoctorController@profile' )->name('doctor-perfil');

Route::get('/citas/{doctor}','IndexController@booking')->name('citas');

Route::get('/paciente/nuevo','DoctorController@new_patient')->name('paciente-nuevo');

Route::post('/paciente/registro','DoctorController@patient_registro')->name('doctor-paciente-registro');

Route::post('/paciente/editar','DoctorController@patient_editar')->name('doctor-paciente-editar');

Route::get('/perfil-paciente/{paciente}','DoctorController@profile_patient')->name('perfil-paciente');

Route::get('/editar-paciente/{paciente}','DoctorController@edit_patient')->name('editar-paciente');

Route::get('/get_patient/{paciente}','DoctorController@get_patient')->name('get_patient');

Route::get('/delete-patient/{paciente}','DoctorController@delete_patient')->name('delete-patient');

Route::post('/store-consulta-rapida','DoctorController@new_consulta_rapida')->name('store-consulta-rapida');

Route::post('/store-consulta','DoctorController@new_consulta')->name('store-consulta');

Route::post('/end-consulta','DoctorController@end_consulta')->name('end-consulta');

Route::post('/make-pay','DoctorController@make_pay')->name('make-pay');

Route::get('/receta','IndexController@receta')->name('receta');

Route::get('/pagos','DoctorController@pagos')->name('pagos');

Route::post('/save-pago',"DoctorController@save_pago" )->name('save-pago');

Route::get('/caja','DoctorController@caja')->name('caja');

Route::post('/open-caja','DoctorController@open_caja')->name('open-caja');

Route::post('/close-caja','DoctorController@close_caja')->name('close-caja');

Route::post('/close-caja-check','CajasController@close_caja_check')->name('close-caja-check');

Route::post('/make-report','DoctorController@make_report')->name('make-report');

Route::post('/make-report-close','DoctorController@make_report_close')->name('make-report-close');

Route::post('/make-report-date','DoctorController@make_report_date')->name('make-report-date');


Route::get('/clinicas','DoctorController@clinics')->name('clinicas');

Route::get('/clinica-nueva','DoctorController@new_clinic')->name('clinica-nueva');

Route::post('/guardar-clinica-nueva',"DoctorController@store_new_clinic" )->name('guardar-clinica-nueva');


Route::get('/reportes','DoctorController@reports')->name('reportes');

Route::post('/make-report-diario','DoctorController@make_report_diario')->name('make-report-diario');

Route::post('/make-report-resumen','DoctorController@make_report_resumen')->name('make-report-resumen');

Route::post('/make-report-suive','DoctorController@make_report_suive')->name('make-report-suive');

###### RUTAS HISTORIAL ######

Route::post('/store-notas-internas','HistorialController@store_notas_internas')->name('store-notas-internas');

Route::post('/store-signos','HistorialController@store_signos')->name('store-signos');


//ALERGIAS
Route::post('/store-alergias-option','HistorialController@store_alergias_option')->name('store-alergias-option');

Route::post('/store-alergias','HistorialController@store_alergias')->name('store-alergias');

Route::post('/destroy-alergias','HistorialController@destroy_alergias')->name('destroy-alergias');

//PATOLÓGICOS
Route::post('/store-patologicos','HistorialController@store_patologicos')->name('store-patologicos');

Route::post('/store-npatologicos','HistorialController@store_npatologicos')->name('store-npatologicos');

Route::post('/store-heredo','HistorialController@store_heredo')->name('store-heredo');

Route::post('/store-esquema-vacuna','HistorialController@store_esquema_vacuna')->name('store-esquema-vacuna');

Route::post('/store-gineco','HistorialController@store_gineco')->name('store-gineco');

Route::post('/store-perinatal','HistorialController@store_perinatal')->name('store-perinatal');

Route::post('/store-postnatal','HistorialController@store_postnatal')->name('store-postnatal');

Route::post('/store-psiqui','HistorialController@store_psiqui')->name('store-psiqui');

Route::post('/store-nutri','HistorialController@store_nutri')->name('store-nutri');

Route::post('/store-notas-his','HistorialController@store_notas_his')->name('store-notas-his');

//VACUNAS

Route::post('/store-vacunas','HistorialController@store_vacunas')->name('store-vacunas');

Route::post('/destroy-vacunas','HistorialController@destroy_vacunas')->name('destroy-vacunas');

//MEDICAMENTOS

Route::post('/store-medis','HistorialController@store_medis')->name('store-medis');

Route::post('/destroy-medis','HistorialController@destroy_medis')->name('destroy-medis');



###### RUTAS DATA ######

Route::get('/get-alergias','DataController@get_alergias')->name('get-alergias');

Route::post('/save-new-alergia','DataController@save_new_alergia')->name('save-new-alergia');

Route::get('/get-vacunas','DataController@get_vacunas')->name('get-vacunas');

Route::post('/save-new-vacuna','DataController@save_new_vacuna')->name('save-new-vacuna');

Route::get('/get-medis','DataController@get_medis')->name('get-medis');

Route::post('/save-new-medi','DataController@save_new_medi')->name('save-new-medi');

Route::get('/get-motivo-consulta','DataController@get_motivo_consulta')->name('get-motivo_consulta');

Route::post('/save-new-motivo','DataController@save_new_motivo')->name('save-new-motivo');

Route::post('/save-new-articulo','DataController@save_new_articulo')->name('save-new-articulo');

Route::post('/save-new-estudio','DataController@save_new_estudio')->name('save-new-estudio');

Route::get('/get-diagnostics','DataController@get_diagnostics')->name('get-diagnostics');

Route::get('/get-articulos','DataController@get_articulos')->name('get-articulos');

Route::get('/get-estudios','DataController@get_estudios')->name('get-estudios');

Route::get('/get-cajas','DataController@get_cajas')->name('get-cajas');





Route::get('/map-grid', function () {
    return view('map-grid');
})->name('map-grid');
Route::get('/map-list', function () {
    return view('map-list');
})->name('map-list');
Route::get('/search', function () {
    return view('search');
})->name('search');


Route::get('/verificar', function () {
    return view('checkout');
})->name('verificar');
Route::get('/booking-success', function () {
    return view('booking-success');
})->name('booking-success');
Route::get('/patient-dashboard', function () {
    return view('patient-dashboard');
})->name('patient-dashboard');
Route::get('/favourites', function () {
    return view('favourites');
})->name('favourites');
Route::get('/change-password', function () {
    return view('change-password');
})->name('change-password');
Route::get('/profile-settings', function () {
    return view('profile-settings');
})->name('profile-settings');
Route::get('/chat', function () {
    return view('chat');
})->name('chat');
Route::get('/voice-call', function () {
    return view('voice-call');
})->name('voice-call');
Route::get('/video-call', function () {
    return view('video-call');
})->name('video-call');
Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');
Route::get('/components', function () {
    return view('components');
})->name('components');
Route::get('/invoice-view', function () {
    return view('invoice-view');
})->name('invoice-view');
Route::get('/blank-page', function () {
    return view('blank-page');
})->name('blank-page');

Route::get('/iniciar-sesion', function () {
    return view('login',['route'=> 'login-dr','tipo' => 'Doctor']);
})->name('iniciar-sesion');

Route::get('/iniciar-sesion-paciente', function () {
    return view('login',['route'=> 'login-paciente','tipo' => 'Paciente']);
})->name('iniciar-sesion-paciente');



Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');
Route::get('/blog-list', function () {
    return view('blog-list');
})->name('blog-list');
Route::get('/blog-grid', function () {
    return view('blog-grid');
})->name('blog-grid');
Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');
Route::get('/add-billing', function () {
    return view('add-billing');
});
Route::get('/add-prescription', function () {
    return view('add-prescription');
});
Route::get('/edit-billing', function () {
    return view('edit-billing');
});
Route::get('/edit-prescription', function () {
    return view('edit-prescription');
});
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');
Route::get('/social-media', function () {
    return view('social-media');
})->name('social-media');
Route::get('/term-condition', function () {
    return view('term-condition');
})->name('term-condition');
Route::get('/doctor-change-password', function () {
    return view('doctors.doctor-change-password');
})->name('doctor-change-password');
Route::get('/cart', function () {
    return view('cart');
})->name('cart');
Route::get('/doctor-add-blog', function () {
    return view('doctors.doctor-add-blog');
})->name('doctor-add-blog');
Route::get('/doctor-blog', function () {
    return view('doctors.doctor-blog');
})->name('doctor-blog');
Route::get('/doctor-pending-blog', function () {
    return view('doctors.doctor-pending-blog');
})->name('doctor-pending-blog');
Route::get('/edit-blog', function () {
    return view('edit-blog');
})->name('edit-blog');
Route::get('/payment-success', function () {
    return view('payment-success');
})->name('payment-success');
Route::get('/pharmacy-details', function () {
    return view('pharmacy-details');
})->name('pharmacy-details');
Route::get('/pharmacy-index', function () {
    return view('pharmacy-index');
})->name('pharmacy-index');
Route::get('/pharmacy-search', function () {
    return view('pharmacy-search');
})->name('pharmacy-search');
Route::get('/product-all', function () {
    return view('product-all');
})->name('product-all');
Route::get('/product-checkout', function () {
    return view('product-checkout');
})->name('product-checkout');
Route::get('/product-description', function () {
    return view('product-description');
})->name('product-description');
Route::get('/product-healthcare', function () {
    return view('product-healthcare');
})->name('product-healthcare');
Route::get('/accounts', function () {
    return view('accounts');
})->name('accounts');
Route::get('/available-timings', function () {
    return view('available-timings');
})->name('available-timings');
Route::get('/dependent', function () {
    return view('dependent');
})->name('dependent');


Route::get('/index-4', function () {
    return view('index-4');
})->name('index-4');
Route::get('/index-8', function () {
    return view('index-8');
})->name('index-8');

Route::get('/index-6', 'IndexController@index' )->name('index-6');

Route::get('/index-7', function () {
    return view('index-7');
})->name('index-7');
Route::get('/medical-details', function () {
    return view('medical-details');
})->name('medical-details');

Route::get('/medical-records', function () {
    return view('pacients.medical-records');
})->name('medical-records');


Route::get('/orders-list', function () {
    return view('orders-list');
})->name('orders-list');
Route::get('/patient-accounts', function () {
    return view('pacients.patient-accounts');
})->name('patient-accounts');
Route::get('/patient-register-step1', function () {
    return view('patient-register-step1');
})->name('patient-register-step1');
Route::get('/patient-register-step2', function () {
    return view('patient-register-step2');
})->name('patient-register-step2');
Route::get('/patient-register-step3', function () {
    return view('patient-register-step3');
})->name('patient-register-step3');
Route::get('/patient-register-step4', function () {
    return view('patient-register-step4');
})->name('patient-register-step4');
Route::get('/patient-register-step5', function () {
    return view('patient-register-step5');
})->name('patient-register-step5');

Route::get('/pharmacy-register', function () {
    return view('pharmacy-register');
})->name('pharmacy-register');
Route::get('/pharmacy-register-step1', function () {
    return view('pharmacy-register-step1');
})->name('pharmacy-register-step1');
Route::get('/pharmacy-register-step2', function () {
    return view('pharmacy-register-step2');
})->name('pharmacy-register-step2');
Route::get('/pharmacy-register-step3', function () {
    return view('pharmacy-register-step3');
})->name('pharmacy-register-step3');

/*****************ADMIN ROUTES*******************/
Route::Group(['prefix' => 'admin'], function () { 
    
    Route::get('/index-admin', 'HomeController@index')->name('index-admin');

    Route::get('/appointment-list', function () {
        return view('admin.appointment-list');
        })->name('appointment-list');

        Route::get('/especialidades',  'AdminController@especialidades' )->name('especialidades');

        Route::post('/guardar-especialidad',  'AdminController@guardar_especialidad' )->name('guardar-especialidad');

        Route::post('/editar-especialidad',  'AdminController@edit_especialidad' )->name('editar-especialidad');

        Route::post('/eliminar-especialidad',  'AdminController@destroy_especialidad' )->name('eliminar-especialidad');
        
        Route::post('/cambiar-status',  'AdminController@change_status' )->name('cambiar-status');

        Route::get('/lista-doctor', 'AdminController@doctor_list')->name('lista-doctor');

        Route::get('/profile', function () {
            return view('admin.profile');
            })->name('profile');

        Route::get('/perfil-doctor/{id}', 'AdminController@doctor_profile')->name('/perfil-doctor/{id}');

        Route::get('/lista-pacientes','AdminController@patient_list')->name('lista-pacientes');

        Route::get('/lista-clinicas','AdminController@clinic_list')->name('lista-clinicas');

        Route::get('/usuarios','UserController@index')->name('usuarios');
        
        Route::get('/diagnosticos','AdminController@diagnostics')->name('diagnosticos');

        Route::post('/save-diagnostic','AdminController@save_diagnostic')->name('save-diagnostic');


        Route::get('/reviews', function () {
        return view('admin.reviews');
        })->name('reviews');
        Route::get('/transactions-list', function () {
        return view('admin.transactions-list');
        })->name('transactions-list');
        Route::get('/settings', function () {
        return view('admin.settings');
        })->name('settings');
        Route::get('/invoice-report', function () {
        return view('admin.invoice-report');
        })->name('invoice-report');
        
        Route::get('/login', function () {
        return view('admin.login');
        })->name('login-admin');
        
        Route::get('/registro', 'UserController@register')->name('registro');
        
        Route::post('/guardar', 'UserController@store')->name('guardar');
        
        Route::get('/forgot-password', function () {
        return view('admin.forgot-password');
        })->name('forgot-password');
        Route::get('/lock-screen', function () {
        return view('admin.lock-screen');
        })->name('lock-screen');
        Route::get('/error-404', function () {
        return view('admin.error-404');
        })->name('error-404');
        Route::get('/error-500', function () {
        return view('admin.error-500');
        })->name('error-500');
        Route::get('/blank-page', function () {
        return view('admin.blank-page');
        })->name('blank-page');
        Route::get('/components', function () {
        return view('admin.components');
        })->name('components');
        Route::get('/form-basic-inputs', function () {
        return view('admin.form-basic-inputs');
        })->name('form-basic');
        Route::get('/form-input-groups', function () {
        return view('admin.form-input-groups');
        })->name('form-inputs');
        Route::get('/form-horizontal', function () {
        return view('admin.form-horizontal');
        })->name('form-horizontal');
        Route::get('/form-vertical', function () {
        return view('admin.form-vertical');
        })->name('form-vertical');
        Route::get('/form-mask', function () {
        return view('admin.form-mask');
        })->name('form-mask');
        Route::get('/form-validation', function () {
        return view('admin.form-validation');
        })->name('form-validation');
        Route::get('/tables-basic', function () {
        return view('admin.tables-basic');
        })->name('tables-basic');
        Route::get('/data-tables', function () {
        return view('admin.data-tables');
        })->name('data-tables');
        Route::get('/invoice', function () {
        return view('invoice');
        })->name('invoice');
        Route::get('/calendar', function () {
        return view('admin.calendar');
        })->name('calendar');
        Route::get('/blog', function () {
        return view('admin.blog');
        })->name('blog');
        Route::get('/blog-details', function () {
        return view('admin.blog-details');
        })->name('blog-details');
        Route::get('/add-blog', function () {
        return view('admin.add-blog');
        })->name('add-blog');
        Route::get('/edit-blog', function () {
        return view('admin.edit-blog');
        })->name('edit-blog');
        Route::get('/product-list', function () {
        return view('admin.product-list');
        })->name('product-list');
        Route::get('/pharmacy-list', function () {
        return view('admin.pharmacy-list');
        })->name('pharmacy-list');
        Route::get('/pending-blog', function () {
            return view('admin.pending-blog');
            })->name('pending-blog');
            
            
        Route::get('/roles', 'RoleController@index' )->name('roles');
        Route::get('/roles/editar', 'RoleController@edit' )->name('roles/editar');
        
        Route::post('/roles/guardar', 'RoleController@store' )->name('roles/guardar');
       
    });
/********************ADMIN ROUTES END******************************/

/********************ROLE ROUTES ******************************/

Route::resource('roles',RoleController::class)->names('admin.roles');

/********************ROLE ROUTES END******************************/

/********************PHARMACY ADMIN********************************/
Route::Group(['prefix' => 'pharmacy-admin'], function () { 
    

    Route::get('/index_pharmacy_admin', function () {
        return view('pharmacy-admin.index_pharmacy_admin');
        })->name('pagee');

    Route::get('/products', function () {
    return view('pharmacy-admin.products');
    })->name('products');
    Route::get('/add-product', function () {
    return view('pharmacy-admin.add-product');
    })->name('add-product');
    Route::get('/outstock', function () {
    return view('pharmacy-admin.outstock');
    })->name('outstock');
    Route::get('/expired', function () {
    return view('pharmacy-admin.expired');
    })->name('expired');
    Route::get('/categories', function () {
    return view('pharmacy-admin.categories');
    })->name('categories');
    Route::get('/purchase', function () {
    return view('pharmacy-admin.purchase');
    })->name('purchase');
    Route::get('/add-purchase', function () {
    return view('pharmacy-admin.add-purchase');
    })->name('add-purchase');
    Route::get('/order', function () {
    return view('pharmacy-admin.order');
    })->name('order');
    Route::get('/sales', function () {
    return view('pharmacy-admin.sales');
    })->name('sales');
    Route::get('/supplier', function () {
    return view('pharmacy-admin.supplier');
    })->name('supplier');
    Route::get('/add-supplier', function () {
    return view('pharmacy-admin.add-supplier');
    })->name('add-supplier');
    Route::get('/transactions-list', function () {
    return view('pharmacy-admin.transactions-list');
    })->name('transactions-list');
    Route::get('/invoice-report', function () {
    return view('pharmacy-admin.invoice-report');
    })->name('invoice-report');
    Route::get('/profile', function () {
    return view('pharmacy-admin.profile');
    })->name('profile');
    Route::get('/settings', function () {
    return view('pharmacy-admin.settings');
    })->name('settings');
    Route::get('/customer-orders', function () {
    return view('pharmacy-admin.customer-orders');
    })->name('customer-orders');
    Route::get('/edit-product', function () {
    return view('pharmacy-admin.edit-product');
    })->name('edit-product');
    Route::get('/edit-purchase', function () {
    return view('pharmacy-admin.edit-purchase');
    })->name('edit-purchase');
    Route::get('/edit-supplier', function () {
    return view('pharmacy-admin.edit-supplier');
    })->name('edit-supplier');
    Route::get('/invoice', function () {
    return view('pharmacy-admin.invoice');
    })->name('invoice');
    Route::get('/product-list', function () {
    return view('pharmacy-admin.product-list');
    })->name('product-list');
    });





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
