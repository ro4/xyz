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
            <div class="formFieldWrap">
                <label class="field-title contactNameField" for="contactNameField">称呼:<span>(必填)</span></label>
                <input type="text" name="name" value="" class="contactField requiredField" id="contactNameField"/>
            </div>
            <div class="formFieldWrap">
                <label class="field-title contactEmailField" for="contactEmailField">电话: <span>(必填)</span></label>
                <input type="text" name="tel" value="" class="contactField requiredField requiredEmailField" id="contactEmailField"/>
            </div>
            <div class="formTextareaWrap">
                <label class="field-title contactMessageTextarea" for="contactMessageTextarea">地址: <span>(必填)</span></label>
                <textarea name="address" class="contactTextarea" id="contactMessageTextarea"></textarea>
            </div>
            <div class="formTextareaWrap">
                <label class="field-title contactMessageTextarea" for="contactMessageTextarea">备注: </label>
                <textarea name="mark" class="contactTextarea" id="contactMessageTextarea"></textarea>
            </div>
            <div class="formSubmitButtonErrorsWrap">
            <input type="submit" value="提交订单" class="buttonWrap button button-green contactSubmitButton"/>
            </div>
        <?php 
            $this->endWidget();
        ?>
    </div>
    </div>