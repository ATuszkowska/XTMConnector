<?php
$new = array();

function content_shortcode(){
    if(function_exists(get_untranslated())){
        $new = get_untranslated(); 
    }

    if(is_array($new)){
        return 'Tu pojawią się nieprzetłumaczone jeszcze posty';
    }
   
}
add_shortcode('get_untranslated', 'content_shortcode');

/*           <td><?php echo $row->Username; ?></td>
           <td><?php echo $row->Password; ?></td>
           <td><?php echo $row->Created; ?></td>
           <td><?php echo $row->Strength; ?></td>*/



?>
<h1> Do tłumaczenia </h1>
<table class="widefat fixed" cellspacing="0">
    <thead>
    <tr>

            <th id="cb" class="manage-column column-cb check-column" scope="col"></th> // this column contains checkboxes
            <th id="columnname" class="manage-column column-columnname" scope="col">posty</th>
            <th id="columnname" class="manage-column column-columnname num" scope="col"></th> // "num" added because the column contains numbers

    </tr>
    </thead>

    <tfoot>
    <tr>

            <th class="manage-column column-cb check-column" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname num" scope="col"></th>

    </tr>
    </tfoot>

    <tbody>
        <tr class="alternate">
            <th class="check-column" scope="row"></th>
            <td class="column-columnname"></td>
            <td class="column-columnname"></td>
        </tr>
        <tr>
            <th class="check-column" scope="row"></th>
            <td class="column-columnname"></td>
            <td class="column-columnname"></td>
        </tr>
        <tr class="alternate" valign="top"> // this row contains actions
            <th class="check-column" scope="row"></th>
            <td class="column-columnname">
                <div class="row-actions">
                    <span><a href="#">Action</a> |</span>
                    <span><a href="#">Action</a></span>
                </div>
            </td>
            <td class="column-columnname"></td>
        </tr>
        <tr valign="top"> // this row contains actions
            <th class="check-column" scope="row"></th>
            <td class="column-columnname">
                <div class="row-actions">
                    <span><a href="#">Action</a> |</span>
                    <span><a href="#">Action</a></span>
                </div>
            </td>
            <td class="column-columnname"></td>
        </tr>
    </tbody>
</table>

