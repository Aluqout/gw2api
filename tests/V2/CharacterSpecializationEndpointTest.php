<?php

namespace V2;

use TestCase;

class SpecializationEquipmentEndpointTest extends TestCase {
    public function test() {
        $endpoint = $this->api()->characters('test')->specializations('char');

        $this->assertEndpointIsAuthenticated( $endpoint );
        $this->assertEndpointUrl( 'v2/characters/char/specializations', $endpoint );

        $this->mockResponse('{"specializations":{"pve":[{"id":41,"traits":[232,214,226]}]}}');
        $this->assertEquals(41, $endpoint->get()->pve[0]->id);
    }

    public function testCharacterNameEncoding() {
        $endpoint = $this->api()->characters('test')->equipment('Character Namè');

        $this->assertEndpointUrl( 'v2/characters/Character%20Nam%C3%A8/equipment', $endpoint );
    }
}
