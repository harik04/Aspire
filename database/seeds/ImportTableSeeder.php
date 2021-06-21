<?php

use Illuminate\Database\Seeder;

class ImportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		
		//$sql = public_path('data.sql');
		$sql = database_path('laravel1.sql');
        $db_bin = "E:\Ampps\mysql\bin"; 
		 
        $db = [
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'database' => env('DB_DATABASE')
        ];
  
        //exec("mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database {$db['database']} < $sql");
		exec("{$db_bin}\mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database {$db['database']} < $sql");
		
        \Log::info('SQL Import Done');
    }
}

//php artisan migrate --path=/database/migrations/2021_06_21_064817_loanapproved.php


