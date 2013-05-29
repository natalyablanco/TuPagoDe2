<?php


require_once '/../../protected/models/Transaction.php';
require_once '/../../protected/models/Puntoconexion.php';

class TransactionTestTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    public function testSaveTransaction() {
        $merchant_usn = "19945x921532";
        $amount = "809";
        $nit = "4vv3v53v33";
        $trans_status = "con";
        $message = "0:Transacao OK!";
        $payment_type = "C";
        $orderid = "1232332";
        $punto = 'esite';

        $this->assertTrue(Transaction::model()->saveTransaction($merchant_usn, $amount,
            $nit,$trans_status,$message,$payment_type,$orderid,$punto));

    }
}


/*

<?php


class TransactionTest extends  \Codeception\TestCase\Test
{
       
    

    public function testUniqueTransaction(){
        $merchant_usn = "19945x9215v6";
        $amount = "809";
        $nit = "4vv3v53v33";
        $trans_status = "con";
        $message = "0:Transacao OK!";
        $payment_type = "C";
        $orderid = "34253";
        $punto = 'esite';

        $this->assertTrue(Transaction::model()->saveTransaction($merchant_usn, $amount,
            $nit,$trans_status,$message,$payment_type,$orderid,$punto));
        try {
            //try to register same merchant_id, it should throw exception and should 
            // skip the below assertion and must execute the catch block.           
            $this->assertFalse(Transaction::model()->saveTransaction($merchant_usn, $amount,
            $nit,$trans_status,$message,$payment_type,$orderid,$punto));
        }
        catch (CDbException $exp){
             echo "excep";
        }
    }
    
    /*Probar que los valores de una transaccion se actualiza
    public function testUpdateTransaction(){
        $merchant_usn = "1994c21532";
        $amount = "809";
        $nit = "4vv3v53v33";
        $trans_status = "con";
        $message = "0:Transacao OK!";
        $payment_type = "C";
        $orderid = "12314";
        $punto = 'esite';

        $this->assertTrue(Transaction::model()->saveTransaction($merchant_usn, $amount,
            $nit,$trans_status,$message,$payment_type,$orderid,$punto));


        $model = Transaction::model()->findByPk($orderid);

        $merchant_usn2 = "199421532";
        $amount2 = "999";
        $nit2 = "4vv3v53v33";
        $trans_status2 = "con";
        $message2 = "0:Transacao NO!";
        $payment_type2 = "C";
        $punto2 = 'esite';

        $this->assertTrue(Transaction::model()->updateTransaction($merchant_usn2, $amount2,
            $nit2,$trans_status2,$message2,$payment_type2,$orderid,$punto2));
        
        $model2 = Transaction::model()->findByPk($orderid);

        $this->assertEquals($model2->amount, $amount2);
        $this->assertEquals($model2->nit, $nit2);
        $this->assertEquals($model2->trans_status, $trans_status2);
        $this->assertEquals($model2->message, $message2);
        $this->assertEquals($model2->payment_type, $payment_type2);
        
    }
    
    public function testMissingParameters() {
        //try to register with no parameters 
        $this->assertFalse(Transaction::model()->saveTransaction("", "","","","","","",""));
        //one paramater missing
        $this->assertFalse(Transaction::model()->saveTransaction("19945x921532", "","","","","","",""));
        $this->assertFalse(Transaction::model()->saveTransaction("", "809","","","","","",""));
        $this->assertFalse(Transaction::model()->saveTransaction("", "","4vv3v53v33","","","","",""));
        $this->assertFalse(Transaction::model()->saveTransaction("", "","","con","","","",""));
        $this->assertFalse(Transaction::model()->saveTransaction("", "","","","0:Transacao OK!","","",""));
        $this->assertFalse(Transaction::model()->saveTransaction("", "","","","","C","",""));
        $this->assertFalse(Transaction::model()->saveTransaction("", "","","","","","1232332",""));
        $this->assertFalse(Transaction::model()->saveTransaction("", "","","","","","","esite"));
        //letters in amount
        $this->assertFalse(Transaction::model()->saveTransaction("19945x921532", "vw4","4vv3v53v33","con","0:Transacao OK!","C","1232332",'otro'));
        //Payment_type longer than 1
        $this->assertFalse(Transaction::model()->saveTransaction("19945x921532", "vw4","4vv3v53v33","con","0:Transacao OK!","C32f","1232332",'otro'));
        
    }

    public function testItsApproveTransaction(){
        
        $merchant_usn = "19945x921532";
        $amount = "809";
        $nit = "4vv3v53v33";
        $trans_status = "CON";
        $message = "0:Transacao OK!";
        $payment_type = "C";
        $orderid = "123452232";
        $punto = 'esite';

        $merchant_usn2 = "1x92112e12f";
        $amount2 = "1000";
        $nit2 = "4352v33";
        $trans_status2 = "NEG";
        $message2 = "0:Transacao OK!";
        $payment_type2 = "C";
        $orderid2 = "23423522";
        $punto2 = 'esite';

        $this->assertTrue(Transaction::model()->saveTransaction($merchant_usn, $amount,
            $nit,$trans_status,$message,$payment_type,$orderid,$punto));

        $this->assertTrue(Transaction::model()->saveTransaction($merchant_usn2, $amount2,
            $nit2,$trans_status2,$message2,$payment_type2,$orderid2,$punto2));

        $model = Transaction::model()->findByPk($orderid);
        $model2 = Transaction::model()->findByPk($orderid2);

        $this->assertTrue(Transaction::model()->itsApprove($orderid));
        $this->assertFalse(Transaction::model()->itsApprove($orderid2));
        $this->assertEquals("CON",$model->trans_status);
        $this->assertEquals("NEG",$model2->trans_status);

    }

    public function testPaymentNeg()
    {
        // Create a mock for the SomeClass class,
        // only mock the update() method.
        $puntoConex = $this->getMock('Puntoconexion', array('createCon'));
        //print_r($mock); die;
        $puntoConex->expects($this->any())
                ->method('createCon')
                ->with($this->equalTo('esite'))
                ->will($this->returnValue('Neg'));
    
        // Create a Subject object and attach the mocked
        // Observer object to it.
        $transaction = new Transaction;
        $transaction->using($puntoConex);
 
        // Call the doSomething() method on the $subject object
        // which we expect to call the mocked Observer object's
        // update() method with the string 'something'.
        $transaction->createTransaction();
    }
     

}*/