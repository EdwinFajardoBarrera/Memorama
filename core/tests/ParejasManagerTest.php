<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ParejasManagerTest extends TestCase
{

  public function getAllParejasProvider()
  {
    return [
      'test positivo' => [array('El 1' , 'El 2')],
      'test negativo' => [null]
    ];
  }

  /**
   * @dataProvider getAllParejasProvider
   */
  public function testGetAllParejas($resultado)
  {
    $dbManagerMock = $this->getMockBuilder(ParejasManager::class)
      ->setMethods(['getAllParejas'])
      ->disableOriginalConstructor()
      ->getMock();

    $dbManagerMock->expects($this->exactly(1))
      ->method('getAllParejas')
      ->willReturn($resultado);

    if ($resultado != null) {
      $this->assertIsArray($dbManagerMock->getAllParejas());
    } else {
      $this->assertIsNotArray($dbManagerMock->getAllParejas());
    }
  }

}