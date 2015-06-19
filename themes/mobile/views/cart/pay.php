<?php 
    $this->pageTitle='填写订单';
?>
    <div class="content">
    <div class="input">
        <?php 
            $model=new OrderForm();
            $form=$this->beginWidget('CActiveForm',array(
                'action'=>'/cart/checkpay',
                'id'=>'cart-form',
                'enableClientValidation'=>true,
                'enableAjaxValidation'=>true,
                'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                )));
            ?>
            支付方式:
            <select id="pay_style" name="pay_style">
            <option value ="0">在线支付</option>
            <option value ="1">货到付款</option>
            </select>
            <h6>电话:</h6>
            <input type="text" id="tel" name="tel" value=""/>
            <h6>地址:</h6>
            <input type="text" id="address" name="address" value=""/>
            <div class="formSubmitButtonErrorsWrap">
            <input type="submit" value="提交订单" class="buttonWrap button button-green contactSubmitButton"/>
            </div>
        <?php 
            $this->endWidget();
        ?>
    </div>
    </div>