<?php 
require_once "pdo.php";
$salt = 'XyZzy12*_';
session_start();
$encarr=[
['a','b','c','d','e','f'],  //0
['g','h','i','j','k','l'],  //1 
['m','n','o','p','q','r'],  //2 
['s','t','u','v','w','x'],  //3 
['y','z','@','#','$','*'],  //4 
['A','B','C','D','E','F'],  //5 
['G','H','I','J','K','L'],  //6 
['M','N','O','P','Q','R'],  //7 
['S','T','U','V','W','X'],  //8 
['Y','Z','','','',''],      //9 
];

function encry($password){
$encarr=[
    ['0','a','b','c','d','e','f'],  //0
    ['1','g','h','i','j','k','l'],  //1 
    ['2','m','n','o','p','q','r'],  //2 
    ['3','s','t','u','v','w','x'],  //3 
    ['4','y','z','@','#','$','*'],  //4 
    ['5','A','B','C','D','E','F'],  //5 
    ['6','G','H','I','J','K','L'],  //6 
    ['7','M','N','O','P','Q','R'],  //7 
    ['8','S','T','U','V','W','X'],  //8 
    ['9','Y','Z','','','',''],      //9 
    ];
$i=0;
$j=0;
$k=0;
$ret='';

//print_r($password);
for ($i=0; $i<strlen($password); $i++) {
    for ($j=0; $j<10; $j++) {
        for ($k=0; $k<7; $k++) {
            //echo($i.$j);
            if ($password[$i]==$encarr[$j][$k]) {
                $ret=$ret.$j.$k;
                //echo($ret);
                //echo("sGbsrt");
            }
        }
  
    }
}
echo("\n");
echo($ret);
return $ret;
}

function decpt($password){
    $encarr=[
        ['0','a','b','c','d','e','f'],  //0
        ['1','g','h','i','j','k','l'],  //1 
        ['2','m','n','o','p','q','r'],  //2 
        ['3','s','t','u','v','w','x'],  //3 
        ['4','y','z','@','#','$','*'],  //4 
        ['5','A','B','C','D','E','F'],  //5 
        ['6','G','H','I','J','K','L'],  //6 
        ['7','M','N','O','P','Q','R'],  //7 
        ['8','S','T','U','V','W','X'],  //8 
        ['9','Y','Z','','','',''],      //9 
        ];
    $i=0;
    $j=0;
    $k=0;
    $ret='';
    
    //print_r($password);
    for ($i=1; $i<=strlen($password); $i++) {
        if ($i%2==0){
            //print_r($password[$i-1].$password[$i-2]);
            //print_r("->".$encarr[$password[$i-2]][$password[$i-1]]);
            //echo("\n");
            $ret=$ret.$encarr[$password[$i-2]][$password[$i-1]];
        }
    }
    echo("\n");
    echo($ret);
}
$password = htmlentities($_GET['pass']);
$ha=encry($password);
echo("\n");
decpt($ha);
echo('<br>');

/**
 * Generate a random string, using a cryptographically secure 
 * pseudorandom number generator (random_int)
 * 
 * For PHP 7, random_int is a PHP core function
 * For PHP 5.x, depends on https://github.com/paragonie/random_compat
 * 
 * @param int $length      How many characters do we want?
 * @param string $keyspace A string of all possible characters
 *                         to select from
 * @return string
 */
 function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

$a = random_str(32);
$b = random_str(8, 'abcdefghijklmnopqrstuvwxyz');
$c = random_str();
var_dump($a, $b, $c);
?>