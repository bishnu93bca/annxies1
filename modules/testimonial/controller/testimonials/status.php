<?php
if($id!='')
{
	if($action=='content')
	{
		$cObj = new Content;
		$params = array();
		$params['contentStatus'] = $stschgto;
		$cObj->contentUpdateBycontentID($params, $id);
	}
	else 
	{
		$idToChange = explode("@", $id);
	    $obj = new AdminTestimonial;
		foreach($idToChange as $val)
		{
	        if($val){
	            $params = array();
	            $params['status'] = $stschgto;
	            $obj->testimonialUpdateBytestimonialId($params, $val);
	        }
		}
	}
	$decodedStr = base64_decode($redstr);	
	?>
	<script language="javascript">window.location = 'index.php?<?php echo $decodedStr?>';</script>
	<?php
}
?>