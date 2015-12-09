<?php
defined('_JEXEC') or die('Restricted access');
JToolBarHelper::title(JText::_('egbcaptcha'), 'generic.png');
JToolBarHelper::preferences('com_egbcaptcha');
?>

<p><strong>Kullanmak için aşağıdaki kodu formun içine yazın:</strong></p>
<p>------------------------------------------------------------------------------------------------</p>
&lt;?php echo JText::_("CAPTCHA_INFO");?&gt;<br />
&lt;img src="index.php?option=com_egbcaptcha&amp;width=150&amp;height=50&amp;characters=5" /&gt;<br />
&lt;div class="captchaInfo"&gt;&lt;?php echo JText::_("CAPTCHA_PIC_INFO");?&gt;&lt;/div&gt;<br />
&lt;input id="verify_code" name="verify_code" type="text" /&gt;<br />
<br />
<p>------------------------------------------------------------------------------------------------</p>
<p><strong>Aşağıdakileri formun gönderildiği koda yerleştirin:</strong></p>
<p>------------------------------------------------------------------------------------------------</p>
<br />
require_once('libraries/form/captcha.php');<br />
<br />
captcha::check("&lt;başarısızsa yonlendirilecek adres&gt;");// boş bırakılırsa index.php ye yönlendirir.<br />
<br />
<p>------------------------------------------------------------------------------------------------</p>
<!-- 
<p><strong>Place the following in the code where the form is submitted to. This code  		  	will check what the user has typed matches the code in the image.</strong></p>
<p>------------------------------------------------------------------------------------------------</p>
<p>&lt;?php <br />
  $session =&amp; JFactory::getSession(); <br />
$code = $session-&gt;get('security_code');<br />
$v_code = JRequest::getVar('verify_code'); </p>
<p> if(($code == $v_code ))  {<br />
  <strong>Your sucess page message </strong><br />
  } else {<br />
  <strong>Your Failure page message </strong><br />
  }<br />
  ?&gt;<br />
------------------------------------------------------------------------------------------------</p>
<p><strong>Place the following code on your form. This will generate an image with a random string of characters along with the text field where the user will retype the code.</strong></p>
<p>------------------------------------------------------------------------------------------------</p>
<p>&lt;img src=&quot;index.php?option=com_egbcaptcha&amp;amp;width=150&amp;amp;height=50&amp;amp;characters=5&quot;  /&gt;<br />
  <strong>Security Code: </strong><br />
  &lt;input id=&quot;verify_code&quot; name=&quot;verify_code&quot; type=&quot;text&quot; /&gt;</p>
<p>&nbsp;</p>
<p><br />
------------------------------------------------------------------------------------------------</p>
<p>&nbsp;</p>
<p align="center"><strong> visit www.egbsystems.com </strong></p>
 -->