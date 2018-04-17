<?php

use PHPUnit\Framework\TestCase;

use App\Product\Punctuation;
use App\Product\Create;

class ExampleTest extends TestCase
{
	/**
	 * @test
	 */
	public function create_new_product()
	{
		$client = new Predis\Client();

		// En cada ejecución de este test, se borra todo lo que hubiese en Redis.
		// Obviamente no es una buena práctica para testeo, pero facilita ahora el trabajo
		// del alumno.
		$client->flushall();

		$product = new Create($client);
		$product->create('Nexus 5');
		$product->create('LG Screen u4575');
		$product->create('Raspberry Pi');
		$product->create('Headphones Samsung little');


		$Nexus5Punctuation = new Punctuation($client, 'Nexus 5');

		// Puesto que Nexus 5 no ha recibido todavía ninguna puntuación, su puntuación es NUL
		$this->assertNull($Nexus5Punctuation->get());


		// Añadimos una valoración de 10
		$Nexus5Punctuation->set(10);
		// Entonces la valoración de Nexus 5 es 10
		$this->assertEquals(10, $Nexus5Punctuation->get());


		// Añadimos una valoración de 10
		$Nexus5Punctuation->set(8);
		// Entonces la valoración de Neux 5 es de 9 (una media de las valoraciones)
		// calculado como: (10+8)/2 = 18/2 ) = 9
		$this->assertEquals(9, $Nexus5Punctuation->get());

		// Añadimos una valoración de 5
		$Nexus5Punctuation->set(5);
		// calculado como: (10+8+7)/3 = 25/3 ) = 8.3
		// como la función get tiene que devolver un entero, redondeamos siempre hacia abajo (véase función floor)
		$this->assertEquals(7, $Nexus5Punctuation->get());
	}
}
