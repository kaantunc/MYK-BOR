<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class HTML_kimport
{
	function showKimport( $option ){
?>
    <form action="index.php" method="post" name="form" id="form" enctype="multipart/form-data">
      <fieldset>
        <legend><?php echo JText::_('Upload');?></legend>
        <table>
        <tr>
          <td width="100" align="right" class="key">
            <?php echo JText::_('File:');?>
          </td>
          <td>
            <input class="file" type="file" name="uploadfile" id="name" size="50" maxlength="250" />
          </td>
          <td>
          	<input type="submit" name="task" value="<?php echo JText::_('Save'); ?>" />
          </td>
        </tr>
		</table>
	</fieldset>
      <input type="hidden" name="option" value="<?php echo $option;?>" />
	 <input type="hidden" name="task" value="save" />
	</form>
<?php
	}
}
?>