<?php
require_once 'Model/News.php';

class NewsView {
	public function view($arrNews) {
		?>
		<form action="<?=$_SERVER['PHP_SELF'];?>">
		<?php
		foreach ($arrNews as $news) {
			?>
			<div class="container thumbnail">
				<?php echo $news->__get("_imagen"); ?>
            <div class="caption post-content col-sm-12">

                <h3><?php echo $news->__get("_title"); ?></h3>
                <?php 
                $text = $news->truncateHtml($news->__get("_content"),750);

                ?>
                <?php echo $text; ?>
                
                <div class="row">
                		<br/>
                		<div class="col-sm-3">
                			<p><strong><?=$news->__get("_date");?></strong></p>
                		</div>
                		
                		<div class="col-sm-1 col-sm-offset-7">
                			<button type="submit" name="news" value="<?=$news->__get("_id");?>" class="btn btn-default">Leer más</button>
                		</div>
                </div>

            </div>
			
			</div>
			<?php
		}
		?>
		</form>
		<?php 
	}
	
	public function viewNews($news){
		?>
		<div class="container nius">
		<div class="col-sm-12 title">
			<h3><?= $news->__get("_title")?></h3>
		</div>
		<div class="col-sm-12 news">
			<?= $news->__get("_imagen")?>
		</div>
		<br/><br/>
		<div class="col-sm-12">
			<?= $news->__get("_content") ?>
		</div>
		<br/>
		<div class="row">
			<div class="col-sm-6">
				<?= $news->__get("_date")?> <?= $news->__get("_author")?>
			</div>
			
			<div class="col-sm-6 text-right">
<!-- 				<form action="ex.php"> -->
<!-- 					<button type="submit" name="news" value="" class="btn btn-default" target="_blank">Descargar en formato PDF</button> -->
<!-- 				</form> -->
				<a class="btn btn-default" href="newsPDF.php?news=<?= $news->__get("_id") ?>" role="button"  target="_blank">Descargar en formato PDF</a>
			</div>
		
		</div>
		</div>
		<?php 
	}
}

?>