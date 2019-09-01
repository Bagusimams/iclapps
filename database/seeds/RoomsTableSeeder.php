<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for ($j = 8; $j <=9 ; $j++) { 
    		for ($i = 1; $i <= 20; $i++) { 
            	DB::table('rooms')->insert(array(
                    array('name' => 'GKU03.0' . $j . '.0' . $i, 'isBooked' => 0),
                ));
    		}
		}

        DB::table('rooms')->insert(array(
            array('name' => 'Auditorium', 'isBooked' => 0),
            array('name' => 'Assembly Room', 'isBooked' => 0),
        ));

        DB::table('schools')->insert(array(
            array('name' => 'FEB'),
            array('name' => 'FRI'),
            array('name' => 'FTE'),
            array('name' => 'FIF'),
            array('name' => 'FKB'),
            array('name' => 'FIK'),
        ));

        DB::table('majors')->insert(array(
            array('name' => 'S1 INTERNATIONAL ICT BUSINESS', 'school_id' => 1),
            array('name' => 'S1 INDUSTRIAL ENGINEERING', 'school_id' => 2),
            array('name' => 'S1 INFORMATION SYSTEM', 'school_id' => 2),
            array('name' => 'S1 TELECOMMUNICATION ENGINEERING', 'school_id' => 3),
            array('name' => 'S1 COMPUTING', 'school_id' => 4),
            array('name' => 'S1 BUSINESS ADMINISTRATION', 'school_id' => 5),
            array('name' => 'S1 COMMUNICATION SCIENCE', 'school_id' => 5),
            array('name' => 'S1 ELECTRICAL ENGINEERING', 'school_id' => 3),
            array('name' => 'S1 VISUAL & COMMUNICATION DESIGN', 'school_id' => 6),
        ));

        DB::table('university_exchanges')->insert(array(
            array('name' => 'Kumoh National Institute of Technology, South Korea'),
            array('name' => 'SolBridge International School of Business, South Korea'),
            array('name' => 'Inha University, South Korea'),
        ));
    }
}