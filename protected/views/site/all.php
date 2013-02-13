   <div id="container">

        <div id="main" role="main">

            <!--
              These are our filter options. The "data-filter" classes are used to identify which
              grid items to show.
            -->


            <ul id="tiles">
                <!--
                  These are our grid items. Notice how each one has classes assigned that
                  are used for filtering. The classes match the "data-filter" properties above.
                -->
                <?php
                $this->widget('bootstrap.widgets.TbListView', array(
                    'dataProvider' => $dataProviderLists,
                    'template' => '{items}',
                    'itemView' => '_all',
                ));
                ?>

            </ul>

        </div>

    </div>