<?php
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Search;

class LoadSearchData extends AbstractFixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager){
        $search = new Search();
        $search->setUserName('gg');
        $search->setPhoneNumber('13455566543');
        $search->setMajor('92水产');
        $search->setEnrollmentTime('1990');
        $search->setDepartment('水产学院');
        $search->setProfession('IT');
        $search->setCompany('google有限公司');
        $search->setJob('开发工程师');
        $search->setAddress('广东省深圳市');
        $search->setTelephoneNumber('83020447');
        $search->setFaxNumber('54699');
        $search->setEmail('222233114@xmail.com');
        $search->setQqNumber('444422331');
        $manager->persist($search);

        $search = new Search();
        $search->setUserName('FF');
        $search->setPhoneNumber('17446625374');
        $search->setMajor('90网络');
        $search->setEnrollmentTime('1983');
        $search->setDepartment('计算机学院');
        $search->setProfession('IT');
        $search->setCompany('google有限公司');
        $search->setJob('开发工程师');
        $search->setAddress('广东省汕头市');
        $search->setTelephoneNumber('83020447');
        $search->setFaxNumber('54755');
        $search->setEmail('232123131@xmail.com');
        $search->setQqNumber('884499332');
        $manager->persist($search);

        $search = new Search();
        $search->setUserName('BB');
        $search->setPhoneNumber('15549902341');
        $search->setMajor('89水产');
        $search->setEnrollmentTime('1987');
        $search->setDepartment('计算机学院');
        $search->setProfession('IT');
        $search->setCompany('google有限公司');
        $search->setJob('开发工程师');
        $search->setAddress('广东省深圳市');
        $search->setTelephoneNumber('83020447');
        $search->setFaxNumber('54633');
        $search->setEmail('0994892839@xmail.com');
        $search->setQqNumber('990099112');
        $manager->persist($search);

        $search = new Search();
        $search->setUserName('KK');
        $search->setPhoneNumber('19239902854');
        $search->setMajor('91蔬菜');
        $search->setEnrollmentTime('1989');
        $search->setDepartment('农业学院');
        $search->setProfession('IT');
        $search->setCompany('农业有限公司');
        $search->setJob('农业研发');
        $search->setAddress('广东省深圳市');
        $search->setTelephoneNumber('83020447');
        $search->setFaxNumber('54677');
        $search->setEmail('7757663273827@xmail.com');
        $search->setQqNumber('223344556');
        $manager->persist($search);

        $manager->flush();


    }
}
?>