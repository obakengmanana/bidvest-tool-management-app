<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Tool;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Populate categories
        $categories = [
            ['name' => 'Hand Tools', 'description' => 'Various hand tools used for manual operations.'],
            ['name' => 'Power Tools', 'description' => 'Electrically powered tools for various tasks.'],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create($categoryData);

            // Populate tools for each category
            if ($category->name === 'Hand Tools') {
                $tools = [
                    ['tool_name' => 'Screwdriver', 'description' => 'Used for turning screws.'],
                    ['tool_name' => 'Hammer', 'description' => 'For driving nails, fitting parts, and breaking objects.'],
                    ['tool_name' => 'Wrench', 'description' => 'For tightening or loosening nuts and bolts.'],
                    ['tool_name' => 'Pliers', 'description' => 'Gripping and manipulating objects.'],
                    ['tool_name' => 'Chisel', 'description' => 'Cutting and shaping wood, metal, or stone.'],
                    ['tool_name' => 'Saw', 'description' => 'Cutting various materials such as wood, metal, and plastic.'],
                    ['tool_name' => 'Level', 'description' => 'Ensures horizontal or vertical alignment.'],
                    ['tool_name' => 'Tape Measure', 'description' => 'For measuring distances.'],
                    ['tool_name' => 'Clamps', 'description' => 'Holds objects securely in place.'],
                    ['tool_name' => 'Files', 'description' => 'For smoothing or shaping metal, wood, or plastic.'],
                    ['tool_name' => 'Utility Knife', 'description' => 'Cutting various materials with precision.'],
                    ['tool_name' => 'Vise', 'description' => 'Holding workpieces securely during operations.'],
                    ['tool_name' => 'Hand Plane', 'description' => 'Smoothing wood surfaces.'],
                    ['tool_name' => 'Scissors', 'description' => 'Cutting paper, fabric, or other materials.'],
                    ['tool_name' => 'Awl', 'description' => 'Making small holes in wood or leather.'],
                ];
            } elseif ($category->name === 'Power Tools') {
                $tools = [
                    ['tool_name' => 'Drill', 'description' => 'Making holes in various materials.'],
                    ['tool_name' => 'Circular Saw', 'description' => 'Cutting wood, plastic, or metal with a rotating blade.'],
                    ['tool_name' => 'Jigsaw', 'description' => 'Cutting curves and intricate shapes in wood, metal, or plastic.'],
                    ['tool_name' => 'Angle Grinder', 'description' => 'Cutting, grinding, and polishing metal or stone.'],
                    ['tool_name' => 'Power Sander', 'description' => 'Smoothing wood surfaces using abrasives.'],
                    ['tool_name' => 'Router', 'description' => 'Hollowing out an area in wood or plastic.'],
                    ['tool_name' => 'Power Screwdriver', 'description' => 'Driving screws with power assistance.'],
                    ['tool_name' => 'Impact Driver', 'description' => 'Driving screws quickly with high torque.'],
                    ['tool_name' => 'Rotary Tool (Dremel)', 'description' => 'Versatile tool for cutting, grinding, polishing, and engraving.'],
                    ['tool_name' => 'Belt Sander', 'description' => 'Smoothing larger surfaces quickly.'],
                    ['tool_name' => 'Planer', 'description' => 'Removing material from wood to achieve a desired thickness.'],
                    ['tool_name' => 'Reciprocating Saw (Sawzall)', 'description' => 'Cutting through wood, metal, and plastic with a reciprocating motion.'],
                    ['tool_name' => 'Nail Gun', 'description' => 'Driving nails into wood or other materials with compressed air or electricity.'],
                    ['tool_name' => 'Heat Gun', 'description' => 'Generating hot air for tasks like paint stripping or thawing pipes.'],
                    ['tool_name' => 'Bench Grinder', 'description' => 'Grinding, sharpening, and shaping metal objects.'],
                ];
            }

            foreach ($tools as $toolData) {
                $category->tools()->create($toolData);
            }
        }
    }
}
