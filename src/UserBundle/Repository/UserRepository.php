<?php

namespace UserBundle\Repository;

/**
 * QuestionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
  public function loadUserByUsername($username)
  {
      $a=explode('@', $username);
      $user=$a[0];
      $domain=$a[1];
      return $this->createQueryBuilder('u')
          ->join('VmailBundle:Domain', 'd', 'WITH', 'u.domain = d.id')
          ->where('u.user = :user AND d.name = :domain')
          ->setParameter('user', $user)
          ->setParameter('domain', $domain)
          ->getQuery()
          ->getOneOrNullResult();
  }
}
