<?php

use Illuminate\Database\Seeder;

class InventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('inventories')->insert(array(
            array('name' => 'Spidol', 'showOnInvBookingMenu' => 1, 'isConditionGood' => 1),
            array('name' => 'Eraser', 'showOnInvBookingMenu' => 1, 'isConditionGood' => 1),
            array('name' => 'Table', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'Chair', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'Projector', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'Display', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'AC', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'TV', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'Dispenser', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'Watch', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'VGA cable', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'HDMI cable', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'AC remote', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'TV remote', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'Projector remote', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'Wifi', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'RFID', 'showOnInvBookingMenu' => 0, 'isConditionGood' => 1),
            array('name' => 'HDMI to VGA conventer', 'showOnInvBookingMenu' => 1, 'isConditionGood' => 1),
            array('name' => 'Mini Display Port to VGA conventer', 'showOnInvBookingMenu' => 1, 'isConditionGood' => 1),
            array('name' => 'Mini Display Port to HDMI conventer', 'showOnInvBookingMenu' => 1, 'isConditionGood' => 1),
            array('name' => 'VGA cable', 'showOnInvBookingMenu' => 1, 'isConditionGood' => 1),
            array('name' => 'HDMI cable', 'showOnInvBookingMenu' => 1, 'isConditionGood' => 1),
            array('name' => 'Portable speaker', 'showOnInvBookingMenu' => 1, 'isConditionGood' => 1),
            array('name' => 'Wall plug conventer', 'showOnInvBookingMenu' => 1, 'isConditionGood' => 1),
        ));
    }
}
