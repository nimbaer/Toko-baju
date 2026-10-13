<?php
if(session_status()===PHP_SESSION_NONE) session_start();
require_once __DIR__.'/db.php';
function e($s){return htmlspecialchars((string)$s,ENT_QUOTES,'UTF-8');}
function rupiah($n){return 'Rp '.number_format((float)$n,0,',','.');}
function csrf(){if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];}
function check_csrf(){if(!hash_equals($_SESSION['csrf']??'',$_POST['csrf']??'')){http_response_code(403);exit('Token tidak valid.');}}
function redirect($path){header('Location: '.$path);exit;}
function cart_count(){return array_sum($_SESSION['cart']??[]);}
function cart_products($pdo){$cart=$_SESSION['cart']??[];if(!$cart)return []; $ids=array_keys($cart);$marks=implode(',',array_fill(0,count($ids),'?'));$s=$pdo->prepare("SELECT * FROM products WHERE id IN ($marks)");$s->execute($ids);$items=[];foreach($s->fetchAll() as $product){$product['quantity']=min((int)$cart[$product['id']],(int)$product['stock']);if($product['quantity']>0)$items[]=$product;}return $items;}
