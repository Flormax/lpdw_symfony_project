<?php

namespace BlogBundle\Repository;

/**
 * CommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentRepository extends \Doctrine\ORM\EntityRepository
{
  public function getByArticle($article)
  {
    try{
      $comments = $this
        ->createQueryBuilder('p')
        ->where('p.target = :target')
        ->setParameter('target', $article)
        ->getQuery()
        ->getResult();

        return $comments;
    } catch (\Exception $ex){
         return null;
    }
  }

  public function getCountByArticle($article)
  {
    try{
      $comments = $this
        ->createQueryBuilder('p')
        ->select('count(p)')
        ->where('p.target = :target')
        ->setParameter('target', $article)
        ->getQuery()
        ->getSingleScalarResult();

        return $comments;
    } catch (\Exception $ex){
         return null;
    }
  }
}
