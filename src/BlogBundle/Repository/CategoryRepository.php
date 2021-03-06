<?php

namespace BlogBundle\Repository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
  public function getByName($name)
  {
    try{
      $category = $this
        ->createQueryBuilder('p')
        ->where('p.name = :name')
        ->setParameter('name', $name)
        ->getQuery()
        ->getSingleResult();

        return $category;
    } catch (\Exception $ex){
         return null;
    }
  }
}
