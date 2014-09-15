<div style="margin-top:140px;">
<?php
	if(is_array($wishlist_history) && !empty($wishlist_history)){
		foreach( $wishlist_history as $history )
		{ ?>
			<div style="border:2">
				<img src="<?php echo Yii::app()->params['song_url'].'songs_thumb/'.$history['song_img_url']; ?>" height='175' width='175'	>
				<span>Title: <?php echo $history['song_title']; ?></span>
				<span>Price: <?php echo $history['song_price']; ?></span>
				<span><a href='#'  onclick="removeWishlist( <?php echo $history['wishlist_id']; ?> )">X</a></span>
			</div>
<?php		}
	}else{ ?>
	<div>No Items are Available in Your WishList </div>
<?php	}
?>
</div>