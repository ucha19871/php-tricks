<?php

/*
Calculate Shipping Fees

A script is required to help calculate shipping fees for a store.
The store has two types of shipping: local shipping and international shipping.
They are calculated according to the following formulas:

//local shipping: number of items * distance * .8
//international shipping: number of items * ( local distance * .8 + international distance * 1.2)

A LocalShipping object should have **number of items** and **local distance**,respectively, as its parameters, while an
InternationalShipping object should have **number of items**, **local distance*, and **international distance**, respectively.

Without modifying the Shipping class, add the necessary code so that it can be used to calculate different shipping fees.
Also,
create a function named calculateShippingFees that will be given an array of Shipping instances
as a parameter and **print** the total shipping fee.
If the array has any item that is not a Shipping object it should set its shipping fee as 0.

Sample Input
items: {new InternationalShipping(5, 50, 150), new LocalShipping(6, 35)}
Sample Output
1268

Additional Samples
items: {new FastMail(6, 35)} => 0
Note


Code Template:
*/



// Do not modify the Shipping class.
abstract class Shipping
{
    private $_itemsCount;
    private $_distance;

    public function __construct($itemsCount, $distance)
    {
        $this->_itemsCount = $itemsCount;
        $this->_distance = $distance;
    }

    abstract public function getFees();

    public function getDistance()
    {
        return $this->_distance;
    }

    public function getItemsCount()
    {
        return $this->_itemsCount;
    }
}

// You can modify code below this comment.
class InternationalShipping extends Shipping
{
    private $_internationalDistance;
    private $coeficient_local;
    private $coeficient_international;

    public function __construct($itemsCount,$localDistance,$internationalDistance)
    {
        parent::__construct($itemsCount,$localDistance);
        $this->_internationalDistance = $internationalDistance;
        $this->coeficient_local = 0.8;
        $this->coeficient_international = 1.2;
    }

    public function getInternationalDistance(){
        return $this->_internationalDistance;
    }

    public function getFees()
    {
        $itemCount = $this->getItemsCount();
        $localDistence = $this->getDistance();
        $internationalDistance= $this->getInternationalDistance();
        $coeficientLocal = $this->coeficient_local;
        $coeficientInt = $this->coeficient_international;
        return $itemCount * ( $localDistence * $coeficientLocal + $internationalDistance * $coeficientInt );
    }
}

class LocalShipping extends Shipping
{

    private $coefitientLocal;

    public function __construct($itemCount, $distance)
    {
        parent::__construct($itemCount,$distance);
        $this->coefitientLocal = 0.8;
    }

    public function getFees()
    {
        $distLocal = $this->getDistance();
        $itemCount = $this->getItemsCount();
        $coeficient = $this->coefitientLocal;

        return $itemCount * $distLocal *  $coeficient;
    }
}

function calculateShippingFees($items, $output = 'print') {

    $total = 0;

    foreach ($items as $obj) {
        if(!is_a($obj,'Shipping')){
            $total += 0;
        }else{
            $total += $obj->getFees();
        }
    }
    if($output == 'print'){
        print($total);
    }

    return $total;
    // To print results to the standard output you can use print
    // Example:
    // print "Hello world!";
}

// Do NOT call the calculateShippingFees function in the code
// you write. The system will call it automatically.