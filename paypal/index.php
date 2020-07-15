<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="paypal" id="paypal">
    <!-- Prepopulate the PayPal checkout page with customer details, -->
    <input type="hidden" name="first_name" value="Jitendra">
    <input type="hidden" name="last_name" value="dariwal">
    <input type="hidden" name="email" value="testsoon@mailinator.com">
    <input type="hidden" name="address1" value="test">
    <input type="hidden" name="address2" value="test1">
    <input type="hidden" name="city" value="ajmer">
    <input type="hidden" name="zip" value="305001">
    <input type="hidden" name="day_phone_a" value="">
    <input type="hidden" name="day_phone_b" value="9549590287">

    <!-- We don't need to use _ext-enter anymore to prepopulate pages -->
    <!-- cmd = _xclick will automatically pre populate pages -->
    <!-- More information: https://www.x.com/docs/DOC-1332 -->
    <input type="hidden" name="cmd" value="_xclick" />
    <input type="hidden" name="business" value="jitendra.dariwal@dotsquares.com" />
    <input type="hidden" name="cbt" value="Return to Your Business Name" />
    <input type="hidden" name="currency_code" value="USD" />

    <!-- Allow the customer to enter the desired quantity -->
    <input type="hidden" name="quantity" value="1" />
    <input type="hidden" name="item_name" value="Name of Item" />

    <!-- Custom value you want to send and process back in the IPN -->
    <input type="hidden" name="custom" value="1234567" />

    <input type="hidden" name="shipping" value="0.01" />
    <input type="hidden" name="invoice" value="28081993" />
    <input type="hidden" name="amount" value="0.01" />
    <input type="hidden" name="return" value="http://local.notes.com/paypal/thank.php"/>
    <input type="hidden" name="cancel_return" value="http://local.notes.com/paypal/cancel.php" />

    <!-- Where to send the PayPal IPN to. -->
    <input type="hidden" name="notify_url" value="http://http://local.notes.com/paypal/ipn.php" />
	
	<!-- Display the payment button. -->
	<input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
</form>