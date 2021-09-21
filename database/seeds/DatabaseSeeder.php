<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RoleSeeder::class);
        $this->call(ActionPlanSeeder::class);
        $this->call(CourseTypeSeeder::class);
        $this->call(GroupTypeSeeder::class);
        $this->call(MeetingTypeSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(GroupUserSeeder::class);
        $this->call(MeetingSeeder::class);
        $this->call(MeetingStudentSeeder::class);
        $this->call(MeetingUserSeeder::class);
        $this->call(FeedbackSeeder::class);

        $this->call(AreaSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(UfcdSeeder::class);
    }
}
