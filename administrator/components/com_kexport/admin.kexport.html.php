<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class HTML_kimport
{
	function showKimport( $option ){
?>
    <form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
      <fieldset class="adminform">
        <legend>Upload</legend>
        <table class="admintable">
        <tr>
          <td width="100" align="right" class="key">
            File:
          </td>
          <td>
            <input class="file" type="file" name="uploadfile" id="name" size="50" maxlength="250" />
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