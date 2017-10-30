<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SongTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @group song
     * @return void
     */
    public function testExample()
    {
        $data = $this->getData();
        // Create a new song and verify response
        $this->post('/song', $data)
          ->assertJson(['created' => true]);

        $data = $this->getData(['songname' => 'jane']);
        // Update the song just created (id = 9999)
        $this->put('/song/9999', $data)
          ->assertJson(['updated' => true]);

        // Obtain data of modified song
        // verify the correct name
        $this->get('song/9999')->assertJson(['songname' => 'jane']);

        // Delete the song
        $this->delete('song/9999')->assertJson(['deleted' => true]);
        ;
    }

    public function getData($custom = array())
    {
        $data = [
            'id' => 9999,
            'songname'      => 'joe',
            'url'     => 'spotify:track:xyz999',
            'artistid'  => 123459876,
            'artistname' => 'Carlitos',
            'albumid' => 234123,
            'albumname' => 'Bambi'
            ];
        $data = array_merge($data, $custom);
        return $data;
    }
}
