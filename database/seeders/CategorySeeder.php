<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Food',
            'Groceries',
            'Transportation',
            'Utilities',
            'Entertainment',
            'Shopping',
            'Healthcare',
            'Education',
            'Travel',
            'Rent',
            'Insurance',
            'Gifts',
            'Donations',
            'Personal Care',
            'Home Improvement',
            'Debt',
            'Investments',
            'Taxes',
            'Savings',
            'Other',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
