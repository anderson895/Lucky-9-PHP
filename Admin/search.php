<?php
	if(ISSET($_POST['search'])){
		$keyword = $_POST['keyword'];
		

?>
<div>
	<h2>Result</h2>
	
	<?php
		require '../connection.php';
		$query = mysqli_query($connections, "SELECT * FROM `user` WHERE  first_name LIKE '%$keyword%' OR last_name  LIKE '%$keyword%' ") or die(mysqli_error());
		while($fetch = mysqli_fetch_array($query)){
	?>
	<div style="word-wrap:break-word;">
		<a href="get_blog.php?id=<?php echo $fetch['user_id']?>"><h4><?php echo $fetch['first_name']?>&nbsp;<?php echo $fetch['last_name']?></h4></a>
		<p><?php echo substr($fetch['email'], 0, 100)?>...</p>
	</div>
	<hr style="border-bottom:1px solid #ccc;"/>
	<?php
		}
	?>
</div>
<?php
	}
?>