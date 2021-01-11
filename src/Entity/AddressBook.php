<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AddressBookRepository;

/**
 * @ORM\Entity
 * @ORM\Table(name="ADDRESS_BOOK")
 * @ORM\Entity(repositoryClass=AddressBookRepository::class)
 */
class AddressBook
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $Id;

    /**
     * @var string
     * @ORM\Column(name="FIRST_NAME", type="string", length=512, nullable=false)
     */
    private $first_name;

    /**
     * @var string
     * @ORM\Column(name="LAST_NAME", type="string", length=512, nullable=false)
     */
    private $last_name;

    /**
     * @var string
     * @ORM\Column(name="STREET_ADDRESS", type="string", length=512, nullable=false)
     */
    private $street_address;

    /**
     * @var string
     * @ORM\Column(name="ZIP_CODE", type="string", length=512, nullable=false)
     */
    private $zip_code;

    /**
     * @var string
     * @ORM\Column(name="CITY", type="string", length=512, nullable=false)
     */
    private $city;

    /**
     * @var string
     * @ORM\Column(name="COUNTRY", type="string", length=512, nullable=false)
     */
    private $country;

    /**
     * @var integer
     * @ORM\Column(name="PHONE_NUMBER", type="integer", length=512, nullable=false)
     */
    private $phone_number;

    /**
     * @var \DateTime
     * @ORM\Column(name="BIRTH_DATE", type="date", nullable=false)
     */
    private $birth_date;

    /**
     * @var string
     * @ORM\Column(name="EMAIL_ADDRESS", type="string",length=125, nullable=false)
     */
    private $email_address;

    /**
     * @var string
     * @ORM\Column(name="PICTURE", type="string",length=125, nullable=false)
     */
    private $picture;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param int $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->street_address;
    }

    /**
     * @param string $street_address
     */
    public function setStreetAddress($street_address)
    {
        $this->street_address = $street_address;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * @param string $zip_code
     */
    public function setZipCode($zip_code)
    {
        $this->zip_code = $zip_code;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return int
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param int $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * @param \DateTime $birth_date
     */
    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * @param string $email_address
     */
    public function setEmailAddress($email_address)
    {
        $this->email_address = $email_address;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

}