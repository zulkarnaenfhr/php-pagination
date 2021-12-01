<?php 
    $sumber = "https://indodax.com/api/tickers";
    $konten = file_get_contents($sumber);
    $data = json_decode($konten, true);
    $final = $data['tickers'];
?>

<?php 
    // pagination
    $page = !isset($_GET['page']) ? 1 : $_GET['page'];
    $limitData = 10;
    $offset = ($page - 1) * $limitData; 
    $datanya = $data['tickers'];
    $total_coin = count($data['tickers']);
    $total_page = ceil($total_coin / $limitData);
    $final =array_splice($datanya,$offset,$limitData);
    $limitPagination=2;
    $paginationRows=5;
    $endPagination= $total_page - $limitPagination;
    echo $endPagination;
    $firstPage = 1;
    $lastPage = $total_page;
?>

<?php 
    
?>

<div class="pagination">
    <?php if($page > $limitPagination && $page < $endPagination) {?>
        <?php 
            $start_pagination = ($page - $limitPagination);
            $end_pagination = ($page + $limitPagination);
        ?>

        <a id="active<?php echo $firstPage?>" href='?page=<?php echo $firstPage; ?>'>
            <?php echo $firstPage; ?>
        </a>
        <a id="noactive">
            ...
        </a>
        <?php for($x = $start_pagination; $x <= $end_pagination; $x++): ?>
            <a id="active<?php echo $x?>" href='?page=<?php echo $x; ?>'>
                <?php echo $x; ?>
            </a>
        <?php endfor; ?> 
        <a id="noactive">
            ...
        </a>
        <a id="active<?php echo $total_page?>" href='?page=<?php echo $total_page; ?>'>
            <?php echo $total_page; ?>
        </a>
    <?php } elseif($page > ($endPagination-1)) { ?>
        <?php 
            $start_inEndPagination = ($total_page - 5);    
        ?>
        <a id="active<?php echo $firstPage?>" href='?page=<?php echo $firstPage; ?>'>
            <?php echo $firstPage; ?>
        </a>
        <a id="noactive">
            ...
        </a>
        <?php for($x = $start_inEndPagination; $x <= $total_page; $x++): ?>
            <a id="active<?php echo $x?>" href='?page=<?php echo $x; ?>'>
                <?php echo $x; ?>
            </a>
        <?php endfor; ?>
    <?php } else { ?>
        <?php for($x = 1; $x <= $paginationRows; $x++): ?>
            <a id="active<?php echo $x?>" href='?page=<?php echo $x; ?>'>
                <?php echo $x; ?>
            </a>
        <?php endfor; ?> 
        <a id="noactive">
            ...
        </a>
        <a id="active<?php echo $total_page?>" href='?page=<?php echo $total_page; ?>'>
            <?php echo $total_page; ?>
        </a>
    <?php } ?>    
</div>

<div class="pagination">
    <?php for($x = 1; $x <= $total_page; $x++): ?>
    <a id="active<?php echo $x?>" href='?page=<?php echo $x; ?>'>
        <?php echo $x; ?>
    </a>
    <?php endfor; ?>
</div>