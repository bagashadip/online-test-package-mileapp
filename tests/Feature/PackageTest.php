<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class PackageTest extends TestCase
{

    public function testPost(){
        $path = storage_path() . "/package/post.json";
        $json = json_decode(File::get($path), true);
        $response = $this->call('POST', '/api/package', $json);
        $this->assertEquals(200, $response->status());

        $response->dump();
    }

    public function testGetAll(){
        $response = $this->call('GET', '/api/package');
        $this->assertEquals(200, $response->status());

        // $response->dump();
    }

    public function testGetById(){
        $transcId = "20e51287-dec3-4cee-b8fb-85192ef679ca";
        $response = $this->call('GET', '/api/package/' . $transcId);
        $this->assertEquals(200, $response->status());

        // $response->dump();
    }

    public function testUpdatePut(){
        $transcId = "20e51287-dec3-4cee-b8fb-85192ef679ca";
        $path = storage_path() . "/package/put.json";
        $json = json_decode(File::get($path), true);
        $response = $this->call('PUT', '/api/package/' . $transcId, $json);
        $this->assertEquals(200, $response->status());

        $response->dump();
    }

    public function testUpdatePatch(){
        $transcId = "20e51287-dec3-4cee-b8fb-85192ef679ca";
        $path = storage_path() . "/package/patch.json";
        $json = json_decode(File::get($path), true);
        $response = $this->call('PATCH', '/api/package/' . $transcId, $json);
        $this->assertEquals(200, $response->status());

        $response->dump();
    }

    public function testDelete(){
        $transcId = "20e51287-dec3-4cee-b8fb-85192ef679ca";
        $response = $this->call('DELETE', '/api/package/' . $transcId);
        $this->assertEquals(200, $response->status());

        $response->dump();
    }
}
