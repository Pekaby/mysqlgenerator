<?
include 'temp/templates_stand/header.php';
tmpheader('finish.css');
?>

<main>
    <div class="wrapper">
        <form name="finish_form" action="/account" method="POST" enctype="multipart/form-data">
        <b class="b_f">Enter your name:</b><br>
        <input type="text" name="name" placeholder="Tony..." class="input_form"><br><br>
        <b class="b_f">Upload a photo:</b><br>
        <input type="file" name="image" class="image">
        <div class="warn">Only .gif .png .jpeg .jpg</div>
        <button type="submit" name="finish_reg" class="btn">Finish</button>
    </form>
    </div>
</main>
<div style="height: 50px"></div>
    <!-- /.wrapper -->
<?
include 'temp/templates_stand/footer.php';
tmpfooter();
?>