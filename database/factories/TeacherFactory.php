<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' =>$this->faker->name(),
            'email'=>$this->faker->unique()->safeEmail(),
            'password'=>'password',
            'phone'=>'09401841526',
            'address' =>'Myeik',
            'gender'=>'female',
            'age'=>'26',
            'major_subject'=>'',
            'grade' =>'',
            'designation'=>'',
            'class_id'=>factory('App\Models\Classes'),
            'role_id'=>factory('App\Models\Role'),
            'certificates_id'=>1,//Need to Modify
        ];//inserting sample data into database
    }
}
