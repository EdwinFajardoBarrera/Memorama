<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MateriasManagerTest extends TestCase
{

  public function insertQueryProvider()
   {
     return [
       'test positivo' => [true, MateriasManager::class],
       'test negativo' => [false, null]
    ];
   }
  /**
   * @dataProvider insertQueryProvider
   */
  public function testgetInstance($esInstancia, $resultado)
  {
    $MatManagerMock = $this->getMockBuilder(MateriasManager::class)
    ->setMethods(['getInstance'])
    ->disableOriginalConstructor()
    ->getMock();

    $MatManagerMock->expects($this->exactly(1))
    ->method('getInstance')
    ->willReturn($resultado);

    if ($esInstancia) {
      $this->assertEquals($resultado, $MatManagerMock->getInstance());
    } else {
      $this->assertEquals(null, $MatManagerMock->getInstance());
    }
  }


  public function getMateriaProvider()
  {
    return [
      'test positivo' => [1, "Matematicas"],
      'test negativo' => [5, "Tabla de materias esta vacia"]
    ];
  }

  /**
   * @dataProvider getMateriaProvider
   */
  public function testGetMateria($idMateria, $resultado)
  {
    $MatManagerMock = $this->getMockBuilder(MateriasManager::class)
      ->setMethods(['getMateria'])
      ->disableOriginalConstructor()
      ->getMock();

    $MatManagerMock->expects($this->exactly(1))
      ->method('getMateria')
      ->willReturn($resultado);

    // $dbm = new DataBaseManager();
    $this->assertEquals($resultado, $MatManagerMock->getMateria($idMateria));
  }
}
