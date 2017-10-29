<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SongTest extends TestCase
{

    use DatabaseMigrations;

    public function testSongCreate()
    {
        $data = $this->getData();
        // Create a new song and verify response
        $this->post('/song', $data)
            ->seeJsonEquals(['created' => true]);

        $data = $this->getData(['songname' => 'jane']);
        // Update the song just created (id = 1234567890)
        $this->put('/song/1234567890', $data)
            ->seeJsonEquals(['updated' => true]);

        // Obtain data of modified song
        // verify the correct name
        $this->get('song/1')->seeJson(['songname' => 'jane']);

        // Delete the song
        $this->delete('song/1234567890')->seeJson(['deleted' => true]);
    }

    public function getData($custom = array())
    {
        $data = [
            'id' => 1234567890,
            'songname'      => 'joe',
            'url'     => 'spotify:track:xyz',
            'artistid'  => 123459876,
            'artistname' => 'Carlitos',
            'albumid' => 234123,
            'albumname' => 'Bambi'
            ];
        $data = array_merge($data, $custom);
        return $data;
    }
}
