<?php
namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder {
    public function run(): void {
        Listing::factory()->count(25)->create();
    }

    
}
