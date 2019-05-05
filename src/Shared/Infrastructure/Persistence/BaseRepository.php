<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 05/05/19
 * Time: 00:21
 */

namespace App\Shared\Infrastructure\Persistence;



use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

abstract class BaseRepository
{
    
    /*** @var ManagerRegistry */
    private $managerRegistry;
    
    /*** @var ObjectRepository */
    protected $objectRepository;
    
    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
        $this->objectRepository = $this->getEntityManager()->getRepository($this->entityClass());
    }
    
    abstract protected static function entityClass(): string;
    
    protected function saveEntity($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
    
    protected function removeEntity($entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }
    
    protected function createQueryBuilder()
    {
        return $this->getEntityManager()->createQueryBuilder();
    }
    
    /**
     * @return ObjectManager
     */
    private function getEntityManager(): ObjectManager
    {
        $entityManager = $this->managerRegistry->getManager();
        
        if($entityManager->isOpen()) {
            return $entityManager;
        }
        
        return $this->managerRegistry->resetManager();
    }
}