<?php
class insertAnnouncementCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function testAdd(AcceptanceTester $I)
    {
        $I->amOnUrl('http://localhost:8888/bannarak/Announcement/Add.php');
        $I->fillField('.//*[@id="txtTopicName"]','test');
        $I->selectOption('.//*[@id="ddlType"]','Announcement');
        $I->fillField('.//*[@id="txtDetail"]','Test Description');
        $I->fillField('.//*[@id="txtUpdateBy"]','jol-lnw-boy-za');
        $I->click('.//*[@id="btnSubmit"]');
        // $I->click('.jquery-msgbox-button-submit');
        // $I->executeJS("window.prompt");
        $I->wait(2);
        $I->acceptPopup();
        // $js_confirm = 'window.confirm = function(){ return true; }';
        // $I->executeJS($js_confirm);
        $I->amOnUrl('http://localhost:8888/bannarak/Announcement/view.php');
        $I->click('.//*[@id="btnSearch"]');
        $I->see('123123');
    }

    public function testView(AcceptanceTester $I)
    {
        $I->amOnUrl('http://localhost:8888/bannarak/Announcement/View.php');
        $I->fillField('.//*[@id="txtTopic"]','test');
        $I->selectOption('.//*[@id="ddlType"]','Announcement');
        $I->click('.//*[@id="btnSearch"]');
        // $I->click('.jquery-msgbox-button-submit');
        // $I->executeJS("window.prompt");
        // $I->wait(2);
        // $I->acceptPopup();
        // $js_confirm = 'window.confirm = function(){ return true; }';
        // $I->executeJS($js_confirm);
        // $I->amOnUrl('http://localhost:8888/bannarak/Announcement/view.php');
        // $I->click('.//*[@id="btnSearch"]');
        $I->see('test');
    }

    public function testUpdate(AcceptanceTester $I)
    {
        $I->amOnUrl('http://localhost:8888/bannarak/Announcement/View.php');
        $I->fillField('.//*[@id="txtTopic"]','test');
        $I->selectOption('.//*[@id="ddlType"]','Announcement');
        $I->click('.//*[@id="btnSearch"]');
        // $I->click('.jquery-msgbox-button-submit');
        // $I->executeJS("window.prompt");
        // $I->wait(2);
        // $I->acceptPopup();
        // $js_confirm = 'window.confirm = function(){ return true; }';
        // $I->executeJS($js_confirm);
        // $I->amOnUrl('http://localhost:8888/bannarak/Announcement/view.php');
        // $I->click('.//*[@id="btnSearch"]');
        $I->see('test');
        $I->click('.//*[@id="tbFromQuery"]/tbody/tr[2]/td[7]/button');
        $I->see('Edit');
        $I->selectOption('.//*[@id="ddlType"]','News');
        $I->click('.//*[@id="btnSave"]');
        $I->acceptPopup();
    }
}
