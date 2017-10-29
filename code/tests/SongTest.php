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
        // Creamos un nuevo usuario y verificamos la respuesta
        $this->post('/song', $data)
            ->seeJsonEquals(['created' => true]);

        $data = $this->getData(['songname' => 'jane']);
        // Actualizamos al usuario recien creado (id = 1)
        $this->put('/song/1', $data)
            ->seeJsonEquals(['updated' => true]);

        // Obtenemos los datos de dicho usuario modificado
        // y verificamos que el nombre sea el correcto
        $this->get('song/1')->seeJson(['songname' => 'jane']);

        // Eliminamos al usuario
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
