<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Gestor;

class GestorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $gestor = array(
            "name" => "Pio Baroja Ortiz",
            "email" => "pbaroja@dhl.com",
            "pwd" => "1234",
            "horario" => "Mañana",
        );
        self::crear_gestor($gestor);

        $gestor = array(
            "name" => "Samuel Piripiri Lago",
            "email" => "spiripiri@dhl.com",
            "pwd" => "1234",
            "horario" => "Tarde",
        );
        self::crear_gestor($gestor);

        $gestor = array(
            "name" => "Alej Andro L Hago",
            "email" => "aandro@dhl.com",
            "pwd" => "1234",
            "horario" => "Mañana",
        );
        self::crear_gestor($gestor);

        $gestor = array(
            "name" => "Pe Dro C Ruth",
            "email" => "pdro@dhl.com",
            "pwd" => "1234",
            "horario" => "Tarde",
        );
        self::crear_gestor($gestor);



    }

    public function crear_gestor($gestor_dict){
        $gestor_role = Role::where('name', '=', 'gestor')->firstOrFail();

        // New user
        $user = new User();
        $user->name = $gestor_dict['name'];
        $user->email = $gestor_dict['email'];
        $user->password = Hash::make($gestor_dict['pwd']);

        $gestor_role->users()->save($user);
        $user->role()->associate($gestor_role)->save();
        // new gestor
        $gestor = new Gestor();
        $gestor->horario = $gestor_dict['horario'];

        $user->gestor()->save($gestor);
        $gestor->user()->associate($user)->save();
    }
}
