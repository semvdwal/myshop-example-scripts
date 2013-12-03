<?php
/**
 * @(#) discountCodes.php 03/12/2013
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
 * Script discountCodes.php
 *
 * Accepts a discount-check request from myShop and responds with example discount data
 *
 * This class was developed using PHP 5.3.6 with libxml.
 *
 * Version: 0.1
 * Author: Sem van der Wal
 **/

// Set the correct shopId here
$expectedShopId = '12345600';

$shopId = $_REQUEST['vid'];
$code = $_REQUEST['action_code'];

// Array containing available discount codes
$codes = array(
    "percentage" => array(
        "valid" => 1,
        "amount" => 10,
        "type" => 0
    ),
    "fixed" => array(
        "valid" => 1,
        "amount" => 10,
        "type" => 1
    ),
    "invalid" => array(
        "valid" => 0,
        "message" => "This coupon is expired"
    ),
    "default" => array(
        "valid" => 0,
        "message" => "This coupon is invalid"
    )
);

// Check if current shopId is expected and if the discount code exists, else use default values
if($shopId==$expectedShopId && in_array($code, array_keys($codes))){
    extract($codes[$code]);
}else{
    extract($codes['default']);
}

header("Content-type: text/xml");
echo '<?xml version="1.0"?>'."\n";
?>
<? if($valid==1){ ?>
    <rows>
        <row type="coupon_0">
            <col name="validation"><?=$valid?></col>
            <col name="amount"><?=$amount?></col>
            <col name="reduction_type"><?=$type?></col>
        </row>
    </rows>
<? } else { ?>
    <rows>
        <row type="coupon_0">
            <col name="validation"><?=$valid?></col>
            <col name="not_valid_message"><?=$message?></col>
        </row>
    </rows>
<? } ?>