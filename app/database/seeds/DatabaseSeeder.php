<?php

class DatabaseSeeder extends Seeder {

    protected $tables = [
        'users', 'talks'
    ];

    protected $seeders = [
        'UsersTableSeeder',
        'TalksTableSeeder'
    ];
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->cleanDatabase();

        foreach ($this->seeders as $seedClass)
        {
            $this->call($seedClass);
        }

	}

    /**
     * Datenbank Reset, vor einem neuen Seed
     */

    public function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

}
