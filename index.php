<?php
#script para verificar contectividade para implantação 
#2015

$ip = "IP QUE DESEJA VERIFICAR";
$portas = array(
    "HTTP" => "80",
    "FTP"  => "21",
    "SMTP" => "25",
    "POP3" => "110"
);

#Valida IP
if(filter_var($ip, FILTER_VALIDATE_IP) === FALSE)
{
    echo "IP inválido <br />";
} 
else
{
    echo "IP válido <br />";
}
$sock = fsockopen($ip,$portas['HTTP'],$errorno,$error,30);
echo $errorno;
echo "$error <br />";

#Valida Portas
foreach ($portas as $nome => $porta) {
    $sock = @fsockopen($ip, $porta, $errno, $errstr, 1);

    if($sock >= 1)
    {
        echo $nome . ": ON" . "<br />";
    }
    else
    {
        echo $nome . ": OFF" . "<br />";
    }
}