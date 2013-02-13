  
             
                <h1>Search result(s) <?php echo $dataProvider->getTotalItemCount(); ?> Found</h1>
<?php

if($dataProvider->getTotalItemCount()==0) {
    echo 'No results found.';
}
else {
    
    ?>
                <div id="container">

        <div id="main" role="main">


            <ul id="tiles">
                <?php 
       $this->widget('bootstrap.widgets.TbListView', array(
                    'dataProvider' => $dataProvider,
                    'template' => '{items}',
                    'itemView' => '_listing',
                ));
       ?>
                


            </ul>

        </div>
    </div>
        <?php } ?>