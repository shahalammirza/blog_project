<?php include "inc/header.php";?>

<?php
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		header("Location: 404.php");
	}else{
		$id= $_GET['id'];
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
	<div class="about">
	<?php 
		$query = "select * from tlb_post Where id=$id";
		$post=$db->select($query);
		if ($post) {
			while ($result = $post->fetch_assoc()) {
	?>
		<h2><?php echo $result['title']?></h2>
		<h4><?php echo $fm->formatDate($result['date'])?> By <a href="#"><?php echo $result['author']?></a></h4>
		<img src="admin/upload/<?php echo $result['image']?>" alt="post image"/>
		<?php echo $result['body']?>
		
		
		<div class="relatedpost clear">
			<h2>Related articles</h2>
			<?php
				$catid = $result['cat'];
				$queryreleted = "select * from tlb_post Where cat='$catid' order by rand() limit 6";
				$reletedpost=$db->select($queryreleted);
				if ($reletedpost) {
				while ($rresult = $reletedpost->fetch_assoc()) {
			?>
				<a href="post.php?id=<?php echo $rresult['id']?>">
					<img src="admin/upload/<?php echo $rresult['image']?>" alt="post image"/>
				</a>
			<?php } }else{ echo "no related post avaliable !!";}?>
		</div>
		<?php
			} }else{
				header("Location: 404.php");
			}
		?>
	</div>
</div>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>