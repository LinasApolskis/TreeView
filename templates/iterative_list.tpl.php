<ul id="pagePath">
	<li><a href="index.php">Home</a></li>
	<li>Iterative tree</li>
</ul>
<div id="actions">
	<a href='index.php?module=tree&action=create'>New entry</a>
</div>
<div class="float-clear"></div>

</br>
Dump view
</br>
<div>
<?php

function convert(array $list)
{
    $indexed = array();
    // first pass - get the array indexed by the primary id
    foreach ($list as $key => $val) {
//    foreach ($list as $row) {
        $indexed[$val['id']]            = $val;
        $indexed[$val['id']]['children'] = [];
    }
    // second pass
    $root = [];
    foreach ($indexed as $id => $row) {
        $indexed[$row['parent_id']]['children'][$id] = &$indexed[$id];
            $root[$id] = &$indexed[$id];

    }
    return $root;
}
    $tree = convert($data);
// Sadly printing still with recursion, would need some time to make it with stack without recursion
function printchildren(array $data, $placeholder)
{
    foreach ($data as $item) {
        print $placeholder;
        echo $item['name'];
        print "<br>";
        printchildren($item['children'], $placeholder . " - ");
    }
}

foreach($tree as $item)
{
    if($item['parent_id'] == -1) {
        echo $item['name'];
        print "<br>";
        printchildren($item['children'], " - ");
    }
}
?>
</div>
