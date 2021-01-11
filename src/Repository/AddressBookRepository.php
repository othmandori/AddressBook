<?php


namespace App\Repository;



use Doctrine\ORM\EntityRepository;

class AddressBookRepository extends EntityRepository
{
    public function getAll(){
        return $this->createQueryBuilder("AB")
            ->orderBy("AB.first_name")
            ->getQuery()
            ->getArrayResult();
    }

}