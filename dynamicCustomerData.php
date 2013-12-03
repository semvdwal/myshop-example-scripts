<?php
/**
 * @(#) dynamicCustomerData.php 03/12/2013
 *
 * Copyright 1999-2013(c) MijnWinkel B.V. Rijnegomlaan 33, Aerdenhout,
 * North Holland, NL-2114EH, The Netherlands All rights reserved.
 *
 * This software is provided "AS IS," without a warranty of any kind. ALL
 * EXPRESS OR IMPLIED CONDITIONS, REPRESENTATIONS AND WARRANTIES,
 * INCLUDING ANY IMPLIED WARRANTY OF MERCHANTABILITY, FITNESS FOR A
 * PARTICULAR PURPOSE OR NON-INFRINGEMENT, ARE HEREBY EXCLUDED. MYSHOP AND
 * ITS LICENSORS SHALL NOT BE LIABLE FOR ANY DAMAGES OR LIABILITIES
 * SUFFERED BY LICENSEE AS A RESULT OF  OR RELATING TO USE, MODIFICATION
 * OR DISTRIBUTION OF THE SOFTWARE OR ITS DERIVATIVES. IN NO EVENT WILL
 * MYSHOP OR ITS LICENSORS BE LIABLE FOR ANY LOST REVENUE, PROFIT OR DATA, OR
 * FOR DIRECT, INDIRECT, SPECIAL, CONSEQUENTIAL, INCIDENTAL OR PUNITIVE
 * DAMAGES, HOWEVER CAUSED AND REGARDLESS OF THE THEORY OF LIABILITY,
 * ARISING OUT OF THE USE OF OR INABILITY TO USE SOFTWARE, EVEN IF MYSHOP HAS
 * BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.
 *
 * You acknowledge that Software is not designed, licensed or intended
 * for use in the design, construction, operation or maintenance of any
 * nuclear facility.
 *
 *
 * Script dynamicCustomerData.php
 *
 * Accepts a request from myShop for user data and responds with the correct data if available
 *
 * This class was developed using PHP 5.3.6 with libxml.
 *
 * Version: 0.1
 * Author: Sem van der Wal
 **/

$users = array(
    "user1@myshop.com" => array(
        "email" => "customer1@server1.com",
        "name" => "customer name 1",
        "gender" => "male",
        "street" => "customerstreet 26",
        "remark" => "customer remark",
        "country" => "NL"
    ),
    "user2@myshop.com" => array(
        "email" => "customer2@server2.com",
        "name" => "customer name 2",
        "gender" => "male",
        "street" => "customerstreet 26",
        "remark" => "customer remark",
        "country" => "NL"
    ),
    "user3@myshop.com" => array(
        "email" => "customer3@server3.com",
        "name" => "customer name 3",
        "gender" => "male",
        "street" => "customerstreet 26",
        "remark" => "customer remark",
        "country" => "NL"
    ),
    "default" => array(
        "email" => "unknown@unknown.nl",
        "name" => "customer name unknown",
        "gender" => "male",
        "street" => "customerstreet 26",
        "remark" => "customer remark",
        "country" => "NL"
    )
);

$userid = $_REQUEST['userid'];
if(in_array($userid, array_keys($users))){
    extract($users[$userid]);
}else{
    extract($users["default"]);
}

header('Content-type: text/xml');
echo '<?xml version="1.0"?>'."\n";
?>
<rows>
    <row type="customer">
        <col name="email"><?=$email?></col>
        <col name="name"><?=$name?></col>
        <col name="gender"><?=$gender?></col>
        <col name="street"><?=$street?></col>
        <col name="remark"><?=$remark?></col>
        <col name="country"><?=$country?></col>
    </row>
</rows>