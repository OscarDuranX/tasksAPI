<?php

use App\Tag;
use App\Task;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $faker = Faker\Factory::create();

        $this->seedTasks($faker);
        $this->seedTags($faker);
        $this->seedTaskTag($faker);
        //$this->seedUser($faker);

        Model::reguard();
    }

    private function seedTasks($faker)
    {
        foreach (range(0,100) as $number) {
            $task= new Task();

            $task->name = $faker->sentence;
            $task->priority= $faker->randomDigit;
            $task->done =$faker->boolean;


            $task->save();
            
        }
    }

    private function seedTags($faker)
    {
        foreach (range(0,100) as $number) {
            $tag= new Tag();

            $tag->title = $faker->word;
           // $tag->onoff =$faker->boolean;

            $tag->save();

        }
        
    }

    private function seedTaskTag($faker)
    {
        foreach (range(0,100) as $item)
        {
            DB::table('task_tag')->insert([
                'task_id' => $faker->randomDigit,
                'tag_id' => $faker->randomDigit
            ]);
        }
    }

    private function seedUser($faker){

        $user= new User();

        $user->name= $faker->word;
        $user->email= $faker->email;
        $user->password= "$2y$10$9/ADUpitr.IOcU8OvUoBkuDHjrVomxWg3iDME13eZtwnKynJy5sXK";
        $user->api_token= "0886cb03e9d7bf30ac574e8d5648a43f1dcb52cd";
        $user->remember_token=  "tSkMqlvSbV";

        $user->save();

    }

}
