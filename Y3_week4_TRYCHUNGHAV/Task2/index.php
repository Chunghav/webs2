<?php 

require_once( __DIR__ . '/models/ABA.php');
require_once( __DIR__ . '/models/Pipay.php');
require_once( __DIR__ . '/models/Wing.php');

echo '<h1>Task 2 </h1>';

$types = [
    new ABA(5,1),
    new ABA(4,1),
    new ABA(5,1),
    new ABA(10,1),
    new Wing(3,2),
    new Wing(15,1),
    new Wing(2,1),
    new Pipay(6,1),

];

function number_sale($types){
    $str = '<table border= "1"> <tr><th>Price</th> <th>Quantity</th> <th>Method</th> <th>Total</th></tr>';

    foreach ($types as $type) {
        $str .= '<tr><td>' . $type->price() . '</td> <td>' . $type->quantity() . '</td> 
                    <td>' . $type->method() . '</td> <td>' . $type->total() . '</td> </tr>';
    }
    $str .= '</table>;

    return $str;
}

echo number_sale($types);

echo '<p>1.Number of sales by ABA method</p>';

$totalABA = 0;
    foreach ($types as type){
        $totalABA += $type->total() === 'ABA' ? 1 : 0 ;
     echo '<p>Total ABA: ' . $totalABA . '</p>';   


echo '<p>2.Number of sales by Pipay and Wing method</p>';
$totalPipay = 0;
    foreach ($types as type){
        $totalPipay += $type->total() === 'Pipay' ? 1 : 0 ;
     echo '<p>Total Pipay: ' . $totalPipay . '</p>';   

$totalWing = 0;
    foreach ($types as type){
        $totalWing += $type->total() === 'Wing' ? 1 : 0 ;
    echo '<p>Total Wing: ' . $totalWing . '</p>';   




echo '<p>3.Display all sale ordering by biggest total amount</p>';

usort($types, funtion ($t1, $t2) => $t2->total() <=> $t1->total() );
echo number_sale($types);


?>