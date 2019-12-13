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
            array('name' => 'EKONOMI DAN BISNIS'),
            array('name' => 'INDUSTRI KREATIF'),
            array('name' => 'INFORMATIKA'),
            array('name' => 'KOMUNIKASI DAN BISNIS'),
            array('name' => 'REKAYASA INDUSTRI'),
            array('name' => 'TEKNIK ELEKTRO'),
        ));

        DB::table('majors')->insert(array(
            array('name' => 'S1 International ICT Business', 'school_id' => 1),
            array('name' => 'S1 Desain Interior', 'school_id' => 2),
            array('name' => 'S1 Desain Komunikasi Visual  (International Class)', 'school_id' => 2),
            array('name' => 'S1 Teknik Informatika (International Class)', 'school_id' => 3),
            array('name' => 'S1 Administrasi Bisnis (International Class)', 'school_id' => 4),
            array('name' => 'S1 Ilmu Komunikasi (International Class)', 'school_id' => 4),
            array('name' => 'S1 Sistem Informasi (International Class)', 'school_id' => 5),
            array('name' => 'S1 Teknik Industri (Internasional Class)', 'school_id' => 5),
            array('name' => 'S1 Teknik Elektro  (International Class)', 'school_id' => 6),
            array('name' => 'S1 Teknik Telekomunikasi (International Class)', 'school_id' => 6),
        ));

        DB::table('university_exchanges')->insert(array(
            array('name' => 'Kumoh National Institute of Technology, South Korea'),
            array('name' => 'SolBridge International School of Business, South Korea'),
            array('name' => 'Inha University, South Korea'),
        ));

        DB::table('variables')->insert(array(
            array('display_name' => 'EPRT Student Exchange', 'name' => 'eprt_exc', 'score' => 500),
            array('display_name' => 'EPRT Double Degree', 'name' => 'eprt_dd', 'score' => 0),
            array('display_name' => 'EPRT Winter School', 'name' => 'eprt_winter', 'score' => 0),
            array('display_name' => 'EPRT Summer School', 'name' => 'eprt_summer', 'score' => 0),
            array('display_name' => 'ITP Student Exchange', 'name' => 'itp_exc', 'score' => 0),
            array('display_name' => 'ITP Double Degree', 'name' => 'itp_dd', 'score' => 0),
            array('display_name' => 'ITP Winter School', 'name' => 'itp_winter', 'score' => 0),
            array('display_name' => 'ITP Summer School', 'name' => 'itp_summer', 'score' => 0),
            array('display_name' => 'IBT Student Exchange', 'name' => 'ibt_exc', 'score' => 0),
            array('display_name' => 'IBT Double Degree', 'name' => 'ibt_dd', 'score' => 79),
            array('display_name' => 'IBT Winter School', 'name' => 'ibt_winter', 'score' => 0),
            array('display_name' => 'IBT Summer School', 'name' => 'ibt_summer', 'score' => 0),
            array('display_name' => 'IELTS Student Exchange', 'name' => 'ielts_exc', 'score' => 0),
            array('display_name' => 'IELTS Double Degree', 'name' => 'ielts_dd', 'score' => 6),
            array('display_name' => 'IELTS Winter School', 'name' => 'ielts_winter', 'score' => 0),
            array('display_name' => 'IELTS Summer School', 'name' => 'ielts_summer', 'score' => 0),
            array('display_name' => 'GPA Student Exchange for Engineering Student', 'name' => 'gpa_teknik_exc', 'score' => 2.75),
            array('display_name' => 'GPA Double Degree for Engineering Student', 'name' => 'gpa_teknik_dd', 'score' => 3),
            array('display_name' => 'GPA Winter School for Engineering Student', 'name' => 'gpa_teknik_winter', 'score' => 0),
            array('display_name' => 'GPA Summer School for Engineering Student', 'name' => 'gpa_teknik_summer', 'score' => 0),
            array('display_name' => 'GPA Student Exchange for Non Engineering Student', 'name' => 'gpa_non_exc', 'score' => 3),
            array('display_name' => 'GPA Double Degree for Non Engineering Student', 'name' => 'gpa_non_dd', 'score' => 3),
            array('display_name' => 'GPA Winter School for Non Engineering Student', 'name' => 'gpa_non_winter', 'score' => 0),
            array('display_name' => 'GPA Summer School for Non Engineering Student', 'name' => 'gpa_non_summer', 'score' => 0),
        ));
    }
}