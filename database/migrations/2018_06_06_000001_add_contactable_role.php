<?php

use Illuminate\Database\Migrations\Migration;

class AddContactableRole extends Migration
{
    /**
     * Writing this as plain query builder so it'll run despite any changes made
     * to the models. This is a migration, not a seed, since it needs to run in
     * production, and it makes a structural change to the app's data layer.
     */
    public function up()
    {
        if (DB::table('roles')->where('name', 'contactable')->count() > 0) {
            DB::table('roles')
                ->where('name', 'contactable')
                ->update([
                    'deleted_at' => null
                ]);
        } else {
            DB::table('roles')->insert([
                'name' => 'contactable'
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::table('roles')
            ->where('name', 'contactable')
            ->update([
                'deleted_at' => 'NOW()'
            ]);
    }
}
