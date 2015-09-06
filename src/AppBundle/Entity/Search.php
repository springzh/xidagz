<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Search
 */
class Search
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="标题不可为空")
     * @ORM\Column(name="user_name", type="string", length=50)
     */
    private $userName;

    /**
     * @var string
     * @Assert\NotBlank(message="标题不可为空")
     * @ORM\Column(name="phone_number", type="string", length=11)
     */
    private $phoneNumber;

    /**
     * @var string
     * @Assert\NotBlank(message="标题不可为空")
     * @ORM\Column(name="major", type="string", length=100)
     */
    private $major;

    /**
     * @var string
     * @ORM\Column(name="enrollment_time", type="string", length=4,nullable=true)
     */
    private $enrollmentTime;

    /**
     * @var string
     * @ORM\Column(name="Department", type="string", length=50,nullable=true)
     */
    private $department;

    /**
     * @var string
     * @ORM\Column(name="profession", type="string", length=50,nullable=true)
     */
    private $profession;

    /**
     * @var string
     * @ORM\Column(name="company", type="string", length=100,nullable=true)
     */
    private $company;

    /**
     * @var string
     * @ORM\Column(name="job", type="string", length=50,nullable=true)
     */
    private $job;

    /**
     * @var string
     * @ORM\Column(name="address", type="string", length=255,nullable=true)
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(name="telephone_number", type="string", length=50,nullable=true)
     */
    private $telephoneNumber;

    /**
     * @var string
     * @ORM\Column(name="fax_number", type="string", length=50,nullable=true)
     */
    private $faxNumber;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=100,nullable=true)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(name="qq_number", type="string", length=20,nullable=true)
     */
    private $qqNumber;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userName
     *
     * @param string $userName
     * @return Search
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return Search
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set major
     *
     * @param string $major
     * @return Search
     */
    public function setMajor($major)
    {
        $this->major = $major;

        return $this;
    }

    /**
     * Get major
     *
     * @return string 
     */
    public function getMajor()
    {
        return $this->major;
    }

    /**
     * Set enrollmentTime
     *
     * @param string $enrollmentTime
     * @return Search
     */
    public function setEnrollmentTime($enrollmentTime)
    {
        $this->enrollmentTime = $enrollmentTime;

        return $this;
    }

    /**
     * Get enrollmentTime
     *
     * @return string 
     */
    public function getEnrollmentTime()
    {
        return $this->enrollmentTime;
    }

    /**
     * Set department
     *
     * @param string $department
     * @return Search
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set profession
     *
     * @param string $profession
     * @return Search
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string 
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return Search
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set job
     *
     * @param string $job
     * @return Search
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return string 
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Search
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set telephoneNumber
     *
     * @param string $telephoneNumber
     * @return Search
     */
    public function setTelephoneNumber($telephoneNumber)
    {
        $this->telephoneNumber = $telephoneNumber;

        return $this;
    }

    /**
     * Get telephoneNumber
     *
     * @return string 
     */
    public function getTelephoneNumber()
    {
        return $this->telephoneNumber;
    }

    /**
     * Set faxNumber
     *
     * @param string $faxNumber
     * @return Search
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;

        return $this;
    }

    /**
     * Get faxNumber
     *
     * @return string 
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Search
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set qqNumber
     *
     * @param string $qqNumber
     * @return Search
     */
    public function setQqNumber($qqNumber)
    {
        $this->qqNumber = $qqNumber;

        return $this;
    }

    /**
     * Get qqNumber
     *
     * @return string 
     */
    public function getQqNumber()
    {
        return $this->qqNumber;
    }
}
