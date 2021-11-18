<?php

namespace Tests\Unit;

use App\Http\Traits\SyncImage;
use App\Models\Image;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use SyncImage;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {


        $tag = Role::create([
            "guard_name" => "web",
            "name" => "Sponsor2"
        ]);

        $this->syncImage("Lookup",$tag);

        $this->assertTrue(true);
    }


}
