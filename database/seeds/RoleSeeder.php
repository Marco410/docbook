<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
use App\Doctor;
use App\Alergia;
use App\Vacuna;
use App\Medicamento;
use App\Paciente;
use App\Especialidad;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin','guard_name'=>'web']);
        $role2 = Role::create(['name' => 'Colaborador','guard_name'=>'web']);
        $role3 = Role::create(['name' => 'Doctor','guard_name' => 'doctors']);
        $role4 = Role::create(['name' => 'Paciente','guard_name'=>'pacientes']);
        $role5 = Role::create(['name' => 'Secretaria','guard_name'=>'web']);

        Permission::create(['name' => 'admin.index-admin','description' => 'Ver Panel Inicio'])->syncRoles([$role1,$role2]);
        
        Permission::create(['name' => 'admin.usuarios','description' => 'Ver Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.edit','description' => 'Editar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.destroy','description' => 'Eliminar Usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.registro','description' => 'Registrar Usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.doctors.index','description' => 'Ver Doctores'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.doctors.status','description' => 'Cambiar Estatus Doctores'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.pacients.index','description' => 'Ver Pacientes'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.transactions.index','description' => 'Ver Transacciones'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.transactions.destroy','description' => 'Eliminar Transacciones'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.specialities.index','description' => 'Ver Especialidades'])->syncRoles([$role1,$role2]); 
        Permission::create(['name' => 'admin.specialities.create','description' => 'Crear Especialidades'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.specialities.edit','description' => 'Editar Especialidades'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.specialities.destroy','description' => 'Eliminar Especialidades'])->syncRoles([$role1]);


        User::create([
            'nombre' => "Pixel",
            'apellido_p' => "Art",
            'apellido_m' => "Web",
            'email' => "admin@gmail.com",
            'password' => bcrypt('1234567890'),
            'activo' => 1
        ])->assignRole('Admin');

        Doctor::create([
            'nombre' => "Doctor",
            'apellido_p' => "Pixel",
            'apellido_m' => "Art",
            'telefono' => "4434012693",
            'foto' => "doctor_perfil/dr-2.png",
            'email' => "doctor@gmail.com",
            'password' => bcrypt('1234567890'),
            'primera' => "700",
            'seguimiento' => "500",
            'status' => 1
        ])->assignRole('Doctor');

        Paciente::create([
            'nombre' => "Paciente",
            'apellido_p' => "Pixel",
            'apellido_m' => "Art",
            'email' => "paciente@gmail.com",
            'password' => bcrypt('1234567890'),
            'fecha_nacimiento' => '1998-26-07',
            'status' => 1
        ])->assignRole('Paciente');


        Especialidad::create([
            'nombre' => 'Dentista',
            'imagen' => 'imagen',
        ]);

        Alergia::create([
            'alergia' => 'Polen'
        ]);

        Alergia::create([
            'alergia' => 'Polvo'
        ]);

        Vacuna::create([
            'vacuna' => 'COVID'
        ]);

        Vacuna::create([
            'vacuna' => 'Influenza'
        ]);

        Medicamento::create([
            'medicamento' => 'Paracetamol'
        ]);

        Medicamento::create([
            'medicamento' => 'Aspirina'
        ]);

        

        DB::table('doctor_has_especialidad')->insert([
            'especialidad_id' => 1,
            'doctor_id' => 1
        ]);

        DB::table('pacientes_has_doctors')->insert([
            'paciente_id' => 1,
            'doctor_id' => 1
        ]);
        

    }
}
