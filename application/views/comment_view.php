<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Comments</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <link href="<?php echo base_url('/css/style.css'); ?>" rel="stylesheet">

    </head>

    <body>

        <div class="container"> 
            <div class="comment-content">
                <?php
                foreach ($comments as $comment) {
                    ?> <div class="panel panel-default single-comment">
                        <div class="panel-heading">
                            <?php echo $comment->email ?> <div class="date"> <?php echo $comment->addDate; ?></div>
                        </div><div class="panel-body">
                            <?php echo $comment->comment; ?></div></div>
                    <div class="clearfix"></div><?php
                }
                ?>
                <div id="new-comments"></div>
                <?php if ($commentCount > 0) {
                    ?> <a href="<?php echo base_url('/comment/index/all'); ?>"> Rādīt pārējos <?php echo $commentCount; ?> komentārus.  </a>
                <?php } ?>       
            </div>
            <form class="form-signin" id="addComment" role="form">
                <h2 class="form-signin-heading">Leave your comment</h2>
                <div class="req">*</div>
                <input id="email" type="email" class="form-control" placeholder="Email address" required autofocus>
                <div class="req">*</div>

                <textarea id="comment" class="form-control" placeholder="Comment..." ></textarea>

                <div class="btn btn-lg btn-primary btn-block" onclick="addComment();" >Submit</div>
            </form>

        </div> <!-- /container -->
        <script src="<?php echo base_url('scripts/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('scripts/main.js'); ?>"></script>
    </body>
</html>
